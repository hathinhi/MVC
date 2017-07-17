<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 14/07/2017
 * Time: 10:26
 */
class  User_Model extends Model {
    protected $_table = TABLE;

    function __construct() {
        parent::__construct();
    }

    public function login($username, $password) {
        $this->db->select('id');
        $this->db->from($this->_table);
        $this->db->where(COLUMN[0], $username);
        $this->db->where(COLUMN[1], Hash::create('md5', $password, 1));
        $result = $this->db->query_db();
        if ($result) {
            return TRUE;
        } else {
            return FALSE;
        }
    }
}