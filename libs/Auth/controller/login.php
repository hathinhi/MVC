<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 17/07/2017
 * Time: 11:21
 */
class Login extends Controller {
    const MODEL_AUTH_PATH = 'libs/Auth/model/';

    public function __construct() {
        parent::__construct();
        $this->loadModel('user',self::MODEL_AUTH_PATH);
        $this->view->js = array('public/js/login/login.js');
        $this->view->css = array('public/css/login/login.css');
        $this->view->set_template('login');
    }

    function index() {
        $this->view->render("../libs/Auth/view/index");
    }

    public function run() {
        $username=$this->input->post('username');
        $pass=$this->input->post('pass');
        $login = $this->user->login($username, $pass);
        if ($login) {
            Session::init();
            Session::set('login', TRUE);
            $this->direct('home');
        } else {
            $this->direct('Auth/login');
        }
    }
}
