<?php
session_start();

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', __DIR__ . DS);
define('APP', ROOT . 'app' . DS);
define('VIEWS', APP . 'views' . DS);
define('MODELS', APP . 'models' . DS);

require_once APP . 'core' . DS . 'App.php';
require_once APP . 'core' . DS . 'Controller.php';
require_once APP . 'database.php';

$app = new App();
