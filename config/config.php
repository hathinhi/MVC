<?php
define('URL', 'http://localhost/MVC/');
define('LIBS', 'libs/');
define('ICONV_ENABLED', FALSE);
define('LINKLOG', 'log');
define('MB_ENABLED', FALSE);
define('Composer', TRUE);
define('language', 'vi');
define('CLIENTID','1030811526874-8hbnaqg6rc3bjbdhjbkfmltautpe2rm4.apps.googleusercontent.com');
define('client_secret','IP5aPF7TXWKYtmXXAE1KHHic');
$_autoload['libs'] = array(
    'Session',
    'Auth',
    'Migration',
    'Hash',
    'Email',
    'Lang',
);

$config = Array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'hanhi.hust@gmail.com',
    'smtp_pass' => '22071994',);


define('CONFIG_EMAIL', $config);
define('AUTOLOAD', $_autoload['libs']);