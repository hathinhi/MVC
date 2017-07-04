<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 29/06/2017
 * Time: 14:38
 */
class Database extends PDO {
    function __construct() {
        parent::__construct('mysql:host=localhost;dbname=login', 'root', '');
    }

    public function get_all($table, $limit = NULL) {
        if ($limit == NULL) {
            $th = $this->prepare("SELECT * FROM `$table`");
        } else {
            $th = $this->prepare("SELECT * FROM `$table` LIMIT $limit");
        }
        $th->execute();
        return $th->fetchAll();
    }

    public function get($table, $id, $limit = NULL) {
        $sth = $this->prepare("SELECT * FROM $table WHERE id = :id LIMIT 2");
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

    public function get_many($table) {
        $sth = $this->prepare("SELECT * FROM users");
        $sth->execute();
        $sth->fetchAll();
    }

    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES ($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key`=:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE $where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function delete($table, $where, $limit = 1) {
        return $this->exec("DELETE FROM $table WHERE $where LIMIT $limit");
    }

}