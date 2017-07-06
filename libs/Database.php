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
    protected $arr_where_or = array();
    protected $arr_where_xor = array();
    protected $arr_where_not = array();
    protected $arr_join = array();
    protected $limit = NULL;
    protected $like = NULL;
    protected $type = NULL;
    protected $arr_order_by = array();
    protected $arr_group_by = array();

    public function __construct($DB_TYPE, $DB_HOST, $DB_NAME, $DB_USER, $DB_PASS) {
        parent::__construct($DB_TYPE . ':host=' . $DB_HOST . ';dbname=' . $DB_NAME, $DB_USER, $DB_PASS);
    }

    public function select($select = '*') {
        $this->arr_select = $select;
    }

    public function from($table) {
        $this->arr_from = $table;
    }

    public function where($column_name, $value, $opt = "=") {
        array_push($this->arr_where, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    public function where_or($column_name, $value, $opt = "=") {
        array_push($this->arr_where_or, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    public function where_xor($column_name, $value, $opt = "=") {
        array_push($this->arr_where_xor, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    public function where_not($column_name, $value, $opt = "=") {
        array_push($this->arr_where_not, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    public function limit($limit = NULL) {
        $this->limit = $limit;
    }

    public function order_by($order_by, $sort) {
        array_push($this->arr_order_by, [$order_by, $sort]);
    }

    public function group_by($group_by) {
        array_push($this->arr_group_by, $group_by);
    }

    public function join($table_join, $data_join, $type = NULL) {
        array_push($this->arr_join, ['table' => $table_join, 'data' => $data_join]);
        $this->type = $type;
    }

    public function query() {
        $select = $this->arr_select;
        $table = $this->arr_from;
        $joins = $this->arr_join;
        $orders_by = $this->arr_order_by;
        $groups_by = $this->arr_group_by;
        if (empty($select)) {
            return "Error syntax";
            exit;
        }
        if (empty($table)) {
            return "Error syntax";
            exit;
        }
        $str_join = NULL;
        if (empty($joins)) {
            $str_join = NULL;
        } else {
            foreach ($joins as $join) {
                $table_join = $join['table'];
                $data = $join['data'];
                $str_join .= " JOIN $table_join ON $data";
            }
        }
        $str_join = trim(strtoupper($this->type) . ' ' . $str_join);
        $str_order_by = NULL;
        if (!empty($orders_by)) {
            foreach ($orders_by as $order_by) {
                $nameColumn = $order_by[0];
                $styleSort = $order_by[1];
                $str_order_by .= " ORDER BY $nameColumn $styleSort" . ",";
            }
            $str_order_by = rtrim($str_order_by, ",");
            $str_order_by = trim($str_order_by);
        }

        $str_group_by = NULL;
        if (!empty($groups_by)) {
            foreach ($groups_by as $group_by) {
                $nameGroupColumn = $group_by;
                $str_group_by .= ' ' . $nameGroupColumn . ",";
            }
            $str_group_by = "GROUP BY" . rtrim($str_group_by, ",");
            $str_group_by = trim($str_group_by);
        }
        $limit = NULL;
        if ($this->limit != NULL) {
            $limit = 'LIMIT' . $this->limit;
        }
        $data_where = $this->arr_where;
        $data_where_or = $this->arr_where_or;
        $data_where_xor = $this->arr_where_xor;
        $data_where_not = $this->arr_where_not;
        $arr_where = NULL;
        $arr_where_or = NULL;
        $arr_where_xor = NULL;
        $arr_where_not = NULL;
        if (!empty($data_where)) {
            $string = NULL;
            foreach ($data_where as $where) {
                $string .= $where['column_name'] . ' ' . strtoupper($where['opt']) . ' ' . ':' . $where['column_name'] . ' AND ';
            }
            $arr_where = 'WHERE ' . rtrim($string, " AND ");
        }

        if (!empty($data_where_or)) {
            $string_or = NULL;
            foreach ($data_where_or as $where_or) {
                $string_or .= $where_or['column_name'] . ' ' . strtoupper($where_or['opt']) . ' ' . ':' . $where_or['column_name'] . ' OR ';
            }
            $arr_where_or = 'WHERE ' . rtrim($string_or, " OR ");
        }
        if (!empty($data_where_xor)) {
            $string_xor = NULL;
            foreach ($data_where_xor as $where_xor) {
                $string_xor .= $where_xor['column_name'] . ' ' . strtoupper($where_xor['opt']) . ' ' . ':' . $where_xor['column_name'] . ' XOR ';
            }
            $arr_where_xor = 'WHERE ' . rtrim($string_xor, " XOR ");
        }
        if (!empty($data_where_not)) {
            $string_not = NULL;
            foreach ($data_where_not as $where_not) {
                $string_not .= $where_not['column_name'] . ' ' . strtoupper($where_not['opt']) . ' ' . ':' . $where_not['column_name'];
            }
            $arr_where_not = 'WHERE NOT ' . trim($string_not);

        }

        $th = $this->prepare("SELECT $select FROM `$table` $str_join $arr_where $arr_where_or $arr_where_xor $arr_where_not $str_order_by $str_group_by $limit ");
        foreach ($data_where as $value) {
            if (strtoupper($value['opt']) == 'LIKE') {
                $th->bindValue(":" . $value['column_name'] . "", '%' . $value['value'] . '%');
            } else {
                $th->bindValue(":" . $value['column_name'] . "", $value['value']);
            }

        }
        foreach ($data_where_or as $value) {
            if (strtoupper($value['opt']) == 'LIKE') {
                $th->bindValue(":" . $value['column_name'] . "", '%' . $value['value'] . '%');
            } else {
                $th->bindValue(":" . $value['column_name'] . "", $value['value']);
            }
        }
        foreach ($data_where_xor as $value) {
            if (strtoupper($value['opt']) == 'LIKE') {
                $th->bindValue(":" . $value['column_name'] . "", '%' . $value['value'] . '%');
            } else {
                $th->bindValue(":" . $value['column_name'] . "", $value['value']);
            }
        }
        foreach ($data_where_not as $value) {
            if (strtoupper($value['opt']) == 'LIKE') {
                $th->bindValue(":" . $value['column_name'] . "", '%' . $value['value'] . '%');
            } else {
                $th->bindValue(":" . $value['column_name'] . "", $value['value']);
            }
        }
        $th->execute();
        var_dump($th);
        return $th->fetchAll();
    }

    public function get_all($table = '', $limit = NULL) {
        if ($limit == NULL) {
            $th = $this->prepare("SELECT * FROM `$table`");
        } else {
            $th = $this->prepare("SELECT * FROM `$table`LIMIT $limit");
        }
        $th->execute(array(':id' => 'nhiht'));
        return $th->fetchAll();
    }

    public function get($table, $id, $limit = NULL) {
        $sth = $this->prepare("SELECT * FROM `$table` WHERE id = :id LIMIT $limit");
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
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $sth->execute();
    }

    public function update($table, $data, $where) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key` =:$key,";
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