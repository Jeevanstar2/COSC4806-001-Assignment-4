<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

// Path constants
define('DS', DIRECTORY_SEPARATOR);
define('VIEWS', __DIR__ . DS . 'app' . DS . 'views' . DS);
define('MODELS', __DIR__ . DS . 'app' . DS . 'models' . DS);

// Core files
require_once 'app/core/Controller.php';
require_once 'app/core/App.php';
require_once 'app/database.php';

// App instance
$app = new App();

// Routing logic
$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        require_once 'app/controllers/Login.php';
        $controller = new Login();
        $controller->index();
        break;

    case 'verify':
        require_once 'app/controllers/Verify.php';
        $controller = new Verify();
        $controller->index();
        break;

    case 'register':
        require_once 'app/controllers/Register.php';
        $controller = new Register();
        $controller->index();
        break;

    case 'store':
        require_once 'app/controllers/Register.php';
        $controller = new Register();
        $controller->store();
        break;

    case 'logout':
        require_once 'app/controllers/Logout.php';
        $controller = new Logout();
        $controller->index();
        break;

    case 'home':
        require_once 'app/controllers/Home.php';
        $controller = new Home();
        $controller->index();
        break;

    case 'reminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->index();
        break;

    case 'createReminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->create();
        break;

    case 'storeReminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->store();
        break;

    case 'editReminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->edit();
        break;

    case 'updateReminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->update();
        break;

    case 'deleteReminder':
        require_once 'app/controllers/Reminder.php';
        $controller = new Reminder();
        $controller->delete();
        break;

    default:
        echo "404 Not Found";
        break;
}
