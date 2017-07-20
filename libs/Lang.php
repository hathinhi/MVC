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
        $this->load();
    }

    public function load($return = TRUE) {
        $path = 'libs/lang/'.language;
        $files = scandir($path);
        foreach ($files as $value) {
            if (strlen($value) > 5) {
//                $name = str_replace('_lang.php', '', $value);
                include($path . '/' . $value);
                if (!isset($lang) OR !is_array($lang)) {
                    if ($return === TRUE) {
                        return array();
                    }

                }
                $this->language = array_merge($this->language, $lang);
//                var_dump(array()$name=$lang);
//                array_push($this->language, $lang);
            }
        }
        return (object)$this->language;
    }
}