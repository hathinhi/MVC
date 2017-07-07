<?php

class User extends Controller {
    public function __construct() {
        parent::__construct();
        Auth::handleLogin();
    }

    function index() {
        $this->view->users = $this->model->listUser();
        $this->view->render("user/index");
    }

    function select() {
        $data = $this->model->listUser();
        echo "<pre>";
        var_dump($data);
    }

    function add() {
        $this->view->render("user/add");
    }

    function addSave() {
        $data['username'] = $_POST['username'];
        $data['password'] = $_POST['password'];
        $this->model->addSave($data);
        header('location: ' . URL . 'user');
    }

    function edit($id) {
        $this->view->user = $this->model->editUser($id);
        $this->view->render("user/edit");
    }

    function editSave($id) {
        $data['id'] = $id;
        $data['username'] = $_POST['username'];
        $this->model->editSave($data);
        $this->direct('user');
    }

    function delete($id) {
        $this->model->delete($id);
        $this->direct('user');
    }
}
