<?php

// get all half-years
function OSgetAllHalfYears($source)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($source);
    $xpath = new DOMXpath($dom);

    // find all h4 elements with the class 'w3-text-indigo' and style 'font-weight: bold;' and save them in an array
    $half_years = array();
    $h4s = $dom->getElementsByTagName('h4');
    foreach ($h4s as $h4) {
        $h4 = trim($h4->nodeValue);
        $h4 = str_replace('Halbjahr: ', '', $h4);
        $half_years[] = $h4;
    }
    //sort($half_years);
    return $half_years;
}



// get all courses and the arithmetical mean of the end year
function OSgetAllCourses($source, $year)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($source);
    $xpath = new DOMXpath($dom);
    $table = $xpath->query('//table')->item(0)->ownerDocument->saveHTML($xpath->query('//table')->item($year));

    // repair table
    $table = str_replace('</td>
    <tr>', '</td>
    </tr>
    <tr>', $table);

    $table = str_replace('</table>', '
    </tr>
</table>', $table);

    @$dom->loadHTML($table);


    $courses = array();
    $rows = $dom->getElementsByTagName('tr');
    foreach ($rows as $row) {
        $tds = $row->getElementsByTagName('td');
        $ths = $row->getElementsByTagName('th');
        $course = null;
        $GDS = null;
        for ($i = 0; $i < $tds->length; $i++) {
            if ($ths->item(0)->getAttribute('class') === 'w3-indigo' && $ths->item(0)->getAttribute('style') === 'text-align: left; padding-left: 5px;') {
                $course = trim($ths->item(0)->nodeValue);
            }
            if ($tds->item($i)->getAttribute('class') === 'w3-blue' and $tds->item($i)->nodeValue !== 'GDS' and !empty($tds->item($i)->nodeValue)) {
                $GDS = trim($tds->item($i)->nodeValue);
            }
        }
        if ($course && $GDS) {
            $courses[$course] = $GDS;
        }
    }
    return $courses;
}

// get the data of a specific course
function OSgetCourseData($source, $course_name, $course_data, $year)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($source);
    $xpath = new DOMXpath($dom);
    $table = $xpath->query('//table')->item(0)->ownerDocument->saveHTML($xpath->query('//table')->item($year));

    // repair table
    $table = str_replace('</td>
    <tr>', '</td>
    </tr>
    <tr>', $table);

    $table = str_replace('</table>', '
    </tr>
</table>', $table);

    @$dom->loadHTML($table);

    $xpath = new DOMXpath($dom);
    $data = null;
    $id = null;

    switch ($course_data) {
        case 'other':
            $id = '1';
            break;
        case 'other-percent':
            $id = '2';
            break;
        case 'other-arithmetical-mean':
            $id = '3';
            break;
        case 'class-test':
            $id = '4';
            break;
        case 'class-test-percent':
            $id = '5';
            break;
        case 'class-test-arithmetical-mean':
            $id = '6';
            break;
        case 'overall-arithmetical-mean':
            $id = '7';
            break;
        case 'overall-mark':
            $id = '8';
            break;
        default:
            return null;
    }

    $rows = $xpath->query("//table/tr[th[contains(text(), '$course_name')]]/td[$id]");
    if ($rows->length > 0) {
        $data = trim($rows->item(0)->nodeValue);
    }

    if (empty($data)) {
        return "?";
    }

    return $data;
}
