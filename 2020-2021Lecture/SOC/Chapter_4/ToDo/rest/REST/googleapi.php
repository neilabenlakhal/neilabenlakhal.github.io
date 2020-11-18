<?php
$url = "https://maps.googleapis.com/maps/api/timezone/xml?location=38.908133%2C-77.047119&timestamp=1458000000&key=AIzaSyBqL3WEUQ9L_J8wXjgeyjr5vUvYtKQ6L6U";
$result = file_get_contents($url);
//echo $result;//affichage brut du retour XML
// parcours avec l'API SimpleXML
$xml=simplexml_load_string($result) or die("Error: Cannot create object");
//print_r($xml);
echo "Status: ". $xml->status;
echo "raw_offset: ". $xml->status."<br/>";
echo "raw_offset: ".$xml->raw_offset."<br/>";
echo "dst_offset: ".$xml->dst_offset."<br/>";
echo "time_zone_id: ".$xml->time_zone_id."<br/>";
echo "time_zone_name: ".$xml->time_zone_name."<br/>";
?> 



