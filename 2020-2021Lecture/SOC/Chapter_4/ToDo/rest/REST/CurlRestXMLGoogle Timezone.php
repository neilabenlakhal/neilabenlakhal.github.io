<?php
//next example will recieve all messages for specific conversation
// set API Access Key
$access_key = 'c92871fe780a812d1956223439dd6785';
//set Country ID
$ID='2464461'; //TUNISIA
//set mode
$mode='xml';
// Initialize CURL:

$ch = curl_init('https://maps.googleapis.com/maps/api/timezone/xml?location=39.6034810%2C-119.6822510&timestamp=1331766000&key=AIzaSyBqL3WEUQ9L_J8wXjgeyjr5vUvYtKQ6L6U');
  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch,CURLOPT_HEADER, false); 

// Store the data:
$response = curl_exec($ch);
curl_close($ch);

$xml=simplexml_load_string($response) or die("Error: Cannot create object");
print_r($xml);
?>
