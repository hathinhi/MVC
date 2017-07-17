<?php
require("config/paths.php");
require("libs/Migration.php");
require("config/database.php");
require("util/Auth.php");
require("libs/urlHelper.php");
require("config/autoload.php");
require("config/login.php");
require('libs/Auth/lib/modelBase.php');
function __autoload($class_name) {
    $directorys = array(
        'libs/',
    );

    //for each directory
    foreach ($directorys as $directory) {
        if (file_exists($directory . $class_name . '.php')) {
            require_once($directory . $class_name . '.php');
            return;
        }
    }
}
$bootstrap = new Bootstrap();

