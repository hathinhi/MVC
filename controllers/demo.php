<?php

/**
 * Created by IntelliJ IDEA.
 * User: nhiha
 * Date: 19/07/2017
 * Time: 11:41
 */
class Demo {
    function __construct() {
    }

    function index() {
        // Khai báo thư viên phpmailer
        require "libs/phpmailer/class.phpmailer.php";
        require_once('libs/phpmailer/class.smtp.php');
        $mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPDebug = 2;

        $mail->Debugoutput = "html"; // Lỗi trả về hiển thị với cấu trúc HTML
        $mail->Host = "ssl://smtp.gmail.com"; //host smtp để gửi mail
        $mail->Port = 465; // cổng để gửi mail
        $mail->SMTPSecure = "ssl"; //Phương thức mã hóa thư - ssl hoặc tls
        $mail->SMTPAuth = TRUE; //Xác thực SMTP
        $mail->Username = "hanhi.hust@gmail.com"; // Tên đăng nhập tài khoản Gmail
        $mail->Password = "22071994"; //Mật khẩu của gmail
        $mail->SetFrom("hanhi.hust@gmail.com", "Test Email"); // Thông tin người gửi
        $mail->AddReplyTo("hanhi.hust@gmail.com", "Test Reply");// Ấn định email sẽ nhận khi người dùng reply lại.
        $mail->AddAddress("nhiht@ows.vn", "Hello");//Email của người nhận
        $mail->Subject = "Test Mail"; //Tiêu đề của thư
        $mail->MsgHTML("Xin chao Nhi Ha"); //Nội dung của bức thư.
// $mail->MsgHTML(file_get_contents("email-template.html"), dirname(__FILE__));
// Gửi thư với tập tin html
//        $mail->AltBody = "This is a plain-text message body";//Nội dung rút gọn hiển thị bên ngoài thư mục thư.
//        $mail->AddAttachment("images/attact-tui.gif");//Tập tin cần attach

//Tiến hành gửi email và kiểm tra lỗi
        if (!$mail->Send()) {
            echo "Có lỗi khi gửi mail: " . $mail->ErrorInfo;
        } else {
            echo "Đã gửi thư thành công!";
        }
    }
}
