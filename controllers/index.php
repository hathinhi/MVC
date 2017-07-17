<?php

class Index extends Controller {
    public function __construct() {
        parent::__construct();
        if (LOGIN) {
            Auth::handleLogin();
        } else {
            Session::init();
            Session::set('login', TRUE);
        }
    }

    function index() {
        $this->view->render("index/index");
    }
}