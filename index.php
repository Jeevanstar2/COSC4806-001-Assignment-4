<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('APP', ROOT . 'app' . DS);
define('VIEWS', APP . 'views' . DS);
define('MODELS', APP . 'models' . DS);

require_once APP . 'core/Controller.php';
require_once APP . 'core/App.php';
require_once APP . 'database.php';

$app = new App();

$action = $_GET['action'] ?? 'login';

switch ($action) {
    case 'login':
        (new Login())->index();
        break;
    case 'verify':
        (new Verify())->index();
        break;
    case 'register':
        (new Register())->index();
        break;
    case 'store':
        (new Register())->store();
        break;
    case 'logout':
        (new Logout())->index();
        break;
    case 'home':
        (new Home())->index();
        break;
    case 'reminders':
        (new Reminder())->index();
        break;
    case 'reminder-create':
        (new Reminder())->create();
        break;
    case 'reminder-store':
        (new Reminder())->store();
        break;
    case 'reminder-edit':
        $id = $_GET['id'] ?? null;
        (new Reminder())->edit($id);
        break;
    case 'reminder-update':
        $id = $_GET['id'] ?? null;
        (new Reminder())->update($id);
        break;
    case 'reminder-delete':
        $id = $_GET['id'] ?? null;
        (new Reminder())->delete($id);
        break;
    default:
        echo "404 Not Found";
}
