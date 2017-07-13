<?php

class Login extends Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('user');
    }

    function index() {
        $this->view->render("login/index");
    }

    public function run() {
        $this->user->run();
    }
}