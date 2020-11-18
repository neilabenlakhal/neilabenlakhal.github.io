<?php
$url = "http://api.openweathermap.org/data/2.5/forecast?id=2464461&mode=xml&APPID=d57ea8ae4a87d8fb71a7cb680e74c029";
$result = file_get_contents($url);
echo $result;
?>