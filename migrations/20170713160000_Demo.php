<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 12/07/2017
 * Time: 10:09
 */
class Migration_Demo extends Migration {
    public function up() {
        $this->_create_table_demo();
    }

    private function _create_table_demo() {
        $sql = "CREATE TABLE `demos` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `deleted` tinyint(4) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->query_struct($sql);

    }

    public function down() {
        var_dump("down");
    }
}