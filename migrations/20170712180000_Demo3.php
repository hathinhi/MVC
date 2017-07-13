<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 12/07/2017
 * Time: 10:09
 */
class Migration_Demo3 {
    public function up($conn) {
        $this->_create_table_demo($conn);
    }

    private function _create_table_demo($conn) {
        $sql = "CREATE TABLE `demo3s` (
              `id` int(11) NOT NULL AUTO_INCREMENT,
              `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
              `deleted` tinyint(4) DEFAULT '0',
              PRIMARY KEY (`id`)
            ) ENGINE=InnoDB AUTO_INCREMENT=392 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $conn->query($sql);

    }

    public function down($conn) {
        var_dump("down");
    }
}