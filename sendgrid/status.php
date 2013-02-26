<?php
function getallstatus()
{
$xyz=file_get_contents("https://api.elasticemail.com/mailer/list/unsubscribed?username=vibhutiwari321@gmail.com&api_key=ae0d2070-ee37-4f31-a077-1266c909ea47https://sendgrid.com/api/stats.get.json?api_user=anmolgagneja&api_key=30086269&days=3");
return $xyz;
}
echo getallstatus();
?>
