<?php

class User extends Controller {
    const VIEW_PATH = "views/";

    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
        $this->loadModel('user');
        $this->view->js = array('public/js/default.js,TRUE', 'public/js/default1.js');
        $this->view->css = array('public/css/default.css');
        $this->view->set_template('default');
    }

    function index() {
        $this->view->users = $this->user->listUser();
        $this->view->render("user/index");
    }

    function select() {
        $data = $this->user->listUser();
        echo "<pre>";
        var_dump($data);
    }

    function add() {
        $this->view->render("user/add");
    }

    function addSave() {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $this->user->addSave($data);
        $this->direct('user');
    }

    function edit($id) {
        $this->view->user = $this->user->editUser($id);
        $this->view->render("user/edit");
    }

    function editSave($id) {
        $data['id'] = $id;
        $data['username'] = $_POST['username'];
        $this->user->editSave($data);
        $this->direct('user');
    }

    function delete($id) {
        $this->user->delete($id);
        $this->direct('user');
    }
}
