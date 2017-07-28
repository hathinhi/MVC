<?php

class View {
    const TEMPLATE_ROOT = "themes/";
    const VIEW_PATH = "views/";
    private $_template = NULL;
    public $_arrcss = array();
    public $_arrjs = array();

    public function __construct() {
        if (in_array('Lang', AUTOLOAD)) {
            $this->loadLang = new Lang();
            $this->lang = $this->loadLang->load();
        }
    }

    public function render($url) {
        if (file_exists(self::VIEW_PATH . $this->_template . ".php")) {
            ob_start();
            $this->load($url);
            $content = ob_get_contents();
            ob_end_clean();
            $this->content = $content;
            $this->load($this->_template);
        } else {
            require self::VIEW_PATH . $url . '.php';
        }

    }

    public function load($link) {
        require 'views/' . $link . '.php';
    }

    function set_template($template_view) {
        $template_view = str_replace(".php", "", $template_view);
        $this->_template = self::TEMPLATE_ROOT . $template_view;
    }

    public function css($css) {
        array_push($this->_arrcss, $css);
    }
    public function js($js) {
        array_push($this->_arrjs, $js);
    }
}

?>