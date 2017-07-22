<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 19/07/2017
 * Time: 11:41
 */
use Carbon\Carbon;

class Demo extends Controller {
    function __construct() {
        parent::__construct();
    }

    function index() {
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 0;

        $mail->Debugoutput = "html"; // error show html
        $mail->Host = "ssl://smtp.gmail.com"; //Host send mail
        $mail->Port = 465;
        $mail->SMTPSecure = "ssl"; //Method message encode - - ssl or tls
        $mail->SMTPAuth = TRUE;
        $mail->Username = "hanhi.hust@gmail.com";
        $mail->Password = "22071994";
        $mail->SetFrom("hanhi.hust@gmail.com", "Test Email");
        $mail->AddReplyTo("hanhi.hust@gmail.com", "Test Reply");// Mail reply
        $mail->AddAddress("nhiht@ows.vn", "Hello");
        $mail->Subject = "Test Mail";
        $mail->MsgHTML("Xin chao Nhi Ha");
        if (!$mail->Send()) {
            echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
        } else {
            echo "Đã gửi thư thành công!";
        }
    }

    function test() {
        echo "<script> console.log(navigator.language)</script>";
    }
}
