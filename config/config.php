<?php
define('URL', 'http://localhost/MVC/');
define('LIBS', 'libs/');
define('ICONV_ENABLED', FALSE);
define('LINKLOG', 'log');
define('MB_ENABLED', FALSE);
define('Composer', TRUE);
define('language', 'vi');

$_autoload['libs'] = array(
    'Session',
    'Auth',
    'Migration',
    'Hash',
    'Email',
    'Lang',
    'AuthLogin',
);

$config = Array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'hanhi.hust@gmail.com',
    'smtp_pass' => '22071994',);


define('CONFIG_EMAIL', $config);
define('AUTOLOAD', $_autoload['libs']);