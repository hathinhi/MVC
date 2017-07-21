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
        echo $this->view->lang->account_creation_successful;
        $this->view->render("index/index");
    }
}