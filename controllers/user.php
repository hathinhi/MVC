<?php

class User extends Controller {
    public function __construct() {
        parent::__construct();
    }

    function index() {
        $this->view->users = $this->model->user_list();
        $this->view->render("user/index");
    }

    function select() {
        $data = $this->model->get_all();
        echo "<pre>";
        var_dump($data);
        exit();
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
        header('location: ' . URL . 'user');
    }

    function delete($id) {
        $this->model->delete($id);
        header('location: ' . URL . 'user');
    }
}
