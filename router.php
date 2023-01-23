<?php
require 'vendor/autoload.php';

// Create Router instance (bramus router)
$router = new \Bramus\Router\Router();

// Define routes
$router->get('/', function() {
    echo 'Hello World!';
});

// Run it!
$router->run();