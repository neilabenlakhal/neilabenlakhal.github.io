<?php

ini_set("soap.wsdl_cache_enabled", "0");

// include App code
include('HelloYou.php');
 
// give contract location 
$serveurSOAP = new SoapServer('http://localhost/mywebservices/topdown/HelloYou.wsdl');
 
// Add endpoints to the web services (getHello)
$serveurSOAP->addFunction('getHello');
 
//run the server
//  POST method is only authorized 
if ($_SERVER['REQUEST_METHOD'] == 'POST')
 {
// handling call
        $serveurSOAP->handle();
}
// print link to WSDL
else {
	echo 'Web Service HelloYou.<br />';
	echo '<a href="http://localhost/mywebservices/topdown/HelloYou.wsdl">WSDL</a><br />';    
}  
?>