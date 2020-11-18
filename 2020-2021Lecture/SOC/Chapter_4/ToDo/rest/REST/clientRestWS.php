<?php
	if(isset($_POST['submit']))
	{
		$name = $_POST['name'];
		
		$url = "http://localhost/rest/".$name;
		
		$client = curl_init($url);
		curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
		$response = curl_exec($client);
		
		$result = json_decode($response);
		
		echo $result->data; 
	}
   ?>