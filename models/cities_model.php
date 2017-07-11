<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 11/07/2017
 * Time: 15:14
 */
class  Cities_Model extends Model {
    protected $_table = 'cities';

    function __construct() {
        parent::__construct();
    }

    public function listCity() {
        $this->db->select();
        $this->db->from($this->_table);
        return $this->db->query();
    }
}