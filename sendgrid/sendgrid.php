<?php
include '/var/www/sendgrid-php/SendGrid_loader.php';

$sendgrid = new SendGrid('anmolgagneja','30086269');

$mail = new SendGrid\Mail();

$mail->setFrom('vibhutiwari321@gmail.com')->

setSubject("Heyy")->

setText("Hi!!!!")->

addTo('vibhutiwari321@gmail.com')->

addTo('vibhutiwari92@yahoo.in')->

addTo('vibhu@gmail.com')->

addUniqueArgument('customer','somewhere')->

setHtml("Hello %name% this is our first email")->

addSubstitution("%name%",array("vibhu","vibhu"))->

addFilterSetting("gravatar","enable",1)->

addFilterSetting("clicktrack","enable",1)->

addFilterSetting("footer","enable",1)->

addFilterSetting("subscriptiontrack","enable",1)->

addFilterSetting("subscriptiontrack","text/html","<%Unsubscribe Here%>")->

addFilterSetting("opentrack","enable",1)->

addFilterSetting("spamcheck","enable",1)->

addFilterSetting("spamcheck","maxscore",5)->

addFilterSetting("template","enable",1)->

addFilterSetting("template","text/html","How are you")->

addFilterSetting("dkim","use_from",1)->

addFilterSetting("bypass_list_management","enable",1);

echo $sendgrid->smtp->send($mail);
?>
