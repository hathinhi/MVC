<?php
class Demolog extends Controller {
    function __construct() {
        var_dump('demo ssdsd');
    }

    function index() {
      $this->log('nhit');
    }
}