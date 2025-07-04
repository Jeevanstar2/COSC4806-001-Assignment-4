<?php

class Controller {
    // Load model from /app/models/
    public function model($model) {
        require_once MODELS . $model . '.php';
        return new $model();
    }

    // Load view from /app/views/
    public function view($view, $data = []) {
        extract($data);
        require_once VIEWS . $view . '.php';
    }

    // Simple redirect
    public function redirect($url) {
        header("Location: $url");
        exit();
    }
}
