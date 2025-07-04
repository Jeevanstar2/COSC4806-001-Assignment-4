<?php
session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

define('DS', DIRECTORY_SEPARATOR);
define('VIEWS', __DIR__ . DS . 'app' . DS . 'views' . DS);
define('MODELS', __DIR__ . DS . 'app' . DS . 'models' . DS);

require_once 'app/core/Controller.php';
require_once 'app/core/App.php';
require_once 'app/database.php';

// Controllers
require_once 'app/controllers/Login.php';
require_once 'app/controllers/Register.php';
require_once 'app/controllers/Verify.php';
require_once 'app/controllers/Logout.php';
require_once 'app/controllers/Home.php';
require_once 'app/controllers/Reminder.php';

// Router
$action = $_GET['action'] ?? 'login';

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

    case 'store_user':
        $controller = new Register();
        $controller->store();
        break;

    case 'home':
        $controller = new Home();
        $controller->index();
        break;

    case 'logout':
        $controller = new Logout();
        $controller->index();
        break;

    case 'reminder':
        $controller = new Reminder();
        $controller->index();
        break;

    case 'create_reminder':
        $controller = new Reminder();
        $controller->create();
        break;

    case 'store_reminder':
        $controller = new Reminder();
        $controller->store();
        break;

    case 'edit_reminder':
        $controller = new Reminder();
        $controller->edit($_GET['id'] ?? null);
        break;

    case 'update_reminder':
        $controller = new Reminder();
        $controller->update($_POST['id'] ?? null);
        break;

    case 'delete_reminder':
        $controller = new Reminder();
        $controller->delete($_GET['id'] ?? null);
        break;

    default:
        echo "<h1>404 Not Found</h1>";
        break;
}
