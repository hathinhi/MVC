<?php

class Controller {
    const MODEL_PATH = "models/";
    const MODEL_AUTH_PATH = 'libs/Auth/model/';
    protected $_models = array();

    public function __construct() {
        $this->view = new View();
    }

    public function loadModel($name, $auth = FALSE) {
        if ($auth) {
            $path = self::MODEL_AUTH_PATH . $name . '_model.php';
        } else {
            $path = self::MODEL_PATH . $name . '_model.php';
        }
        if (file_exists($path)) {
            require $path;
            $modelName = $name . '_Model';
            $this->$name = new $modelName();
        }
    }

    public function direct($url = NULL) {
        header('location:' . URL . $url);
    }

}

?>

