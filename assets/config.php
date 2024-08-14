<?php

$_CONFIG['production'] = false;

if ($_CONFIG['production']) {
    $_CONFIG['base_url'] = 'https://dgn-app.kurtiii.de';
    $_CONFIG['login_url'] = 'https://schueler.domgymnasium-nmb.de/login.php';
    $_CONFIG['marks_url'] = 'https://schueler.domgymnasium-nmb.de/schueler/intern.php?do=noten10';
    $_CONFIG['marks_url_os'] = 'https://schueler.domgymnasium-nmb.de/schueler/intern.php?do=noten';
    $_CONFIG['timetable_url'] = 'https://www.domgymnasium-nmb.de/plan/mobdaten/';
} else {
    $_CONFIG['base_url'] = 'https://localhost/kurtiii/dgn-app';
    $_CONFIG['login_url'] = 'https://schueler.domgymnasium-nmb.de/login.php';
    $_CONFIG['marks_url'] = 'https://schueler.domgymnasium-nmb.de/schueler/intern.php?do=noten10';
    $_CONFIG['marks_url_os'] = 'https://schueler.domgymnasium-nmb.de/schueler/intern.php?do=noten';
    $_CONFIG['timetable_url'] = 'https://www.domgymnasium-nmb.de/plan/mobdaten/';
}
