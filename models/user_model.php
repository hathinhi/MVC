<?php

class  User_Model extends Model {
    protected $_table = 'users';

    function __construct() {
        parent::__construct();
    }

    public function user() {
        $where = array(
            'username' => 'nhiht',
            'age'      => '14',
        );
        $this->db->select();
        $this->db->from('users');

        $this->db->join('classes', 'users.id=classes.user_id');
        $this->db->join('cities', 'users.id=cities.user_id');
        return $this->db->query();
    }

    public function user_list() {
        $th = $this->db->prepare("SELECT * FROM `users`");
        $th->execute();
        $data = $th->fetchAll();
        return $data;

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

    public function editUser($id) {
        $sth = $this->db->prepare('SELECT * FROM users WHERE id = :id');
        $sth->execute(array(':id' => $id));
        return $sth->fetch();
    }

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