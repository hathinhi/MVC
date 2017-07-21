<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 17/07/2017
 * Time: 11:05
 */
require_once 'libs/Auth/controller/login.php';

class SignIn extends Login {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->render("login/index");
    }

    function pass() {
        echo 'lay lai mat khau';
    }

}