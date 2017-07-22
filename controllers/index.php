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
        $this->view->render('index/index');
    }

    public function configLang() {
        $lang = $_POST['en'];
        $this->view->loadLang->setLang($lang);
        $this->direct('index');
    }
}