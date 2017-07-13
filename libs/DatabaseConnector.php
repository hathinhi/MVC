<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 12/07/2017
 * Time: 15:57
 */
class DatabaseConnector extends PDO {
    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }
}