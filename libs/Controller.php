<?php

class Controller {
    const MODEL_PATH = "models/";
    protected $_models = array();

    public function __construct() {
        $this->view = new View();
    }

    public function loadModel($name) {
        $path = self::MODEL_PATH . $name . '_model.php';
        if (file_exists($path)) {
            require self::MODEL_PATH . $name . '_model.php';
            $modelName = $name . '_Model';
            $this->$name = new $modelName();
        }
    }

    public function direct($url) {
        header('location:' . URL . $url);
    }

}

?>

