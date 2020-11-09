<?php 
require_once("lib/nusoap.php");
//(first endpoint)
function hello($username) {return 'Howdy, '.$username.'!'; } 
//(second endpoint) function with complex XML (data type)
function login($username, $password){ 
return array('id_user'=>1, 'fullname'=>'WEB', 'email'=>'web@soa.com', 'level'=>100); }
$server = new nusoap_server();
 $server->configureWSDL('web service with  complex data type', 'urn:localhost');
 $server->wsdl->schemaTargetNamespace = 'urn:localhost';
 //SOAP complex type return type (an array/struct)
$server->wsdl->addComplexType(
    'Person', //complex type name
    'complexType', // type simple/complex
    'struct','all', // All-sequence
    '',
    array(
        'id_user' => array('name' => 'id_user', 'type' => 'xsd:int'),
        'fullname' => array('name' => 'fullname', 'type' => 'xsd:string'),
        'email' => array('name' => 'email', 'type' => 'xsd:string'),
        'level' => array('name' => 'level', 'type' => 'xsd:int')) //tableau des elements 
);
//this is the second webservice entry point/function 
$server->register('login',
array('username' => 'xsd:string', 'password'=>'xsd:string'),  //input
			array('return' => 'tns:Person'),  //output
			'urn:localhost',   //namespace
			'urn:localhost#loginServer',  //soapaction
); 
$server->register('hello',
			array('username' => 'xsd:string'),  //input
			array('return' => 'xsd:string'),  //output
			'urn:localhost',   //namespace
			'urn:localhost#helloServer'  //soapaction
		); 
// Use the request to (try to) invoke the service
$server->service(file_get_contents("php://input"));
?>
