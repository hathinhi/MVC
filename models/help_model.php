<?php

class  Help_Model extends Model
{
    function __construct()
    {
        parent::__construct();
        echo "help_model";
    }
    function blah(){
        return 10+10;
    }
}