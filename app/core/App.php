<?php
class App 
{
    protected $controller = 'Home';
    protected $method = 'index';
    protected $params = [];
    public function __construct() 
    {
        $action = $_GET['action'] ?? 'login';
        switch ($action) 
        {
            case 'login':
                $this->controller = 'Login';
                $this->method = 'index';
                break;
            case 'verify':
                $this->controller = 'Verify';
                $this->method = 'index';
                break;
            case 'register':
                $this->controller = 'Register';
                $this->method = 'index';
                break;
            case 'store':
                $this->controller = 'Register';
                $this->method = 'store';
                break;
            case 'logout':
                $this->controller = 'Logout';
                $this->method = 'index';
                break;
            case 'home':
                $this->controller = 'Home';
                $this->method = 'index';
                break;
            case 'reminder':
                $this->controller = 'Reminder';
                $this->method = 'index';
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
                $this->params[] = $_GET['id'] ?? null;
                break;
            case 'reminder_update':
                $this->controller = 'Reminder';
                $this->method = 'update';
                $this->params[] = $_GET['id'] ?? null;
                break;
            case 'reminder_delete':
                $this->controller = 'Reminder';
                $this->method = 'delete';
                $this->params[] = $_GET['id'] ?? null;
                break;
            default:
                echo "404 Not Found";
                return;
        }
        $file = 'app/controllers/' . $this->controller . '.php';
        if (file_exists($file)) 
        {
            require_once $file;
            $this->controller = new $this->controller;
            call_user_func_array([$this->controller, $this->method], $this->params);
        } 
        else 
        {
            echo "Controller not found.";
        }
    }
}