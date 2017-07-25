<?php
session_start();

//Include Google client library
include_once 'src/Google_Client.php';
include_once 'src/contrib/Google_Oauth2Service.php';

/*
 * Configuration and setup Google API
 */
$clientId = '1030811526874-8hbnaqg6rc3bjbdhjbkfmltautpe2rm4.apps.googleusercontent.com';
$clientSecret = 'IP5aPF7TXWKYtmXXAE1KHHic';
$redirectURL = 'http://localhost/MVC/';

//Call Google API
$gClient = new Google_Client();
$gClient->setApplicationName('Login to CodexWorld.com');
$gClient->setClientId($clientId);
$gClient->setClientSecret($clientSecret);
$gClient->setRedirectUri($redirectURL);

$google_oauthV2 = new Google_Oauth2Service($gClient);
?>