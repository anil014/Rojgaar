<?php

use PHPMailer\PHPMailer\PHPMailer;


function sendEmail($email = '', $subject = '', $message = '', $attFile = '')
{
    $mail = new PHPMailer();                              // Passing `true` enables exceptions
    try {
        //Server settings
        $mail->SMTPDebug = 2;                                 // Enable verbose debug output
        $mail->isSMTP();                                      // Set mailer to use SMTP
        $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
        $mail->SMTPAuth = true;                               // Enable SMTP authentication
        $mail->Username = 'rojgarphp@gmail.com';                 // SMTP username
        $mail->Password = 'rojgar12345@';                           // SMTP password
        $mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587;                                    // TCP port to connect to

        //Recipients
        $mail->setFrom('rojgarphp@gmail.com', 'Rojgar');
        $mail->addAddress($email, 'Joe User');     // Add a recipient
        // Name is optional
        $mail->addReplyTo($email, 'Information');

        //Attachments
//        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//        $mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

        //Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body = $message;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        return true;
    } catch (Exception $e) {
        return false;

    }


}
