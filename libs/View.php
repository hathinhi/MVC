<?php

class View {
    public function __construct() {
    }

    public function index() {

    }

    public function render($link, $noInclude = FALSE) {
        require 'views/' . $link . '.php';

    }
}

?>