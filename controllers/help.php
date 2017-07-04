<?php

class Help extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render("help/index");
    }

    public function other($arg = false)
    {
        require "model/help_model.php";
        $model = new Help_Model();
        $this->view->blah = $model->blah();
    }

    public function detail($id)
    {
        echo "details".$id;

    }
}

?>