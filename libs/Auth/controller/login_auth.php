<?php

class Login_Auth extends Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('users');
        $this->view->js = array('public/js/login/login.js');
        $this->view->css = array('public/css/login/login.css');
        $this->view->set_template('login');
    }

    function index() {
        $this->view->render("../libs/Auth/view/index");
    }

    public function run() {
        var_dump('123466');
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $login = $this->users->login($username, $pass);
        if ($login) {
            Session::init();
            Session::set('login', TRUE);
            $this->direct('home');
        } else {
            $this->direct('login');
        }
    }
}
