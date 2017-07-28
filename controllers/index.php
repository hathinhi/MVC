<?php

class Index extends BaseController {
    public function __construct() {
        parent::__construct();
        $this->view->css("public/css/index/index.css");
        $this->view->set_template('base');
        if (LOGIN) {
            Auth::handleLogin();
        } else {
            Session::init();
            Session::set('login', TRUE);
        }
    }

    public function setting_class() {
        $this->name = Array(
            "class" => "index",
            "model" => "users",
            "object" => "Index",
        );
    }
}