<?php
/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 27/07/2017
 * Time: 17:15
 */

class  Members_Model extends CrudModel {
    protected $_table = 'members';
    protected $_deleted = FALSE;
    public $schema = [
        'id'       => [
            'field' => 'id',
            'label' => 'id',
            'form'  => TRUE,
            'table' => TRUE,
        ],
        'username' => [
            'field' => 'username',
            'label' => 'Tên',
            'form'  => TRUE,
            'table' => TRUE,
        ],
        'email'    => [
            'field' => 'email',
            'label' => 'Email',
            'form'  => TRUE,
            'table' => TRUE,
        ],
    ];

    function __construct() {
        parent::__construct();
    }
}