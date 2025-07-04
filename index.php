<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

define('DS', DIRECTORY_SEPARATOR);
define('VIEWS', __DIR__ . DS . 'app' . DS . 'views' . DS);
define('MODELS', __DIR__ . DS . 'app' . DS . 'models' . DS);

// Autoloader for controllers and models
spl_autoload_register(function ($class) {
    $paths = ['app/controllers/', 'app/models/'];
    foreach ($paths as $path) {
        $file = $path . $class . '.php';
        if (file_exists($file)) {
            require_once $file;
            return;
        }
    }
});

// Core files
require_once 'app/core/Controller.php';
require_once 'app/core/App.php';
require_once 'app/database.php';

$app = new App();

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

    case 'reminder':
        $controller = new Reminder();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $actionType = $_POST['action_type'] ?? '';
            $id = $_POST['id'] ?? null;

            if ($actionType === 'create') {
                $controller->store();
            } elseif ($actionType === 'update' && $id) {
                $controller->update($id);
            } elseif ($actionType === 'delete' && $id) {
                $controller->delete($id);
            } else {
                $controller->index();
            }
        } elseif (isset($_GET['subaction'])) {
            $subaction = $_GET['subaction'];
            $id = $_GET['id'] ?? null;

            if ($subaction === 'create') {
                $controller->create();
            } elseif ($subaction === 'edit' && $id) {
                $controller->edit($id);
            } else {
                $controller->index();
            }
        } else {
            $controller->index();
        }
        break;

    default:
        echo "404 Not Found";
        break;
}
