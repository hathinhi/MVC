<?php

class  User_Model extends Model {
    function __construct() {
        parent::__construct();
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