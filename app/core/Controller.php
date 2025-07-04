<?php

class Controller {
    public function view(string $view, array $data = []) {
        extract($data);
        require VIEWS . $view . '.php';
    }

    public function model(string $model) {
        require_once MODELS . $model . '.php';
        return new $model();
    }
}
