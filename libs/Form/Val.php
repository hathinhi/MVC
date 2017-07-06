<?php

class Val {
    public function __construct() {

    }

    public function minlength($data, $arg) {
        if (strlen($data) < $arg) {
            return "Your string can only be $arg long";
        }
    }

    public function email($email) {
        if (empty($email)) {
            return "Email is required";
        } else {
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                return "Invalid email format";
            }
        }
    }

    public function phone_number($phone) {
        if (!empty($phone)) {
            $pattern = '/^(?:\(\+?44\)\s?|\+?44 ?)?(?:0|\(0\))?\s?(?:(?:1\d{3}|7[1-9]\d{2}|20\s?[78])\s?\d\s?\d{2}[ -]?\d{3}|2\d{2}\s?\d{3}[ -]?\d{4})$/';
            if (!preg_match($pattern, $phone)) {
                return "Invalid phone number";
            }
        }
    }

    public function rePassword($password, $repassword) {
        if ($password == $repassword) {
            return TRUE;
        } else {
            return "Re_password is wrong";
        }
    }

    public function url($url) {
        if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i", $url)) {
            return "Invalid URL";
        }

    }

    public function maxlength($data, $arg) {
        if (strlen($data) > $arg) {
            return "Your string can only be $arg long";
        }
    }

    public function digit($data) {
        if (ctype_digit($data) == FALSE) {
            return "Your string must be a digit";
        }
    }

    public function __call($name, $arguments) {
        throw new Exception("$name does not exist inside of: " . __CLASS__);
    }

}