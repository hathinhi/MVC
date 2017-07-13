<?php
require_once "config/migration.php";
require_once "Database.php";

class Migration {
    const MIGRATION_PATH = 'migrations/';
    protected $_version = array();
    protected $_className = array();
    protected $_classNameUp = array();
    protected $_fileName = array();
    protected $_current_version = NULL;

    public function __construct($test = FALSE) {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        if (!$this->table_exist()) {
            $this->creat_table();
        }
        $current_version = $this->current_version();
        $this->_current_version = empty($current_version) ? NULL : $current_version[0]['version'];
        if ($test) {
            $this->set_migration();
        }

    }

    private function table_exist() {
        $result = $this->db->query("SHOW TABLES LIKE 'migration_ver'");
        $tableExists = $result !== FALSE && $result->rowCount() > 0;
        return $tableExists;
    }

    private function current_version() {
        $th = $this->db->prepare("SELECT version FROM `migration_ver`");
        $th->execute();
        return $th->fetchAll();
    }

    private function fileMigration() {
        $files = scandir(self::MIGRATION_PATH);
        foreach ($files as $value) {
            if (strlen($value) > 15) {
                $version = substr($value, 0, 14);
                $className = str_replace($version, 'Migration', $value);
                $className = str_replace(".php", "", $className);
                array_push($this->_version, $version);
                if (((int)$version > (int)VER_MIGRATION)) {
                    array_push($this->_className, $className);
                } else if ((int)$version > (int)$this->_current_version) {
                    array_push($this->_classNameUp, $className);
                }
                array_push($this->_fileName, $value);
            }
        }
        return [$this->_version, $version, $this->_className];
    }

    /**
     * @param $conn
     */
    private function creat_table() {
        $sqlCreate = "CREATE TABLE IF NOT EXISTS `migration_ver` (
                        `version` bigint(20) NOT NULL
                        )ENGINE=InnoDB DEFAULT CHARSET=utf8;";
        $this->db->query($sqlCreate);
    }

    private function set_migration() {
        if (VER_MIGRATION == NULL) {
            echo "Config version is not null";
            exit();
        }
        $this->fileMigration();
        foreach ($this->_fileName as $file) {
            require_once self::MIGRATION_PATH . $file;
        }
        var_dump('sds', $this->_classNameUp);
        if ((int)$this->_current_version == (int)VER_MIGRATION) {

        } else {
            if (((int)VER_MIGRATION < (int)$this->_current_version) && ($this->_current_version != NULL)) {
                foreach ($this->_className as $class) {
                    $className = new $class();
                    $className->down();

                }
            } else {
                foreach ($this->_classNameUp as $class) {
                    $className = new $class();
                    $className->up();
                }
            }
        }
        if ($this->_current_version == NULL) {
            $sth = $this->db->prepare("INSERT INTO migration_ver(`version`) VALUE (:version)");
            $sth->bindValue(":version", VER_MIGRATION);
            $sth->execute();
        } else {
            $sth = $this->db->prepare("UPDATE `migration_ver` SET version = :version");
            $sth->bindValue(":version", VER_MIGRATION);
            $sth->execute();
        }
    }

}
