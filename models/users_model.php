<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 14/07/2017
 * Time: 10:26
 */
class  Users_Model extends Model {
    protected $_table = 'demos';
    protected $_deleted = 'deleted';
    public $schema = [
        'id'      => [
            'field' => 'id',
            'label' => 'id',
            'form'  => FALSE,
            'table' => TRUE,
        ],
        'name'    => [
            'field' => 'name',
            'label' => 'Tên',
            'form'  => TRUE,
            'table' => TRUE,
        ],
        'address' => [
            'field' => 'address',
            'label' => 'Địa chi',
            'form'  => TRUE,
            'table' => TRUE,
        ],
        'age'     => [
            'field' => 'age',
            'label' => 'Tuổi',
            'form'  => TRUE,
            'table' => TRUE,
        ],
        'email'   => [
            'field' => 'email',
            'label' => 'Email',
            'form'  => TRUE,
            'table' => TRUE,
        ],
    ];

    function __construct() {
        parent::__construct();
    }

    public function listUser() {
        $this->db->select();
        $this->db->from($this->_table);
        $this->db->where($this->_deleted, 0);
        $this->db->order_by('id', 'DESC');
        return $this->db->query_db();
    }

    public function editUser($id) {
        return $this->db->get($this->_table, $id);
    }

    public function insert($data) {
        $result = $this->db->insert($this->_table, $data);
        return $result;

    }

    public function update($id, $data) {
        $result = $this->db->update($id, $this->_table, $data);
        return $result;
    }

    public function delete($id) {
        $result = $this->db->delete($id, $this->_table,$this->_deleted);
        return $result;
    }
}