<?php
include '/var/www/sendgrid-php/SendGrid_loader.php';
$sendgrid=new SendGrid('anmolgagneja','30086269');
$mail=new SendGrid\Mail();
$email1=$_REQUEST['email'];
$message=$_REQUEST['message'];
$to=$_REQUEST['to'];
$subject=$_REQUEST['subject'];
$attach=$_FILES['file']['tmp_name'];
$email=$_REQUEST['mr'];
$name=$_REQUEST['nm'];
$name1=explode(",",$name);
$emails=explode(",",$email);
$mail->setFrom($email1)->setSubject($subject)->setText($message)->addAttachment($attach);
foreach($emails as $value)
{ $mail->addTo($value);
}
foreach($name1 as $name2){
$msg="Hello ".$name2." how are you";
$mail->setHtml($msg);
}
echo $sendgrid->smtp->send($mail);
?>
