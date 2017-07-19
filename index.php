<?php
require("config/config.php");
require("config/database.php");
require("libs/urlHelper.php");
require("config/login.php");
require_once "config/migration.php";
function __autoload($class_name) {
    $directories = array(
        'libs/',
        'libs/core/',
        'util/',
        'libs/Auth/lib/',
        'libs/Auth/controller/',
    );
    //for each directory
    foreach ($directories as $directory) {
        if (in_array($class_name, AUTOLOAD) || in_array('AuthLogin', AUTOLOAD)) {
            if (file_exists($directory . $class_name . '.php')) {
                require_once($directory . $class_name . '.php');
                return;
            }
        }
        if (file_exists('libs/core/' . $class_name . '.php')) {
            require_once('libs/core/' . $class_name . '.php');
            return;
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

