<?php
require 'vendor/autoload.php';
require 'assets/config.php';
require 'assets/functions/encrytion.function.php';
require 'assets/functions/table-parser.function.php';
require 'assets/functions/icons.function.php';

// Create Router instance (bramus router)
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function () {
    // ! app installation here
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
