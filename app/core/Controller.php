<?php
define('VIEWS', __DIR__ . '/../views/');
define('MODELS', __DIR__ . '/../models/');

class Controller {
    public function model($model) {
        require_once MODELS . "{$model}.php";
        return new $model();
    }

    public function view($view, $data = []) {
        extract($data);
        require_once VIEWS . "{$view}.php";
    }
}
