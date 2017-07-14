<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 29/06/2017
 * Time: 14:38
 */
class Database extends QueryBuilder {
    /**
     * Database constructor.
     *
     * @param $DB_TYPE
     * @param $DB_HOST
     * @param $DB_NAME
     * @param $DB_USER
     * @param $DB_PASS
     */

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }
}