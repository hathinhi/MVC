<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 22/07/2017
 * Time: 15:16
 */
class Migration_Google_user extends Migration {
    public function up() {
        $this->_create_table_google_user();
    }

    public function _create_table_google_user() {
        $sql = "CREATE TABLE `google_users` (
             `id` int(11) NOT NULL AUTO_INCREMENT,
             `oauth_provider` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
             `oauth_uid` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
             `first_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
             `last_name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
             `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
             `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
             `locale` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
             `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
             `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
             `created` datetime NOT NULL,
             `modified` datetime NOT NULL,
             PRIMARY KEY (`id`)
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
        $this->db->query_struct($sql);
    }
}