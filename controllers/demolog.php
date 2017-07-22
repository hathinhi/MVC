<?php

class Demolog extends Controller {
    function __construct() {
    }

    function index() {
        $x = 'nhiha';
        $this->log($x);
    }
}