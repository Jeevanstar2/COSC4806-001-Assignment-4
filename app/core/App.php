<?php
class App {
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $action = $_GET['action'] ?? 'login';

        $routes = [
            'login' => ['Login', 'index'],
            'verify' => ['Verify', 'index'],
            'register' => ['Register', 'index'],
            'store' => ['Register', 'store'],
            'logout' => ['Logout', 'index'],
            'home' => ['Home', 'index'],
            'reminders' => ['Reminder', 'index'],
            'reminder_create' => ['Reminder', 'create'],
            'reminder_store' => ['Reminder', 'store'],
            'reminder_edit' => ['Reminder', 'edit'],
            'reminder_update' => ['Reminder', 'update'],
            'reminder_delete' => ['Reminder', 'delete']
        ];

        if (isset($routes[$action])) {
            [$this->controller, $this->method] = $routes[$action];
        }

        require_once "app/controllers/{$this->controller}.php";
        $this->controller = new $this->controller;

        if (method_exists($this->controller, $this->method)) {
            call_user_func_array([$this->controller, $this->method], []);
        } else {
            echo "404 Not Found";
        }
    }
}
