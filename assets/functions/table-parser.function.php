<?php

// get all courses and the arithmetical mean of the end year
function getAllCourses($source)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($source);
    $xpath = new DOMXpath($dom);
    $table = $xpath->query('//table')->item(0)->ownerDocument->saveHTML($xpath->query('//table')->item(0));

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
        $EDS = null;
        for ($i = 0; $i < $tds->length; $i++) {
            if ($ths->item(0)->getAttribute('class') === 'w3-indigo' && $ths->item(0)->getAttribute('style') === 'text-align: left; padding-left: 5px;') {
                $course = trim($ths->item(0)->nodeValue);
            }
            if ($tds->item($i)->getAttribute('class') === 'w3-indigo' and $tds->item($i)->nodeValue !== 'EDS' and !empty($tds->item($i)->nodeValue)) {
                $EDS = trim($tds->item($i)->nodeValue);
            }
        }
        if ($course && $EDS)
            $courses[$course] = $EDS;
    }
    return $courses;
}

// get the data of a specific course
function getCourseData($source, $course_name, $course_data)
{
    $dom = new DOMDocument();
    @$dom->loadHTML($source);
    $xpath = new DOMXpath($dom);
    $table = $xpath->query('//table')->item(0)->ownerDocument->saveHTML($xpath->query('//table')->item(0));

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
        case 'half-year-arithmetical-mean':
            $id = '7';
            break;
        case 'half-year-mark':
            $id = '8';
            break;
        case 'end-year-arithmetical-mean':
            $id = '9';
            break;
        case 'end-year-mark':
            $id = '10';
            break;
        default:
            return null;
    }

    $rows = $xpath->query("//table/tr[th[contains(text(), '$course_name')]]/td[$id]");
    if ($rows->length > 0) {
        $data = trim($rows->item(0)->nodeValue);
    }

    if (empty($data)){
        return "unbekannt";
    }

    return $data;
}