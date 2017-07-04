<?php

class Home_Model extends Model {

    function __construct() {
        parent::__construct();
    }

    function xhrInsert() {
        $username = $_POST['username'];

        $sth = $this->db->prepare('INSERT INTO users (username,password) VALUES (:username,:password)');
        $sth->execute(array(':username' => $username));

        $data = array('text' => $username, 'id' => $this->db->lastInsertId());
        echo json_encode($data);
    }

    function xhrGetListings() {
        $sth = $this->db->prepare('SELECT * FROM users');
        $sth->setFetchMode(PDO::FETCH_ASSOC);
        $sth->execute();
        $data = $sth->fetchAll();
        echo json_encode($data);
    }

    function xhrDeleteListing() {
        $id = $_POST['id'];
        $sth = $this->db->prepare('DELETE FROM users WHERE id = "' . $id . '"');
        $sth->execute();
    }

}