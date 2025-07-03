<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('VIEWS', __DIR__ . DS . 'app' . DS . 'views' . DS);

require_once 'app/core/Controller.php';
require_once 'app/core/App.php';

// Setup DB
require_once 'app/database.php';

$app = new App();

// Basic dispatcher logic
$action = $_GET['action'] ?? 'login';  // default is login

switch ($action) {
    case 'login':
        $controller = new Login();
        $controller->index();
        break;

    case 'verify':
        $controller = new Verify();
        $controller->index();
        break;

    case 'register':
        $controller = new Register();
        $controller->index();
        break;

    case 'store':
        $controller = new Register();
        $controller->store();
        break;

    case 'logout':
        $controller = new Logout();
        $controller->index();
        break;

    case 'home':
        $controller = new Home();
        $controller->index();
        break;

    // add routes for reminders later

    default:
        echo "404 Not Found";
        break;
}
