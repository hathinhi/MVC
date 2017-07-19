<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 19/07/2017
 * Time: 09:34
 */
class Mailing extends Email {

    function __construct() {
        parent::__construct();
        $this->load = new Controller();
        $this->email = new Email();
    }

    public function index() {
    }

    public function send_mail() {
        $this->load->library('email');
        $this->email->set_newline("\r\n");
        $this->email->from('nhiht@ows.vn', 'Name');
        $this->email->to('hanhi.hust@gmail.com');
        $this->email->subject(' My mail through codeigniter from localhost ');
        $this->email->message('Hello nhiha…');
        if (!$this->email->send()) {
            echo($this->email->print_debugger());
        } else {
            echo 'Your e-mail has been sent!';
        }
    }
}