<?php

class Auth {

    public static function handleLogin() {
        @session_start();
        $logged = $_SESSION['login'];
        if ($logged == FALSE) {
            session_destroy();
            header('location:auth/login');
            exit;
        }
    }

}
