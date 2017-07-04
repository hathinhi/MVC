<?php

class View
{
    public function __construct()
    {
    }

    public function render($link, $noInclude = false)
    {
        if ($noInclude == true) {
            require 'views/' . $link . '.php';
        } else {
            require "views/header.php";
            require("views/" . $link . ".php");
            require "views/footer.php";
        }

    }
}

?>