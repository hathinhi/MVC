<?php
define('APPPATH', NULL);

if (file_exists(APPPATH . 'config/config.php')) {
    require_once(APPPATH . 'config/config.php');
}
if (file_exists(APPPATH . 'config/database.php')) {
    require_once(APPPATH . 'config/database.php');
}
if (file_exists(APPPATH . 'config/login.php')) {
    require_once(APPPATH . 'config/login.php');
}

if (file_exists(APPPATH . 'config/migration.php')) {
    require_once(APPPATH . 'config/migration.php');
}
if (file_exists(APPPATH . 'libs/urlHelper.php')) {
    require_once(APPPATH . 'libs/urlHelper.php');
}
if (Composer) {
    file_exists(APPPATH . 'vendor/autoload.php')
        ? require_once(APPPATH . 'vendor/autoload.php')
        : '';
}
if (file_exists('libs/core/Bootstrap.php')) {
    require_once('libs/core/Bootstrap.php');
}
if (file_exists('libs/Input.php')) {
    require_once('libs/Input.php');
}
if (file_exists('libs/core/Controller.php')) {
    require_once('libs/core/Controller.php');
}
if (file_exists('libs/core/QueryBuilder.php')) {
    require_once('libs/core/QueryBuilder.php');
}
if (file_exists('libs/core/Database.php')) {
    require_once('libs/core/Database.php');
}
if (file_exists('libs/core/Model.php')) {
    require_once('libs/core/Model.php');
}
if (file_exists('libs/core/View.php')) {
    require_once('libs/core/View.php');
}
if (file_exists('libs/Upload.php')) {
    require_once('libs/Upload.php');
}
foreach (AUTOLOAD as $key => $class_name) {
    if (file_exists('libs/' . $class_name . '.php')) {
        require_once('libs/' . $class_name . '.php');
    }
}
if (in_array('AuthLogin', AUTOLOAD)) {
    if (file_exists('libs/Auth/lib/ModelBase.php')) {
        require_once('libs/Auth/lib/ModelBase.php');
    }
    if (file_exists('libs/Auth/controller/login.php')) {
        require_once('libs/Auth/controller/login.php');
    }
    $model = new ModelBase();
}

if (in_array('Migration', AUTOLOAD)) {
    $migration = new Migration(TRUE);
}
$bootstrap = new Bootstrap();
