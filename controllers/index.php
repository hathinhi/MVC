<?php

class Index extends Controller {
    public function __construct() {
        parent::__construct();
        if (LOGIN) {
            Auth::handleLogin();
        }
    }

    function index() {
        $this->view->render("index/index");
    }
}