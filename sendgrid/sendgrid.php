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
$emails=explode(",",$email);
$mail->setFrom($email1)->addTo($to)->setSubject($subject)->setText($message)->addAttachment($attach);
foreach($emails as $value)
{ $mail->addTo($value);
   $name=explode("@",$value);
   $mail->setHtml("Hey %name% how are you")->addSubstitution("%name%",$name);
}
echo $sendgrid->web->send($mail);
?>
