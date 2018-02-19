<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 08/02/2018
 * Time: 11:15 PM
 */
require 'PHPMailer/PHPMailerAutoload.php';

function sendNotification ($email, $username) {
    $mail = new PHPMailer;
    require_once ('mail_settings.php');
    $mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

//    $bodyContent = '<h1>OJT Management System</h1>';
    $bodyContent = '<p>Hi '.$username.', your recommendation letter is ready for pickup.</p>';

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