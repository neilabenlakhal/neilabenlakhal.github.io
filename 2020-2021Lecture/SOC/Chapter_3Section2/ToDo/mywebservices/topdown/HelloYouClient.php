<?php
 
// step 1: cache deactivating
ini_set("soap.wsdl_cache_enabled", "0");
 
// link client to WSDL file
$clientSOAP = new SoapClient('HelloYou.wsdl',array('trace' => 1));
 
//Call getHello method
echo '<h1/>Service call </h1>';
echo $clientSOAP->getHello('Top-down', 'Web service');

// print soap request and response (debug)
	echo '<br/><h1>SOAP Request</h1>'.htmlspecialchars($clientSOAP->__getLastRequest()).'<br/>';
	echo '<br/><h1>SOAP Response </h1>'.htmlspecialchars($clientSOAP->__getLastResponse()).'<br/>';
 
?>