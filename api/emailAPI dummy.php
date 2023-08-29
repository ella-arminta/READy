<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'vendor/autoload.php';
if(isset($_POST['send'])){
    $to_id = $_POST['toid'];
    $subject =  $_POST['subject'];
    $message = $_POST['message'];
    
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'your@gmail.com';
    $mail->Password = 'YourPassword';
    $mail->SMTPSecure = 'tls';  
    $mail->Port = 587;
    $mail->setFrom('vedprakash151994@gmail.com', 'Ved Prakash N');
    $mail->addAddress($to_id);
    $mail->Subject = $subject;
    $mail->Body = $message;
    if(!$mail->send()){
        $error = "Mailer Error: " .$mail->ErrorInfo;
        echo "<div class=display> '.$error.'  </div>";
    }else{
        echo " <div class=display> Message Sent </div>";
    }
}else{
    echo "<div class=display> Please Enter Valid Data </div>  ";
}
?>