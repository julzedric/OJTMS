<?php
/**
 * Created by PhpStorm.
 * User: asus
 * Date: 16/02/2018
 * Time: 8:01 PM
 */


$mail->isSendMail();                                   // Set mailer to use SMTP
$mail->Host = 'mail.ojtms.x10host.com';                    // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                            // Enable SMTP authentication
$mail->Username = 'admin@ojtms.x10host.com';          // SMTP username
$mail->Password = 'Magdal3na'; // SMTP password
$mail->SMTPSecure = 'tls';                         // Enable TLS encryption, `ssl` also accepted

$mail->setFrom('admin@ojtms.x10host.com', 'OJT Management System');
$mail->addReplyTo('admin@ojtms.x10host.com', 'OJT Management System');