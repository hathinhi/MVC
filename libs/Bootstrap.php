<?php

class Bootstrap {
    private $_url = NULL;
    private $_controller = NULL;

    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    public function __construct() {
        $this->_getUrl();
        if (empty($this->_url[0])) {
            $this->_loadControllerDefault();
            return FALSE;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
        $migration = new Migration();
    }

    public function setControllerPath($path) {
        $this->_controllerPath = trim($path, '/') . '/';
    }

    public function setModelPath($path) {
        $this->_modelPath = trim($path, '/') . '/';
    }

    public function setErrorFile($path) {
        $this->_errorFile = trim($path, '/');
    }

    public function setDefaultFile($path) {
        $this->_defaultFile = trim($path, '/');
    }

    /**
     * @return array|mixed|null|string
     */
    private function _getUrl() {
        $url = isset($_GET['url']) ? $_GET['url'] : NULL;
        $url = rtrim($url, "/");
        $url = filter_var($url, FILTER_SANITIZE_URL);
        $this->_url = explode('/', $url);
    }

    private function _loadControllerDefault() {
        require $this->_controllerPath . $this->_defaultFile;
        $controller = new Index();
        $controller->index();
    }

    private function _loadExistingController() {

        $file = $this->_controllerPath . $this->_url[0] . '.php';
        if (file_exists($file)) {
            require $file;
        } else {
            $this->_error();
            return FALSE;
        }
        $this->_controller = new $this->_url[0];
    }

    private function _callControllerMethod() {
        $length = count($this->_url);
        if ($length > 1) {
            if (!method_exists($this->_controller, $this->_url[1])) {
                $this->_error();
            }
        }
        //Controller->Method(Param1, Param2, Param3,.....)
        if ($length == 1) {
            $this->_controller->index();
        } else {
            $link_url = NULL;
            for ($i = 2; $i < $length; $i++) {
                if (isset($this->_url[$i])) {
                    $link_url .= $this->_url[$i] . ',';
                }
            }
            $link_url = rtrim($link_url, ',');
            $this->_controller->{$this->_url[1]}($link_url);
        }
    }

    private function _error() {
        require "controllers/err.php";
        $controller = new Err();
        $controller->index();
        exit;
    }
}
