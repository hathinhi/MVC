<?php

class  User_Model extends Model {
    protected $_table = 'users';

    function __construct() {
        parent::__construct();
    }

    public function listUser() {
        $this->db->select();
        $this->db->from('users');
        return $this->db->query();
    }

    public function run() {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
        $this->db->select();
        $this->db->from('users');
        $sth = $this->db->prepare("SELECT * FROM `users`
        WHERE username=:username AND password=:pass");
        $sth->execute(array(
            ':username' => $username,
            ':pass'     => Hash::create('md5', $pass, 1),
        ));
        if ($sth->rowCount() > 0) {
            Session::init();
            Session::set('logIn', TRUE);
            header('Location:../home');
        } else {
            header('Location:../login');
        }
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
        $this->db->select();
        $this->db->from('users');
        $this->db->where('id', $id);
        return $this->db->query();
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