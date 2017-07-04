<?php

class Home extends Controller {
    public function __construct() {
        parent::__construct();
        session::init();
        $logged = Session::get('logIn');
        if ($logged == FALSE) {
            Session::destroy();
            header('Location:login');
            exit();
        }
        $this->view->js = array('home/js/default.js');
    }

    function index() {
        $this->view->render("home/index");
    }

    function xhrInsert()
    {
        $this->model->xhrInsert();
    }

    function xhrGetListings()
    {
        $this->model->xhrGetListings();
    }

    function xhrDeleteListing()
    {
        $this->model->xhrDeleteListing();
    }
}
