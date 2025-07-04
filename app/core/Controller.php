<?php
class Controller {
    public function model($model) {
        $path = MODELS . $model . '.php';
        if (file_exists($path)) {
            require_once $path;
            return new $model();
        }
        die("Model $model not found.");
    }

    public function view($view, $data = []) {
        extract($data);
        $viewPath = VIEWS . str_replace('/', DS, $view) . '.php';
        if (file_exists($viewPath)) {
            require $viewPath;
        } else {
            die("View $view not found.");
        }
    }

    public function redirect($url) {
        header("Location: $url");
        exit;
    }
}
