<?php

class Member extends BaseController {
    public function __construct() {
        parent::__construct();
        $this->view->css = array('public/css/index/index.css');
        $this->view->set_template('default');
        if (LOGIN) {
            Auth::handleLogin();
        } else {
            Session::init();
            Session::set('login', TRUE);
        }
    }

    public function setting_class() {
        $this->name = Array(
            "class" => "member",
            "model" => "members",
        );
    }
}