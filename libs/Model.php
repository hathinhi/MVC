<?php

class Model {

    public function __construct() {
        $this->db = new Database(DB_TYPE, DB_HOST, DB_NAME, DB_USER, DB_PASS);
        $this->createUser();
    }

    public function createUser() {
        if (TABLE == NULL) {
            $result = $this->db->query("SHOW TABLES LIKE 'users'");
            $tableExists = $result !== FALSE && $result->rowCount() > 0;
            if (!$tableExists) {
                $sqlCreate = "CREATE TABLE `users` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` VARCHAR(100) NOT NULL ,
              `email` VARCHAR(100) NOT NULL ,
              `password` VARCHAR(250) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
                $rult = $this->db->query($sqlCreate);
                if ($rult == FALSE) {
                    print_r($this->db->errorinfo()[2]);
                    exit();
                }
                $sth = $this->db->prepare("INSERT INTO users(`username`,`email`,`password`) VALUE (:username,:email,:password)");
                $sth->bindValue(':username', 'admin');
                $sth->bindValue(':email', 'admin@ows.vn');
                $sth->bindValue(':password', Hash::create('md5', '123123', 1));
                $sth->execute();
            }
        }
    }
}
