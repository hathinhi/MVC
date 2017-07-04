<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 29/06/2017
 * Time: 14:38
 */
class Database extends PDO {
    protected $arr_select = array();
    protected $arr_from = array();
    protected $arr_where = array();
    protected $arr_join = array();

    function __construct() {
        parent::__construct('mysql:host=localhost;dbname=login', 'root', '');
    }

    public function select($select = '*') {
        $this->arr_select = $select;
    }

    public function from($table) {
        $this->arr_from = $table;
    }

    public function where($data) {
        $this->arr_where = $data;
    }

    public function limit() {

    }

    public function join($table_join, $data_join) {
        array_push($this->arr_join, ['table' => $table_join, 'data' => $data_join]);
    }

    public function query() {
        $select = $this->arr_select;
        $table = $this->arr_from;
        $data_where = $this->arr_where;
        $joins = $this->arr_join;
        $str_join = NULL;
        foreach ($joins as $join) {
            $table_join = $join['table'];
            $data = $join['data'];
            $str_join .= " JOIN $table_join ON $data";
        }
        $str_join = trim($str_join);
        if (empty($data_where)) {

        } else {
            ksort($data_where);
            $fieldNames = implode(', ', array_keys($data_where));
            $fieldnames = explode(',', $fieldNames);
            $string = NULL;
            foreach ($fieldnames as $fieldname) {
                $fieldname = trim($fieldname);
                $string .= $fieldname . '=' . ':' . $fieldname . ' AND ';
            }
            $arr_where = rtrim($string, " AND ");
            $th = $this->prepare("SELECT $select FROM `$table` $str_join");
            foreach ($data_where as $key => $value) {
                $th->bindValue(":$key", $value);
            }
        }
        $th->execute();
        return $th->fetchAll();
    }

    public function get_all($table = '', $limit = NULL) {
        if ($limit == NULL) {
            $th = $this->prepare("SELECT * FROM `$table` WHERE id:id");
        } else {
            $th = $this->prepare("SELECT * FROM `$table` WHERE id=:id");
        }
        $th->execute();
        return $th->fetchAll();
    }

    public function get($table, $id, $limit = NULL) {
        $sth = $this->prepare("SELECT * FROM $table WHERE id = :id LIMIT $limit");
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