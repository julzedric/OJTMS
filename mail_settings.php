<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16/02/2018
 * Time: 8:01 PM
 */


$mail->isSMTP();                                   // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'crenshawdevelopmentteam@gmail.com';          // SMTP username
$mail->Password = 'blcakwuilpmmhfnc'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                 // TCP port to connect to

$mail->setFrom('crenshawdevelopmentteam@gmail.com', 'Crenshaw Development Team');
$mail->addReplyTo('crenshawdevelopmentteam@gmail.com', 'Crenshaw Development Team');