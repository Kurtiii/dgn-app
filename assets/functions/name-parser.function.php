<?php
function parseCourseName($name) {
    $name = str_replace('Ã¶', 'ö', $name);
    $name = str_replace('Ã¼', 'ü', $name);
    $name = str_replace('Ã¤', 'ä', $name);
    return $name;
}