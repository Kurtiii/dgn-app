<?php

function getTableForDay($date, $class, $courses)
{
    global $_CONFIG;

    // convert day to YYYYMMDD
    $date = date('Ymd', strtotime($date));

    // get timetable
    $timetable = file_get_contents($_CONFIG['timetable_url'] . '/PlanKl' . $date . '.xml');

    // check if 300 error
    if (strpos($timetable, 'Multiple Choices') !== false) {
        return false;
    }

    // parse timetable
    $timetable = simplexml_load_string($timetable);
    $timetable = json_decode(json_encode($timetable), true);

    // get class timetable
    $timetable = $timetable['Klassen']['Kl'];

    // filter class
    $timetable = array_filter($timetable, function ($item) use ($class) {
        return $item['Kurz'] == $class;
    });

    // check if class exists
    if (empty($timetable)) {
        return false;
    }

    $timetable = array_values($timetable)[0];
    $timetable = $timetable['Pl'];

    // if courses are set, filter courses
    $i = 0;
    foreach ($timetable as $key => $lessons) {
        foreach ($lessons as $lesson) {
            if (!empty($courses)) {
                if (!in_array($lesson['Fa'], $courses)) {
                    unset($timetable[$key][$i]);
                }
            }
            $i++;
        }
    }

    $timetable = $timetable['Std'];

    return $timetable;
}

function getAvailableCourses($class)
{
    global $_CONFIG;

    // get courses
    $xml = file_get_contents($_CONFIG['timetable_url'] . '/Klassen.xml');
    $courses = json_decode(json_encode(simplexml_load_string($xml)), true);

    // parse courses
    $xml = simplexml_load_string($xml);
    // Find the desired class
    $classData = null;
    foreach ($xml->Klassen->Kl as $classElement) {
        if ($classElement->Kurz == $class) {
            $classData = $classElement;
            break;
        }
    }

    // get courses
    $courses = $courses['Klassen']['Kl'];

    // filter class
    $course = array_filter($courses, function ($item) use ($class) {
        return $item['Kurz'] == $class;
    });

    // check if class exists
    if (empty($course)) {
        return false;
    }

    $course = array_values($course)[0];
    $course = $course['Kurse'];
    $course = array_values($course)[0];

    $i = 0;
    foreach ($course as $value) {
        $c = $xml->xpath("//KKz[text()='{$value['KKz']}']");
        // Match the course name
        $le = (string)$c[0]->attributes()->KLe;
        $course[$i]['KLe'] = $le;
        $i++;
    }

    return $course;
}

function getAdditionalInfo($date)
{
    global $_CONFIG;

    // convert day to YYYYMMDD
    $date = date('Ymd', strtotime($date));

    // get timetable
    $timetable = file_get_contents($_CONFIG['timetable_url'] . '/PlanKl' . $date . '.xml');

    // check if 300 error
    if (strpos($timetable, 'Multiple Choices') !== false) {
        return false;
    }

    // parse timetable
    $timetable = simplexml_load_string($timetable);
    $timetable = json_decode(json_encode($timetable), true);

    $additionalInfo = $timetable['ZusatzInfo'];
    if (empty($additionalInfo)) {
        return false;
    }
    $additionalInfo = array_values($additionalInfo)[0];

    return $additionalInfo;
}
