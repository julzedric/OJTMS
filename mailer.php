<?php
/**
 * Created by PhpStorm.
 * User: Julius
 * Date: 08/02/2018
 * Time: 11:15 PM
 */
require 'PHPMailer/PHPMailerAutoload.php';

function sendEmail ($email, $username, $link) {

    $mail = new PHPMailer;

    $mail->isSMTP();                                   // Set mailer to use SMTP
    $mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
    $mail->SMTPAuth = true;                            // Enable SMTP authentication
    $mail->Username = 'crenshawdevelopmentteam@gmail.com';          // SMTP username
    $mail->Password = 'blcakwuilpmmhfnc'; // SMTP password
    $mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
    $mail->Port = 587;                                 // TCP port to connect to

    $mail->setFrom('crenshawdevelopmentteam@gmail.com', 'Crenshaw Development Team');
    $mail->addReplyTo('crenshawdevelopmentteam@gmail.com', 'Crenshaw Development Team');
    $mail->addAddress($email);   // Add a recipient
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

    $mail->isHTML(true);  // Set email format to HTML

//    $bodyContent = '<h1>OJT Management System</h1>';
    $bodyContent = '<p>Hi '.$username.'. Thank you for signing up! Please click <a href="'.$link.'">here</a> to activate your account !</p>';

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