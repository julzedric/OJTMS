<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 08/02/2018
 * Time: 11:15 PM
 */
require 'PHPMailer/PHPMailerAutoload.php';

function resetPassword($email, $newPassword) {
    $mail = new PHPMailer;
    require_once ('mail_settings.php');
    $mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

//    $bodyContent = '<h1>OJT Management System</h1>';
    $bodyContent = '<p>Hi ! Please use "'.$newPassword.'"as you temporary password. Thank you!</p>';

    $mail->Subject = 'Email from OJT Management System';
    $mail->Body    = $bodyContent;

    if(!$mail->send()) {
        echo "<script type='text/javascript'> 
                    var conf= confirm(\"Error. Couldn't Establish connection. Please try again..\");
                    if(conf == true){
                        window.history.back();
                    }
                    </script>";
        exit;
        //echo 'Mailer Error: ' . $mail->ErrorInfo;
    }

}