<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 19/07/2017
 * Time: 09:34
 */
class Mailing extends Controller {

    function __construct() {
        parent::__construct();
    }

    public function index() {
    }

    public function send_mail() {
        $config = Array(
            'protocol'  => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'hanhi.hust@gmail.com',
            'smtp_pass' => '22071994',);
        $this->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('hanhi.hust@gmail.com', 'Xin chào');
        $this->email->to('nhiht@ows.vn');
        $this->email->subject(' My mail through codeigniter from localhost ');
        $this->email->message('Hello nhiha…');
        if (!$this->email->send()) {
            echo($this->email->print_debugger());
        } else {
            echo 'Your e-mail has been sent!';
        }
    }
}