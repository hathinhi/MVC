<?php
use Monolog\Logger;
use Monolog\Handler\StreamHandler;
use Monolog\Handler\FirePHPHandler;

class Controller {
    const MODEL_PATH = "models/";
    protected $_models = array();
    protected $_lang = NULL;

    public function __construct() {
        $this->view = new View();
        $this->input = new Input();

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

    public function log($content, $name = NULL) {
        if (Composer) {
            if (!isset($name) || $name == NULL) {
                $name = (string)date('Ymd');
            }

            $this->log = new Logger(LINKLOG);
            $this->log->pushHandler(new StreamHandler(LINKLOG . '/' . $name . '.txt', Logger::DEBUG));
            $this->log->pushHandler(new FirePHPHandler());
            $this->log->info($content);
        } else {
            echo "<div style='padding: 15px;margin-bottom: 20px;border: 1px solid transparent;border-radius: 4px; color: #8a6d3b;background-color: #fcf8e3;border-color: #faebcc;' class='alert alert-warning'>You should turn on composer in file config</div>";
        }
    }

}

?>

