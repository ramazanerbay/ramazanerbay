<?php
require 'PHPMailerAutoload.php';

$mail = new PHPMailer;

//$mail->SMTPDebug = 3;                               // Enable verbose debug output
$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'relay.jangosmtp.net';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'ramazanerbay';                 // SMTP username
$mail->Password = '144807JC';                           // SMTP password
$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->From = $_POST["email"];
$mail->FromName = $_POST["firstname"];
//$mail->addAddress('joe@example.net', 'Joe User');     // Add a recipient
$mail->addAddress('info@ramazanerbay.com','webform');               // Name is optional
//$mail->addReplyTo('info@example.com', 'Information');
//$mail->addCC('cc@example.com');
//$mail->addBCC('bcc@example.com');

//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST["subject"];
$mail->Body    = $_POST["body"];
//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

if(!$mail->send()) {
    echo 'Mesajınız Gönderilemedi, lütfen tekrar deneyiniz.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Mesajınız Gönderdildi.';
}
?>
