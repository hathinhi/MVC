<?php

class  User_Model extends Model {
    protected $_table = 'users';

    function __construct() {
        parent::__construct();
    }

    public function listUser() {
        $this->db->select();
        $this->db->from('users');
//        $this->db->where('id', '70', '<');
//        $this->db->where_or('age', '15', '>');
        $this->db->where_not('username', 'nhiht');

        return $this->db->query();
    }


    function get_all() {
        $data = $this->db->get_all('users', 2);
        return $data;
    }

    function get($id) {
        $data = $this->db->get('users', $id);
        return $data;
    }

    function addSave($data) {
        $this->db->insert('users', array(
            'username' => $data['username'],
            'password' => Hash::create('md5', $data['password'], 1),
        ));
    }

//    public function editUser($id) {
//        $sth = $this->db->prepare('SELECT * FROM users WHERE id = :id');
//        $sth->execute(array(':id' => $id));
//        return $sth->fetch();
//    }

    function editSave($data) {
        $data_update = array(
            'username' => $data['username'],
        );

        $this->db->update('users', $data_update, "`id` = {$data['id']}");
    }

    public function delete($id) {
        $this->db->delete('users', "id = '$id'");
    }
}