<?php

class Logout extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        Session::destroy();
        header('Location:login');
    }

}