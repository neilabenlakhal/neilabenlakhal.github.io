<?php
//next example will recieve all messages for specific conversation
// set API Access Key
$access_key = 'c92871fe780a812d1956223439dd6785';
//set Country ID
$ID='2464461'; //TUNISIA
//set mode
$mode='xml';
// Initialize CURL:

$ch = curl_init('http://api.openweathermap.org/data/2.5/forecast?id='.$ID.'&mode=xml&APPID'.$access_key.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$response = curl_exec($ch);
$xml=simplexml_load_string($response);
echo $xml;
curl_close($ch);


?>