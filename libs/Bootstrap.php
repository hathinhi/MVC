<?php

class Bootstrap
{
    public function __construct()
    {
        $url = isset($_GET['url']) ? $_GET['url'] : null;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $url = explode('/', $url);
        if (empty($url[0])) {
            require "controllers/index.php";
            $controller = new Index();
            $controller->index();
            return false;
        }
        $file = "controllers/" . $url[0] . ".php";
        if (file_exists($file)) {
            require($file);
        } else {
            require "controllers/err.php";
            $controller = new Err();
            $controller->index();
            return false;
        }
        $controller = new $url[0];
        $controller->loadModel($url[0]);
        if (isset($url[1])) {
            if (method_exists($controller, $url[1]) == false) {
                require "controllers/err.php";
                $controller = new Err();
                $controller->index();
                return false;
            }
        }
        if (isset($url[2])) {
            if (method_exists($controller, $url[1])) {
                $controller->{$url[1]}($url[2]);
            } else {
                echo "errr";
            }

        } else {
            if (isset($url[1])) {
                $controller->{$url[1]}();
            } else {
                $controller->index();
            }
        }
    }
}

?>