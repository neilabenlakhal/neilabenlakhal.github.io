<?php

 /** 
  @Description: Book Information Server Side Web Service:
  This Script creates a web service using NuSOAP php library. 
  fetchBookData function accepts ISBN and sends back book information.
 */
 require_once('dbconn.php');
 require_once('lib/nusoap.php'); 
 $server = new nusoap_server();

 /* Method to insert a new book */
function insertBook($title, $author_name, $price, $isbn, $category){
  global $dbconn;
  $sql_insert = "insert into books (title, author_name, price, isbn, category) values ( :title, :author_name, :price, :isbn, :category)";
  $stmt = $dbconn->prepare($sql_insert);
  // insert a row
  $result = $stmt->execute(array(':title'=>$title, ':author_name'=>$author_name, ':price'=>$price, ':isbn'=>$isbn, ':category'=>$category));
  if($result) {
    return json_encode(array('status'=> 200, 'msg'=> 'success'));
  }
  else {
    return json_encode(array('status'=> 400, 'msg'=> 'fail'));
  }
  
  $dbconn = null;
  }
/* Fetch 1 book data */
function fetchBookData($isbn){
	global $dbconn;
	$sql = "SELECT id, title, author_name, price, isbn, category FROM books 
	        where isbn = :isbn";
  // prepare sql and bind parameters
    $stmt = $dbconn->prepare($sql);
    $stmt->bindParam(':isbn', $isbn);
    // insert a row
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return json_encode($data);
    $dbconn = null;
}
$server->configureWSDL('booksServer', 'urn:book');
$server->register('fetchBookData',
			array('isbn' => 'xsd:string'),  //parameter
			array('data' => 'xsd:string'),  //output
			'urn:book',   //namespace
			'urn:book#fetchBookData' //soapaction
      );  
      $server->register('insertBook',
			array('title' => 'xsd:string', 'author_name' => 'xsd:string', 'price' => 'xsd:string', 'isbn' => 'xsd:string', 'category' => 'xsd:string'),  //parameter
			array('data' => 'xsd:string'),  //output
			'urn:book',   //namespace
			'urn:book#fetchBookData' //soapaction
			);  
$server->service(file_get_contents("php://input"));

?>