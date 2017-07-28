<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 20/07/2017
 * Time: 17:01
 */
class Lang {
    public $language = array();

    function __construct() {
    }

    public function load($return = TRUE) {
        $language = isset($_COOKIE['language']) ? $_COOKIE : NULL;
        if ($language != NULL) {
            $path = 'lang/' . $language['language'];
        } else {
            $path = 'lang/' . language;
        }
        $files = scandir($path);
        foreach ($files as $value) {
            if (strlen($value) > 5) {
                include($path . '/' . $value);
                if (!isset($lang) OR !is_array($lang)) {
                    if ($return === TRUE) {
                        return array();
                    }
                }
                $this->language = array_merge($this->language, $lang);
            }
        }
        return (object)$this->language;
    }

    public function setLang($lang) {
        setcookie('language', $lang, 0, '/');
    }
}