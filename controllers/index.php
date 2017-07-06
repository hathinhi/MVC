<?php

class Index extends Controller {
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    function index() {
        $this->view->render("index/index");
    }
}