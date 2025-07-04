<?php
class Controller {
    public function model($model) {
        require_once MODELS . $model . '.php';
        return new $model();
    }

    public function view($view, $data = []) {
        extract($data);
        require VIEWS . $view . '.php';
    }
}
