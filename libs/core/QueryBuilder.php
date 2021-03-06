<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 13/07/2017
 * Time: 16:29
 */
abstract class QueryBuilder extends PDO {
    /**
     * DB Select data
     *
     * @var array
     * */
    protected $arr_select = array();
    /**
     * DB from data
     *
     * @var array
     */
    protected $arr_from = array();
    /**
     * BD where data
     *
     * @var array
     */
    protected $arr_where = array();
    /**
     * DB where or data
     *
     * @var array
     */
    protected $arr_where_or = array();
    /**
     * DB where not data
     *
     * @var array
     */
    protected $arr_where_not = array();
    /**
     * DB join data
     *
     * @var array
     */
    protected $arr_join = array();
    /**
     * DB limit value
     *
     * @var null
     */
    protected $limit = NULL;
    /**
     * DB like value
     *
     * @var null
     */
    protected $like = NULL;
    /**
     * DB type query value
     *
     * @var null
     */
    protected $type = NULL;
    /**
     * DB order_by data
     *
     * @var array
     */
    protected $arr_order_by = array();
    /**
     * DB group_by data
     *
     * @var array
     */
    protected $arr_group_by = array();

    public function select($select = '*') {
        $this->arr_select = $select;
    }

    public function from($table) {
        $this->arr_from = $table;
    }

    /**
     * @param        $column_name
     * @param        $value
     * @param string $opt
     */
    public function where($column_name, $value, $opt = "=") {
        array_push($this->arr_where, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    /**
     * @param        $column_name
     * @param        $value
     * @param string $opt
     */

    public function where_or($column_name, $value, $opt = "=") {
        array_push($this->arr_where_or, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    /**
     * @param        $column_name
     * @param        $value
     * @param string $opt
     */

    public function where_not($column_name, $value, $opt = "=") {
        array_push($this->arr_where_not, ['column_name' => $column_name, 'value' => $value, 'opt' => $opt]);
    }

    /**
     * @param null $limit
     */

    public function limit($limit = NULL) {
        $this->limit = $limit;
    }

    /**
     * @param $order_by
     * @param $sort
     */

    public function order_by($order_by, $sort) {
        array_push($this->arr_order_by, [$order_by, $sort]);
    }

    /**
     * @param $group_by
     */

    public function group_by($group_by) {
        array_push($this->arr_group_by, $group_by);
    }

    /**
     * @param      $table_join
     * @param      $data_join
     * @param null $type
     */

    public function join($table_join, $data_join, $type = NULL) {
        array_push($this->arr_join, ['table' => $table_join, 'data' => $data_join]);
        $this->type = $type;
    }

    /**
     * Run prepare value, binvalue and execute
     * Return data select
     *
     * @return string
     */
    public function query_db() {
        if (empty($this->arr_select) || empty($this->arr_from)) {
            return "Error syntax" . $this->arr_select . $this->arr_from;
            exit;
        }
        $limit = $this->setLimit();
        $str_join = $this->setJoin($this->arr_join);
        $str_order_by = $this->setOrderBy($this->arr_order_by);
        $str_group_by = $this->setGroupBy($this->arr_group_by);
        $arr_where = $this->strWhere($this->arr_where);
        $arr_where_or = $this->strWhereOr($this->arr_where_or);
        $arr_where_not = $this->strWhereNot($this->arr_where_not);
        $arr_query_where = $this->checkArrWhere($arr_where_or, $arr_where_not, $arr_where);
        $str_query = $str_join . $arr_query_where . ' ' . $str_order_by . ' ' . $str_group_by . ' ' . $limit;
        $th = $this->prepare("SELECT $this->arr_select FROM `$this->arr_from` $str_query");
        $data_query = array_merge($this->arr_where, $this->arr_where_or, $this->arr_where_not);
        $this->bindValue($data_query, $th);
        $th->execute();
        return $th->fetchAll();
    }

    /**
     * Run query database: Run basic sql commands
     *
     * @param       $sql
     * @param array $array
     * @param int   $fetchMode
     *
     * @return mixed
     */
    public function base_query($sql, $array = array(), $fetchMode = PDO::FETCH_ASSOC) {
        $sth = $this->prepare($sql);
        foreach ($array as $key => $value) {
            $sth->bindValue("$key", $value);
        }

        $sth->execute();
        return $sth->fetchAll($fetchMode);
    }

    /**
     * Select all data in table
     *
     * @param string $table
     * @param null   $limit
     *
     * @return mixed
     */
    public function get_all($table = '', $limit = NULL) {
        if ($limit == NULL) {
            $th = $this->prepare("SELECT * FROM `$table`");
        } else {
            $th = $this->prepare("SELECT * FROM `$table`LIMIT $limit");
        }
        $th->execute();
        return $th->fetchAll();
    }


    /**
     * tra ve 1 phan tu
     *
     * @param string $table
     * @param        $id
     *
     * @return array
     */
//    public function get_by($table = '', $id) {
//        $th = $this->prepare("SELECT * FROM `$table` WHERE id=$id LIMIT 1");
//        $th->execute();
//        return $th->fetchAll();
//    }

    /**
     * tra ve 1 phan tu
     *
     * @param string $table
     * @param        $id
     *
     * @return array
     */
    public function get($table = '', $id) {
        $th = $this->prepare("SELECT * FROM `$table` WHERE id=$id");
        $th->execute();
        return $th->fetch();
    }

    /**
     * Insert database
     *
     * @param $table
     * @param $data
     */

    public function insert($table, $data) {
        ksort($data);
        $fieldNames = implode('`, `', array_keys($data));
        $fieldValues = ':' . implode(', :', array_keys($data));
        $sth = $this->prepare("INSERT INTO $table (`$fieldNames`) VALUES($fieldValues)");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $result = $sth->execute();
        return $result;
    }

    /**
     * Update database
     *
     * @param $table
     * @param $data
     * @param $where
     */

    public function update($where, $table, $data) {
        ksort($data);
        $fieldDetails = NULL;
        foreach ($data as $key => $value) {
            $fieldDetails .= "`$key` =:$key,";
        }
        $fieldDetails = rtrim($fieldDetails, ',');

        $sth = $this->prepare("UPDATE $table SET $fieldDetails WHERE `id`=$where");

        foreach ($data as $key => $value) {
            $sth->bindValue(":$key", $value);
        }

        $result = $sth->execute();
        return $result;
    }

    /**
     * Delete database
     *
     * @param     $table
     * @param     $where
     * @param int $limit
     *
     * @return mixed
     */
    public function delete($where, $table, $column) {
        if ($column) {
            $sth = $this->prepare("UPDATE $table SET `$column`=1 WHERE `id`=$where");
            $result = $sth->execute();
            return $result;
        } else {
            return $this->exec("DELETE FROM $table WHERE `id`= $where LIMIT 1");
        }
    }


    /**
     * @param $data_where
     * @param $th
     *
     * @return mixed
     */
    private function bindValue($data_where, $th) {
        foreach ($data_where as $value) {
            if (strtoupper($value['opt']) == 'LIKE') {
                $th->bindValue(":" . $value['column_name'] . "", '%' . $value['value'] . '%');
            } else {
                $th->bindValue(":" . $value['column_name'] . "", $value['value']);
            }

        }
    }

    /**
     * @param $joins
     *
     * @return null|string
     */
    private function setJoin($joins) {
        $str_join = NULL;
        if (!empty($joins)) {
            foreach ($joins as $join) {
                $table_join = $join['table'];
                $data = $join['data'];
                $str_join .= " JOIN $table_join ON $data";
            }
        }
        $str_join = trim(strtoupper($this->type) . ' ' . $str_join);
        return $str_join;
    }

    /**
     * @param $orders_by
     *
     * @return null|string
     */
    private function setOrderBy($orders_by) {
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
        return $str_order_by;
    }

    /**
     * @param $groups_by
     *
     * @return null|string
     */
    private function setGroupBy($groups_by) {
        $str_group_by = NULL;
        if (!empty($groups_by)) {
            foreach ($groups_by as $group_by) {
                $nameGroupColumn = $group_by;
                $str_group_by .= ' ' . $nameGroupColumn . ",";
            }
            $str_group_by = "GROUP BY" . rtrim($str_group_by, ",");
            $str_group_by = trim($str_group_by);
        }
        return $str_group_by;
    }

    /**
     * @param $arr_where_or
     * @param $arr_where_not
     * @param $arr_where
     *
     * @return string
     */
    private function checkArrWhere($arr_where_or, $arr_where_not, $arr_where) {
        if ($arr_where_or == NULL && $arr_where_not == NULL && $arr_where == NULL) {
            $arr_query_where = '';
        } else if ($arr_where_or == NULL && $arr_where_not == NULL) {
            $arr_query_where = 'WHERE ' . $arr_where;
        } else if ($arr_where == NULL && $arr_where_or == NULL) {
            $arr_query_where = 'WHERE ' . $arr_where_not;
        } else if ($arr_where == NULL && $arr_where_not == NULL) {
            $arr_query_where = 'WHERE ' . $arr_where_or;
        } else {
            $arr_query_where = 'WHERE ' . ($arr_where == NULL ? ' ' : $arr_where . ' OR ') . ($arr_where_or == NULL ? ' ' : $arr_where_or . ' AND ') . ($arr_where_not == NULL ? ' ' : $arr_where_not);
        }
        return $arr_query_where;
    }

    /**
     * @return null|string
     */
    private function setLimit() {
        $limit = NULL;
        if ($this->limit != NULL) {
            $limit = 'LIMIT' . $this->limit;
        }
        return $limit;
    }

    /**
     * @param $data_where
     *
     * @return null|string
     */
    private function strWhere($data_where) {
        $arr_where = NULL;
        $string = NULL;
        $arr_where = NULL;
        if (!empty($data_where)) {
            foreach ($data_where as $where) {
                $string .= $where['column_name'] . ' ' . strtoupper($where['opt']) . ' ' . ':' . $where['column_name'] . ' AND ';
            }
            $arr_where = rtrim($string, " AND ");
        }
        return $arr_where;
    }

    /**
     * Create, drop, edit table
     * Add, rename, edit ..... column
     * ......
     *
     * @param $sql
     */
    public function query_struct($sql) {
        $result = $this->query($sql);
        if ($result == FALSE) {
            print_r($this->errorinfo()[2]);
            exit();
        }
    }

    /**
     * @param $data_where_or
     *
     * @return null|string
     */
    private function strWhereOr($data_where_or) {
        $arr_where_or = NULL;
        $string_or = NULL;
        if (!empty($data_where_or)) {
            foreach ($data_where_or as $where_or) {
                $string_or .= $where_or['column_name'] . ' ' . strtoupper($where_or['opt']) . ' ' . ':' . $where_or['column_name'] . ' OR ';
            }
            $arr_where_or = rtrim($string_or, " OR ");
        }
        return $arr_where_or;
    }

    /**
     * @param $data_where_not
     *
     * @return null|string
     */
    private function strWhereNot($data_where_not) {
        $string_not = NULL;
        $arr_where_not = NULL;
        if (!empty($data_where_not)) {
            foreach ($data_where_not as $where_not) {
                $string_not .= $where_not['column_name'] . ' ' . strtoupper($where_not['opt']) . ' ' . ':' . $where_not['column_name'] . ' AND NOT ';
            }
            $arr_where_not = ' NOT ' . rtrim($string_not, ' AND NOT ');

        }
        return $arr_where_not;
    }

}