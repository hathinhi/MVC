<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->title = 'Home';
        Auth::handleLogin();
        $this->view->js = array('public/js/default.js,TRUE');
        $this->view->css = array('public/css/default.css');
        $this->view->set_template('default');
    }

    function index() {
        $this->view->render("home/index");
    }

}
