<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
        $this->view->title = 'Home';
        Auth::handleLogin();
        $this->view->js = array('home/js/default.js');
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
