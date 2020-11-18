<?php
//step1 Initialize a curl session use curl_init().
$cSession = curl_init(); 
//step2 set option for CURLOPT_URL. 
//This value is the URL which we are sending the request to.
//Append a search term "REST" using parameter "q=". 
//Set option for CURLOPT_RETURNTRANSFER: 
//true will tell curl to return the string instead of printing it out. 
//Set option for CURLOPT_HEADER, 
//false will tell curl to ignore the header in the return value.
curl_setopt($cSession,CURLOPT_URL,"http://www.google.com/search?q=REST");
curl_setopt($cSession,CURLOPT_RETURNTRANSFER,true);
curl_setopt($cSession,CURLOPT_HEADER, false); 
//step3: Execute the curl session using curl_exec().
$result=curl_exec($cSession);
//step4: Close the curl session we have created.
curl_close($cSession);
//step5: Output the return string.
echo $result;
?>