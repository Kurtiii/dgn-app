<?php

$_CONFIG['production'] = false;

if ($_CONFIG['production']) {
    $_CONFIG['base_url'] = 'https://dgn-app.kurtiii.de';
    $_CONFIG['login_url'] = 'https://schueler.domgymnasium-nmb.de/login.php';
    $_CONFIG['marks_url'] = 'https://schueler.domgymnasium-nmb.de/schueler/intern.php?do=noten10';
} else {
    $_CONFIG['base_url'] = 'http://localhost/kurtiii/dgn-app';
    $_CONFIG['login_url'] = 'http://localhost/kurtiii/cross-site-scripting-demo/dgn/login.php';
    $_CONFIG['marks_url'] = 'http://localhost/kurtiii/cross-site-scripting-demo/dgn/noten.php';
}