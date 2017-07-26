<?php

class Index extends Controller {
    public function __construct() {
        parent::__construct();
        $this->loadModel('users');
        $this->view->css = array('public/css/index/index.css');
        $this->view->set_template('default');
        if (LOGIN) {
            Auth::handleLogin();
        } else {
            Session::init();
            Session::set('login', TRUE);
        }
    }

    function index() {
        $this->view->headers = $this->users->schema;
        $this->view->a_link_edit = site_url('index/edit');
        $this->view->a_link_add = site_url('index/add');
        $this->view->a_link_delete = site_url('index/delete');
        $this->view->users = $this->users->listUser();
        $this->view->render('index/index');
    }

    function add() {
        $this->view->forms = $this->users->schema;
        $this->view->add_save = site_url('index/add_save');
        $this->view->render('index/add');
    }

    function add_save() {
        $data = $this->input->post();
        $result = $this->users->insert($data);
        if ($result) {
            $this->direct('index');
        } else {
            echo "erro";
        }
    }

    public function edit($id) {
        $this->view->forms = $this->users->schema;
        $this->view->userinfo = $this->users->editUser($id);
        $this->view->edit_save = site_url('index/edit_save/' . $id);
        $this->view->render('index/edit');

    }

    public function edit_save($id) {
        $data = $this->input->post();
        $result = $this->users->update($id, $data);
        if ($result) {
            $this->direct('index');
        } else {
            echo "erro";
        }
    }

    public function delete($id) {
        $result = $this->users->delete($id);
        if ($result) {
            $this->direct('index');
        } else {
            echo "erro";
        }
    }

    public function configLang() {
        $lang = $_POST['en'];
        $this->view->loadLang->setLang($lang);
        $this->direct('index');
    }
}