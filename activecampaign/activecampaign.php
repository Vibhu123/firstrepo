<?php



require_once("includes/ActiveCampaign.class.php");



$ac = new ActiveCampaign(ACTIVECAMPAIGN_URL, ACTIVECAMPAIGN_API_KEY);

if (!(int)$ac->credentials_test()) {

print_r("Invalid credentials (URL and API Key).");

exit();

}

$email1=$_REQUEST['email'];
$message=$_REQUEST['message'];
$subject=$_REQUEST['subject'];
$attach=$_FILES['file']['tmp_name'];
$email=$_REQUEST['mr'];
$name=$_REQUEST['nm'];
$name1=explode(",",$name);
$emails=explode(",",$email);

/*

*

* VIEW ACCOUNT DETAILS.

*

*/



$account = $ac->api("account/view");



/*

*

* ADD NEW LIST.

*

*/



$list = array(

"name" => "List 3",

"sender_name" => "Vibhu Tiwari",

"sender_addr1" => "House no 3142 sector 40 d chd",

"sender_city" => "Chandigarh",

"sender_zip" => "160036",

"sender_country" => "India",

);



$list_add = $ac->api("list/add", $list);



if ((int)$list_add->success) {

// successful request

$list_id = (int)$list_add->id;

}

else {

// request failed

print_r($list_add->error);

exit();

}



/*

*

* ADD NEW SUBSCRIBER.

*

*/



// CHECK IF THEY EXIST FIRST.
int i=0;
foreach($emails as $value)

$subscriber_exists = $ac->api("subscriber/view?email=".$value);



if ( !isset($subscriber_exists->id) ) {



// SUBSCRIBER DOES NOT EXIST - ADD THEM.



$subscriber = array(

"email" => $value,

"first_name" => $name1[i++],

"p[{$list_id}]" => $list_id,

"status[{$list_id}]" => 2, // add as "Unsubscribed"

);



$subscriber_add = $ac->api("subscriber/add", $subscriber);



if ((int)$subscriber_add->success) {

// successful request

$subscriber_id = (int)$subscriber_add->subscriber_id;

}

else {

// request failed

print_r($subscriber_add->error);

exit();

}

}

else {

// SUBSCRIBER EXISTS - JUST GRAB THEIR ID.

$subscriber_id = $subscriber_exists->id;

}

}

/*

*

* EDIT SUBSCRIBER.

*

*/
int j=0;

foreach($emails as $value){

$subscriber = array(

"id" => $subscriber_id,

"email" => $email1,

"first_name" => $name1[j++],

"p[{$list_id}]" => $list_id,

"status[{$list_id}]" => 1, // change to "Subscribed"

);



$subscriber_edit = $ac->api("subscriber/edit?overwrite=0", $subscriber);

}

/*

*

* ADD NEW EMAIL MESSAGE.

*

*/



$message = array(

"format" => "mime",

"subject" => "Check out the message!",

"fromemail" => $email1,

"fromname" => "Test from API",

"html" => "<p>hey </p>".$name1[0]." <p>how are you</p>",

"p[{$list_id}]" => $list_id,

);



$message_add = $ac->api("message/add", $message);



if ((int)$message_add->success) {

// successful request

$message_id = (int)$message_add->id;

}

else {

// request failed

print_r($message_add->error);

exit();

}



/*

*

* CREATE NEW CAMPAIGN.

*

*/



$campaign = array(

"type" => "single",

"name" => "Campaign #44",

"sdate" => "2013-02-22 00:00:00",

"status" => 1,

"public" => 1,

"tracklinks" => "all",

"trackreads" => 1,

"textunsub"=>1

"htmlunsub" => 1,

"p[{$list_id}]" => $list_id,

"m[{$message_id}]" => 100,

);



$campaign_create = $ac->api("campaign/create", $campaign);



if ((int)$campaign_create->success) {

// successful request

$campaign_id = (int)$campaign_create->id;

print_r("Campaign sent! (ID: {$campaign_id})");

}

else {

// request failed

print_r($campaign_create->error);

exit();

}



/*

*

* VIEW CAMPAIGN REPORTS.

*

*/



$campaign_report_totals = $ac->api("campaign/report_totals?campaignid={$campaign_id}");



echo "<p>Reports:</p>";

echo "<pre>";

print_r($campaign_report_totals);

echo "</pre>";



?>





