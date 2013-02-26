<?php
function getunsubscriber()
{
$xyz=file_get_contents("https://api.elasticemail.com/mailer/list/unsubscribed?username=vibhutiwari321@gmail.com&api_key=ae0d2070-ee37-4f31-a077-1266c909ea47");
return $xyz;
}
function getbounced(){
$abc=file_get_contents("https://api.elasticemail.com/mailer/list/bounced?username=vibhutiwari321@gmail.com&api_key=ae0d2070-ee37-4f31-a077-1266c909ea47");
return $abc;
}
function getopened()
{$abc=file_get_contents("https://api.elasticemail.com/mailer/list/bounced?username=vibhutiwari321@gmail.com&api_key=ae0d2070-ee37-4f31-a077-1266c909ea47&status=6");
return $abc;
}
function getclicked()
{$abc=file_get_contents("https://api.elasticemail.com/mailer/list/bounced?username=vibhutiwari321@gmail.com&api_key=ae0d2070-ee37-4f31-a077-1266c909ea47&status=7");
return $abc;
}
echo getunsubscriber();
echo '<br/><br/>';
echo getbounced();
echo '<br/><br/>';
echo getopened();
echo '<br/><br/>';
echo getclicked();
?>
