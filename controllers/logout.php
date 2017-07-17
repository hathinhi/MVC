<?php

class Logout extends Controller {
    public function __construct() {
        parent::__construct();
        Session::init();
        Session::destroy();
        $this->direct('Auth/login');
    }

}