<?php

class Migration_Create_member extends Migration {
    public function up() {
        $this->_create_table_demo();
    }

    private function _create_table_demo() {
        $sql = "CREATE TABLE `members` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `username` VARCHAR(100) NOT NULL ,
              `email` VARCHAR(100) NOT NULL ,
              `password` VARCHAR(250) NOT NULL,
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->query_struct($sql);

    }

    public function down() {
        var_dump("down");
    }
}