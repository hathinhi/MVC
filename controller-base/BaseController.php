<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 27/07/2017
 * Time: 16:34
 */
class BaseController extends Controller {
    public $name = Array(
        "class" => "",
        "model" => "",
    );

    function __construct() {
        parent::__construct();
        $this->setting_class();
        $this->view->js = array('public/js/base.js');
        $this->loadModel($this->name['model']);
    }

    function index() {
        $model = $this->name['model'];
        $this->view->headers = $this->$model->schema;
        $this->view->a_link_edit = site_url($this->name['class'] . '/edit');
        $this->view->a_link_add = site_url($this->name['class'] . '/add');
        $this->view->a_link_delete = site_url($this->name['class'] . '/delete');
        $this->view->users = $this->$model->listData();
        $this->view->render('base/index');
    }

    function add() {
        $model = $this->name['model'];
        $this->view->forms = $this->$model->schema;
        $this->view->add_save = site_url($this->name['class'] . '/add_save');
        $this->view->render('base/add');
    }

    function add_save() {
        $model = $this->name['model'];
        $data = $this->input->post();
        $result = $this->$model->insert($data);
        if ($result) {
            $this->direct($this->name['class']);
        } else {
            echo "erro";
        }
    }

    public function edit($id) {
        $model = $this->name['model'];
        $this->view->forms = $this->$model->schema;
        $this->view->userinfo = $this->$model->edit($id);
        $this->view->edit_save = site_url($this->name['class'] . '/edit_save/' . $id);
        $this->view->render('base/edit');

    }

    public function edit_save($id) {
        $model = $this->name['model'];
        $data = $this->input->post();
        $result = $this->$model->update($id, $data);
        if ($result) {
            $this->direct($this->name['class']);
        } else {
            echo "erro";
        }
    }

    public function delete($id) {
        $model = $this->name['model'];
        $result = $this->$model->delete($id);
    }

}