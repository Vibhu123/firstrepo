<?php
function sendelasticemail($to,$subject,$body_t,$body_h,$from,$fromname)
 {  $res="";  
 $data="vibhutiwari321@gmail=".urlencode("vibhutiwari321@gmail.com");
    $data.="&api_key=".urlencode("ae0d2070-ee37-4f31-a077-1266c909ea47");
    $data.="&from=".urlencode($from);
   $data.="&from_name=".urlencode($fromname);
   $data.="&to=".urlencode($to);
   $data.="&subject=".urlencode($subject);
  if($body_h)
$data.="&body_html=".urlencode($body_h);
if($body_t)
$data.="&body_text=".urlencode($body_t);
$header="POST/mailer/send HTTP/1.1\r\n";
$header.="Content-Type:application/x-www-form-urlencoded\r\n";
$header.="Content-Length: ".strlen($data)."\r\n\r\n";
$fp=fsockopen('ssl://api.elasticemail.com',400,$errno,$errstr,30);
if(!$fp)
return "Sorry failed to connect";
else{
fputs($fp,$header.$data);
while(!feof($fp))
{ $res.=fread($fp,1024);
}
fclose($fp);
}
return $res;
}
echo sendelasticemail("vibhutiwari321@gmail.com","Regarding email","hello","<h1>Regarding email</h1><title>hello</title>","vibhutiwari321@gmail.com","vibhu tiwari");
?>
But the big problem is that when you direct yourself to the url ssl://api.elasticemail.com
or if you try to direct to the other url which is mentioned in the documentation that is
https://api.elasticemail.com/mailer/send then both times it displays the message unauthorized
and thus when this code is run on localhost then it says sorry unable to connect.
