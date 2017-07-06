<?php

class Auth {

    public static function handleLogin() {
        @session_start();
        $logged = $_SESSION['logIn'];
        if ($logged == FALSE) {
            session_destroy();
            header('location:login');
            exit;
        }
    }

}
