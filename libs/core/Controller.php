<?php

class Controller {
    const MODEL_PATH = "models/";
    protected $_models = array();

    public function __construct() {
        $this->view = new View();
    }

    public function loadModel($name, $auth = FALSE) {
        if (empty($name)) {
            return $this;
        } else {
            if ($auth) {
                $path = $auth . $name . '_model.php';
            } else {
                $path = self::MODEL_PATH . $name . '_model.php';
            }
            if (file_exists($path)) {
                require $path;
                $modelName = $name . '_Model';
                $this->$name = new $modelName();
            }
        }
    }

    public function library($library, $params = NULL, $object_name = NULL) {
        if (empty($library)) {
            return $this;
        } elseif (is_array($library)) {
            foreach ($library as $key => $value) {
                if (is_int($key)) {
                    $this->library($value, $params);
                } else {
                    $this->library($key, $params, $value);
                }
            }

            return $this;
        }

        if ($params !== NULL && !is_array($params)) {
            $params = NULL;
        }

        $this->_load_library($library, $params, $object_name);
        return $this;
    }

    protected function _load_library($class, $params = NULL, $object_name = NULL) {
        include_once('libs/Email.php');
    }

    public function direct($url = NULL) {
        header('location:' . URL . $url);
    }

}

?>

