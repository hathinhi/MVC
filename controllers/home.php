<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->title = 'Home';
        Auth::handleLogin();
        $this->view->js = array('public/js/default.js,TRUE','public/js/default1.js');
        $this->view->css = array('public/css/default.css');
    }

    function index() {
        $this->view->render('header');
        $this->view->render("home/index");
        $this->view->render('footer');
    }

    function xhrInsert() {
        $this->model->xhrInsert();
    }

    function xhrGetListings() {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing() {
        $this->model->xhrDeleteListing();
    }
}
