<?php

include '/var/www/sendgrid-php/SendGrid_loader.php';

function sendmail($from,$subject,$text,$recp){

$sendgrid = new SendGrid('anmolgagneja','30086269');

$mail = new SendGrid\Mail();

$mail->setFrom($from)->

setSubject($subject)->

setText($text)->

setTos($recp)->

setHtml("Hello %name% this is our first email")->

addSubstitution("%name%",array("vibhu","vibhu"))->

addFilterSetting("footer","enable",1)->

addFilterSetting("subscriptiontrack","enable",1)->

addFilterSetting("subscriptiontrack","text/html","Unsubscribe <%Here%>")->

addFilterSetting("clicktrack","enable",1)->

addFilterSetting("opentrack","enable",1);

return $sendgrid->web->send($mail);

}

echo sendmail('email@saliraganar.com','regarding first mail','hey',array('vibhutiwari321@gmail.com','vibhutiwari92@yahoo.in'));

?>
