<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 14/07/2017
 * Time: 10:26
 */
require_once "model-crud/CrudModel.php";

class  Users_Model extends CrudModel {
    protected $_table = 'users';
    protected $_deleted = 'deleted';
    public $schema = [
        'id'       => [
            'field' => 'id',
            'label' => 'id',
            'form'  => FALSE,
            'table' => TRUE,
        ],
        'username' => [
            'field'    => 'username',
            'label'    => 'Tên',
            'required' => TRUE,
            'form'     => TRUE,
            'table'    => TRUE,
        ],
        'email'    => [
            'field'    => 'email',
            'label'    => 'Email',
            'required' => TRUE,
            'form'     => [
                'type' => "email",
            ],
            'table'    => TRUE,
        ],
    ];

    function __construct() {
        parent::__construct();
    }

}