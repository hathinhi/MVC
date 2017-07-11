<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->title = 'Home';
        Auth::handleLogin();
        $this->loadModel('user');
        $this->loadModel('cities');
    }

    function index() {
        $this->view->render('header');
        $this->view->users = $this->user->listUser();
        $this->view->cities = $this->cities->listCity();
        $this->view->render("home/index");
        $this->view->render('footer');
    }

}
