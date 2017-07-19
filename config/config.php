<?php
define('URL', 'http://localhost/MVC/');
define('LIBS', 'libs/');
define('ICONV_ENABLED', FALSE);
define('MB_ENABLED', FALSE);
$_autoload['libs'] = array(
    'Session',
    'Auth',
    'Migration',
    'Hash',
    'AuthLogin',);

$config = Array(
    'protocol'  => 'smtp',
    'smtp_host' => 'ssl://smtp.gmail.com',
    'smtp_port' => 465,
    'smtp_user' => 'nhiht@ows.vn',
    'smtp_pass' => '22071994',);






define('CONFIG_EMAIL', $config);
define('AUTOLOAD', $_autoload['libs']);