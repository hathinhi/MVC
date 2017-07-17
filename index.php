<?php
require("config/config.php");
require("config/database.php");
require("libs/urlHelper.php");
require("config/login.php");
require_once "config/migration.php";
function __autoload($class_name) {
    $directorys = array(
        'libs/',
        'util/',
        'libs/Auth/lib/',
        'libs/Auth/controller/',
    );
    //for each directory
    foreach ($directorys as $directory) {
        if (in_array($class_name, AUTOLOAD) || in_array('Auth', AUTOLOAD)) {
            if (file_exists($directory . $class_name . '.php')) {
                require_once($directory . $class_name . '.php');
                return;
            }
        }
    }
}

if (in_array('AuthLogin', AUTOLOAD)) {
    $model = new ModelBase();
}
if (in_array('Migration', AUTOLOAD)) {
    $migration = new Migration(TRUE);
}

$bootstrap = new Bootstrap();

