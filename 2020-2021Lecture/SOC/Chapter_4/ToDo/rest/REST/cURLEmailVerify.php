<?php
// set API Access Key
$access_key = 'e601565836d56566938d5ba41aeb91ae';

// set email address
$email_address = 'neila.benlakhal@enicarthage.rnu.tn';

// Initialize CURL:
$ch = curl_init('http://apilayer.net/api/check?access_key='.$access_key.'&email='.$email_address.'');  
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Store the data:
$json = curl_exec($ch);
echo $json;

curl_close($ch);

// Decode JSON response:
$validationResult = json_decode($json, true);
echo "<h3>Restful service client with curl : </h3>";
//print_r ($validationResult);
echo "<br/>";
// Access and use your preferred validation result objects
print "format is valid? :  " .$validationResult['format_valid']."<br/>";
print "SMTP? : ".$validationResult['smtp_check']."<br/>";
print "Domain? :  ".$validationResult['domain'];

?>