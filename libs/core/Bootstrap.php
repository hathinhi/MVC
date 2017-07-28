<?php

class Bootstrap {
    public $url = array();
    private $_url = NULL;
    private $_controller = NULL;
    private $_controllerPath = 'controllers/';
    private $_modelPath = 'models/';
    private $_errorFile = 'error.php';
    private $_defaultFile = 'index.php';

    public function __construct() {
        require_once "controller-base/BaseController.php";
        require_once "model-crud/CrudModel.php";
        $this->_getUrl();
        if (empty($this->_url[0])) {
            $this->_loadControllerDefault();
            return FALSE;
        }
        $this->_loadExistingController();
        $this->_callControllerMethod();
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
        $this->_url = $this->arraytolower($this->_url);
    }

    private function _loadControllerDefault() {
        require $this->_controllerPath . $this->_defaultFile;
        $controller = new Index();
        $controller->index();
    }


    private function _loadExistingController() {
        $url0 = $this->configUrl($this->_url[0]);
        $file = $this->_controllerPath . $url0 . '.php';
        if (strtolower($url0) === 'auth') {
            $base_url = 'libs/Auth/controller/';
            return $this->_loadBaseController($base_url);
        } else {
            if (file_exists($file)) {
                require $file;
            } else {
                $this->_error();
                return FALSE;
            }
            $this->_controller = new $url0;
        }
    }

    private function _callControllerMethod() {
        $length = count($this->_url);
        if ($length > 1) {
            $url1 = $this->configUrl($this->_url[1]);
            if (!method_exists($this->_controller, $url1)) {
                $this->_error();
            }
        }
        //Controller->Method(Param1, Param2, Param3,.....)
        if ($length == 1) {
            $this->_controller->index();
        } else {
            $link_url = NULL;
            for ($i = 2; $i < $length; $i++) {
                $url = $this->configUrl($this->_url[$i]);
                if (isset($url)) {
                    $link_url .= $url . ',';
                }
            }
            $link_url = rtrim($link_url, ',');
//            $url1 = $this->configUrl($this->url[1]);
            $this->_controller->{$url1}($link_url);
        }
    }

    private function _error() {
        require "controllers/err.php";
        $controller = new Err();
        $controller->index();
        exit;
    }

    /**
     * @return bool
     */
    private function _loadBaseController($base_url) {
        $url1 = $this->configUrl($this->_url[1]);
        $file = $base_url . $url1 . '.php';
        if (file_exists($file)) {
            require_once $file;
            $this->_controller = new $url1;
            $length = count($this->_url);
            if ($length > 2) {
                $url2 = $this->configUrl($this->_url[2]);
                if (!method_exists($this->_controller, $url2)) {
                    $this->_error();
                }
            }
            //Controller->Method(Param1, Param2, Param3,.....)
            if ($length == 2) {
                $this->_controller->index();
            } else {
                $link_url = NULL;
                for ($i = 3; $i < $length; $i++) {
                    $url = $this->configUrl($this->_url[$i]);
                    if (isset($url)) {
                        $link_url .= $url . ',';
                    }
                }
                $link_url = rtrim($link_url, ',');
//                $url2 = $this->configUrl($this->url[2]);
                $this->_controller->{$url2}($link_url);
            }
        } else {
            $this->_error();
            return FALSE;
        }
        exit();
    }

    /**
     *Convert url to lower
     *
     * @param      $array
     * @param bool $include_leys
     *
     * @return mixed
     */
    function arraytolower($array, $include_leys = FALSE) {

        if ($include_leys) {
            foreach ($array as $key => $value) {
                if (is_array($value))
                    $array2[strtolower($key)] = arraytolower($value, $include_leys);
                else
                    $array2[strtolower($key)] = strtolower($value);
            }
            $array = $array2;
        } else {
            foreach ($array as $key => $value) {
                if (is_array($value))
                    $array[$key] = arraytolower($value, $include_leys);
                else
                    $array[$key] = strtolower($value);
            }
        }

        return $array;
    }

    //url with config
    public function configUrl($urlbase) {
        include("config/url.php");
        if (!isset($url) OR !is_array($url)) {
            return $urlbase;
        }
        $this->url = array_merge($this->url, $url);
        $url = $urlbase;
        if (in_array($urlbase, $this->url)) {
            $key = array_search($urlbase, $this->url);
            $url = $key;
        }
        return $url;
    }

}
