<?php
session_start(); //session start
require_once('libraries/Google/autoload.php');


class Index extends Controller {
    function __construct() {
    }

    public function index() {
        $client = new Google_Client();
        $client->setClientId(CLIENTID);
        $client->setClientSecret(client_secret);
        $client->setRedirectUri(URL);
        $client->addScope("email");
        $client->addScope("profile");
        $service = new Google_Service_Oauth2($client);
        if (isset($_GET['code'])) {
            $client->authenticate($_GET['code']);
            $_SESSION['access_token'] = $client->getAccessToken();
            header('Location: ' . filter_var(URL, FILTER_SANITIZE_URL));
            exit;
        }
        var_dump($_GET['code']);

        if (isset($_SESSION['access_token']) && $_SESSION['access_token']) {
            $client->setAccessToken($_SESSION['access_token']);
        } else {
            $authUrl = $client->createAuthUrl();
        }
        $this->authUrl = $authUrl;
        $this->view->render('index/index');

    }

}

