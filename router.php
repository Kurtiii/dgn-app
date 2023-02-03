<?php
require 'vendor/autoload.php';
require 'assets/config.php';
require 'assets/functions/encrytion.function.php';
require 'assets/functions/table-parser.function.php';
require 'assets/functions/icons.function.php';
require 'assets/functions/name-parser.function.php';

// Create Router instance (bramus router)
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function () {
    global $_CONFIG;
    header("Location: " . $_CONFIG['base_url'] . "/register");
    exit;
});

$router->get('/login', function () {
    global $_CONFIG;
    global $_COOKIE;
    $sessionid = $_COOKIE['sessionid'];
    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $pin = $_COOKIE['pin'];

    if (empty($username) || empty($password || empty($pin))) {
        header("Location: " . $_CONFIG['base_url'] . "/register");
        exit;
    }

    if (!empty($sessionid)) {
        // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
        $output = curl_exec($ch);
        curl_close($ch);

        // check if the output contains "Sie sind nicht angemeldet!"
        if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
            include 'views/login.view.php';
            exit;
        }

        // redirect to the marks page
        header("Location: " . $_CONFIG['base_url'] . "/marks");
        exit;
    }

    include 'views/login.view.php';
});

$router->get('/logout', function () {
    global $_CONFIG;
    global $_COOKIE;

    // unset the sessionid, username, password and pin cookies
    setcookie("sessionid", "", time() - 3600, "/");
    setcookie("username", "", time() - 3600, "/");
    setcookie("password", "", time() - 3600, "/");
    setcookie("pin", "", time() - 3600, "/");

    // redirect to the register page
    header("Location: " . $_CONFIG['base_url'] . "/register");
    exit;
});

$router->get('/lock', function () {
    global $_CONFIG;
    global $_COOKIE;

    // unset the sessionid cookie
    setcookie("sessionid", "", time() - 3600, "/");

    // redirect to the register page
    header("Location: " . $_CONFIG['base_url'] . "/login");
    exit;
});

$router->get('/register', function () {
    global $_CONFIG;
    require 'views/register.view.php';
});

$router->get('/marks', function () {
    global $_CONFIG;
    global $_COOKIE;
    $sessionid = $_COOKIE['sessionid'];

    if (!empty($sessionid)) {
        // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
        $output = curl_exec($ch);
        curl_close($ch);

        // check if the output contains "Sie sind nicht angemeldet!"
        if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
            // redirect to the login page
            $errormsg = urlencode("Deine Sitzung ist abgelaufen. Bitte melde dich erneut an.");
            header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
            exit;
        }
    } else {
        header("Location: " . $_CONFIG['base_url'] . "/login");
        exit;
    }

    $courses = getAllCourses($output);

    require 'views/marks.view.php';

});

$router->get('/course/([^/]+)', function ($course_name) {
    global $_CONFIG;
    global $_COOKIE;
    $sessionid = $_COOKIE['sessionid'];

    if (!empty($sessionid)) {
        // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
        $output = curl_exec($ch);
        curl_close($ch);

        // check if the output contains "Sie sind nicht angemeldet!"
        if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
            // redirect to the login page
            $errormsg = urlencode("Deine Sitzung ist abgelaufen. Bitte melde dich erneut an.");
            header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
            exit;
        }
    } else {
        header("Location: " . $_CONFIG['base_url'] . "/login");
        exit;
    }

    $course_name = urldecode($course_name);

    require 'views/course.view.php';
});

$router->post('/course/([^/]+)/mark-simulation/results', function ($course_name) {
    global $_CONFIG;
    global $_COOKIE;
    $sessionid = $_COOKIE['sessionid'];

    if (!empty($sessionid)) {
        // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
        $output = curl_exec($ch);
        curl_close($ch);

        // check if the output contains "Sie sind nicht angemeldet!"
        if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
            // redirect to the login page
            $errormsg = urlencode("Deine Sitzung ist abgelaufen. Bitte melde dich erneut an.");
            header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
            exit;
        }
    } else {
        header("Location: " . $_CONFIG['base_url'] . "/login");
        exit;
    }

    $course_name = urldecode($course_name);

    $s_marks_class_test = $_POST['inputSimulationMarksClassTest'];
    $s_marks_class_test = explode(",", $s_marks_class_test);
    $s_marks_other = $_POST['inputSimulationMarksOther'];
    $s_marks_other = explode(",", $s_marks_other);

    // check if all marks are valid
    foreach ($s_marks_class_test as $mark) {
        if (!is_numeric($mark) || $mark < 0 || $mark > 6) {
            // remove mark from array
            $key = array_search($mark, $s_marks_class_test);
            unset($s_marks_class_test[$key]);
        }
    }

    foreach ($s_marks_other as $mark) {
        if (!is_numeric($mark) || $mark < 0 || $mark > 6) {
            // remove mark from array
            $key = array_search($mark, $s_marks_other);
            unset($s_marks_other[$key]);
        }
    }

    $marks_class_test = getCourseData($output, $course_name, 'class-test');
    $marks_class_test = explode(" ", $marks_class_test);
    
    $marks_other = getCourseData($output, $course_name, 'other');
    $marks_other = explode(" ", $marks_other);

    $percentage_class_test = getCourseData($output, $course_name, 'class-test-percent');
    $percentage_other = getCourseData($output, $course_name, 'other-percent');
    
    // check if all percentage values are valid
    if (!is_numeric($percentage_class_test) || $percentage_class_test < 0 || $percentage_class_test > 100) {
        $percentage_class_test = 0;
    }
    if (!is_numeric($percentage_other) || $percentage_other < 0 || $percentage_other > 100) {
        $percentage_other = 0;
    }

    // check if the $s_marks_class_test array isnt empty
    if (!empty($s_marks_class_test)) {
        // check if there is a percentage value for the class test marks
        if ($percentage_class_test == "0") {
            $percentage_other = 70;
            $percentage_class_test = 30;
        }
    }

    // merge the class test marks
    $marks_class_test = array_merge($marks_class_test, $s_marks_class_test);

    // remove every "?" from the array $marks_class_test
    $marks_class_test = array_filter($marks_class_test, function($value) { return $value !== '?'; });

    // merge the other marks
    $marks_other = array_merge($marks_other, $s_marks_other);

    // remove every "?" from the array $marks_other
    $marks_other = array_filter($marks_other, function($value) { return $value !== '?'; });

    // calculate the average of all marks and round it to 2 decimal places. Use the percentage to calculate the final mark.
    $average_class_test = round(array_sum($marks_class_test) / count($marks_class_test), 2);
    $average_other = round(array_sum($marks_other) / count($marks_other), 2);
    $final_mark = round($average_class_test * $percentage_class_test / 100 + $average_other * $percentage_other / 100, 2);
    
    // add two decimal places to the final mark
    $final_mark = number_format($final_mark, 2, '.', '');

    require 'views/mark-simulation-results.view.php';

});

$router->get('/about', function () {
    global $_CONFIG;
    global $_COOKIE;
    $sessionid = $_COOKIE['sessionid'];

    if (!empty($sessionid)) {
        // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
        $output = curl_exec($ch);
        curl_close($ch);

        // check if the output contains "Sie sind nicht angemeldet!"
        if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
            // redirect to the login page
            $errormsg = urlencode("Deine Sitzung ist abgelaufen. Bitte melde dich erneut an.");
            header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
            exit;
        }
    } else {
        header("Location: " . $_CONFIG['base_url'] . "/login");
        exit;
    }

    require 'views/about.view.php';
});

$router->get('/web', function () {
    global $_CONFIG;
    header("Location: " . $_CONFIG['base_url'] . "/login");
    exit;
});

$router->get('/install', function () {
    global $_CONFIG;
    require 'views/install.view.php';
});

// API routes

// Authentication
$router->post('/api/authentication/register', function () {
    global $_POST;
    global $_CONFIG;
    global $_COOKIE;

    // Check if all required fields are set
    if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['pin'])) {
        http_response_code(400);
        $errormsg = urlencode("Bitte fülle alle Felder aus.");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    $username = $_POST['username'];
    $password = $_POST['password'];
    $pin = $_POST['pin'];

    $blacklist = file_get_contents('assets/lists/blacklist.json');
    $blacklist = json_decode($blacklist, true);

    // check if the username is blacklisted
    if (in_array(md5($username), $blacklist)) {
        http_response_code(400);
        $errormsg = urlencode("Huch, kein Bock.");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    // check if the pin is 4 characters long
    if (strlen($pin) != 4) {
        http_response_code(400);
        $errormsg = urlencode("Der PIN muss 4 Zeichen lang sein.");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    // send a curl request to the login page with the given credentials and get the PHPSESSID cookie value
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_CONFIG['login_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "username=" . $username . "&psw=" . $password . "&send=true");
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    // get the PHPSESSID cookie value
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $output, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    // check if the PHPSESSID cookie value is set
    if (empty($cookies['PHPSESSID'])) {
        http_response_code(400);
        $errormsg = urlencode("Leider konnten wir dich nicht mit deinen Zugangsdaten authentifizieren. Bitte überprüfe deine Eingaben und versuche es erneut. #001");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    $sessionid = $cookies['PHPSESSID'];

    // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
    $output = curl_exec($ch);
    curl_close($ch);

    // check if the output contains "Sie sind nicht angemeldet!"
    if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
        http_response_code(400);
        $errormsg = urlencode("Leider konnten wir dich nicht mit deinen Zugangsdaten authentifizieren. Bitte überprüfe deine Eingaben und versuche es erneut. #002");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    // encrypt the password
    $password = encrypt($password, $pin);

    // save the encrypted username and password to cookie
    setcookie("username", $username, time() + (3600 * 24 * 60), "/");
    setcookie("password", $password, time() + (3600 * 24 * 60), "/");

    // md5 hash the pin
    $pin = md5($pin);

    // save the pin to cookie
    setcookie("pin", $pin, time() + (3600 * 24 * 60), "/");

    // save the PHPSESSID to cookie until the session ends
    setcookie("sessionid", $sessionid, 0, "/");

    // redirect to the marks page
    header("Location: " . $_CONFIG['base_url'] . "/marks");
    exit();
});

$router->post('/api/authentication/login', function () {
    global $_POST;
    global $_CONFIG;
    global $_COOKIE;

    $username = $_COOKIE['username'];
    $password = $_COOKIE['password'];
    $saved_pin = $_COOKIE['pin'];
    $pin = $_POST['pin'];

    // check if the pin is correct
    if (md5($pin) != $saved_pin) {
        http_response_code(400);
        $errormsg = urlencode("Deine PIN ist falsch. Bitte überprüfe deine Eingaben und versuche es erneut.");
        header("Location: " . $_CONFIG['base_url'] . "/login?error=" . $errormsg);
        exit();
    }

    // decrypt the password
    $password = decrypt($password, $pin);

    // send a curl request to the login page with the given credentials and get the PHPSESSID cookie value
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_CONFIG['login_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, "username=" . $username . "&psw=" . $password . "&send=true");
    curl_setopt($ch, CURLOPT_HEADER, 1);
    $output = curl_exec($ch);
    curl_close($ch);

    // get the PHPSESSID cookie value
    preg_match_all('/^Set-Cookie:\s*([^;]*)/mi', $output, $matches);
    $cookies = array();
    foreach ($matches[1] as $item) {
        parse_str($item, $cookie);
        $cookies = array_merge($cookies, $cookie);
    }

    // check if the PHPSESSID cookie value is set
    if (empty($cookies['PHPSESSID'])) {
        http_response_code(400);
        $errormsg = urlencode("Leider konnten wir dich nicht mit deinen Zugangsdaten authentifizieren. Bitte überprüfe deine Eingaben und versuche es erneut.");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    $sessionid = $cookies['PHPSESSID'];

    // send a curl get request to the marks page with the PHPSESSID cookie value and show the page content
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $_CONFIG['marks_url']);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_COOKIE, "PHPSESSID=" . $sessionid);
    $output = curl_exec($ch);
    curl_close($ch);

    // check if the output contains "Sie sind nicht angemeldet!"
    if (strpos($output, "Sie sind nicht angemeldet!") !== false) {
        http_response_code(400);
        $errormsg = urlencode("Leider konnten wir dich nicht mit deinen Zugangsdaten authentifizieren. Bitte überprüfe deine Eingaben und versuche es erneut.");
        header("Location: " . $_CONFIG['base_url'] . "/register?error=" . $errormsg);
        exit();
    }

    // save the PHPSESSID to cookie until the session ends
    setcookie("sessionid", $sessionid, 0, "/");

    // redirect to the marks page
    header("Location: " . $_CONFIG['base_url'] . "/marks");
    exit();
});

// Run it!
$router->run();
