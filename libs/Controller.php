<?php

class Controller {
    const TEMPLATE_ROOT = "themes/";
    const VIEW_PATH = "views/";
    const MODEL_PATH = "models/";
    private $_template = NULL;
    protected $_models = array();

    public function __construct() {
        $this->view = new View();
    }

    function set_template($template_view) {
        $template_view = str_replace(".php", "", $template_view);
        $this->_template = self::TEMPLATE_ROOT . $template_view;
//        if (file_exists(self::VIEW_PATH . $this->_template . ".php")) {
//            $this->view->render($this->_template);
//        }
        return $this->_template;
    }

    public function output() {
        if (file_exists("views/" . $this->_path . ".php")) {
            ob_start();
//            $this->view->users = $this->model->listUser();
//            $this->view->render("user/index");
            $content = ob_get_contents();
            ob_end_clean();
            $this->view->content = $content;
            $this->view->render($this->_path);
        } else {
//            $this->view->users = $this->model->listUser();
//            $this->view->render("user/index");
        }
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

