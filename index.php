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

require_once 'app/controllers/Login.php';
require_once 'app/controllers/Register.php';
require_once 'app/controllers/Verify.php';
require_once 'app/controllers/Logout.php';
require_once 'app/controllers/Home.php';
require_once 'app/controllers/Reminder.php';

$app = new App();
