<?php

class  Login_Model extends Model {
    function __construct() {
        parent::__construct();
    }

    public function run() {
        $username = $_POST['username'];
        $pass = $_POST['pass'];
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

}