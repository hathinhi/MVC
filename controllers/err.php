<?php
class Err extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        $this->view->render("error/index");
    }
}
