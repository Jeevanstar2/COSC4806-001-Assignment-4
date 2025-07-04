<?php
class App {
    protected $controller = 'Login';
    protected $method = 'index';
    protected $params = [];

    public function __construct() {
        $action = $_GET['action'] ?? 'login';
        $id = $_GET['id'] ?? null;

        switch ($action) {
            case 'verify':
                $this->controller = 'Verify';
                break;
            case 'register':
                $this->controller = 'Register';
                break;
            case 'store':
                $this->controller = 'Register';
                $this->method = 'store';
                break;
            case 'home':
                $this->controller = 'Home';
                break;
            case 'logout':
                $this->controller = 'Logout';
                break;
            case 'reminder':
                $this->controller = 'Reminder';
                break;
            case 'reminder_create':
                $this->controller = 'Reminder';
                $this->method = 'create';
                break;
            case 'reminder_store':
                $this->controller = 'Reminder';
                $this->method = 'store';
                break;
            case 'reminder_edit':
                $this->controller = 'Reminder';
                $this->method = 'edit';
                $this->params[] = $id;
                break;
            case 'reminder_update':
                $this->controller = 'Reminder';
                $this->method = 'update';
                $this->params[] = $id;
                break;
            case 'reminder_delete':
                $this->controller = 'Reminder';
                $this->method = 'delete';
                $this->params[] = $id;
                break;
        }

        require_once APP . 'controllers' . DS . $this->controller . '.php';
        $this->controller = new $this->controller;

        if (!method_exists($this->controller, $this->method)) {
            die("Method {$this->method} not found.");
        }

        call_user_func_array([$this->controller, $this->method], $this->params);
    }
}
