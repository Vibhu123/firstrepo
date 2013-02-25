<?php
require_once '/var/www/eemail.php';
$ee = new BaseElasticEmail();
$csv  = '"ToMail","Title","FirstName","LastName"'."\n";
$csv .= '"vibhutiwari321@gmail.com","Mr","Alexander","Smith"'."\n";
$csv .= '"vibhutiwari92@yahoo.in","Miss","Sarah","Dupon"'."\n";

$text = 'Hello {Title} {LastName}, your first name is {FirstName}.';

$res = $ee->mailMerge($csv, "vibhutiwari321@gmail.com", "Demo", "Demo Mail Merge", $text);
echo $res;
?>
