<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

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

    public function library($library, array $config = array()) {
        if (empty($library)) {
            return $this;
        } else {
            include_once('libs/' . ucwords($library) . '.php');
            $this->$library = new Email($config);
        }

    }

    public function direct($url = NULL) {
        header('location:' . URL . $url);
    }

    public function log($name) {
        $this->log = new Logger('log');
        $this->log->pushHandler(new StreamHandler('log/' . $name . '.log', Logger::DEBUG));
        $this->log->pushHandler(new FirePHPHandler());
        $this->log->info('My logger is now ready');
    }

}

?>

