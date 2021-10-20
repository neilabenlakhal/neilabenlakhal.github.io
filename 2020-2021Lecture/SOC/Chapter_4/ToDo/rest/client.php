<!DOCTYPE html>
<html>
<head>
<title>Demo Create and Consume Simple REST API in PHP</title>
<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div style="width:700px; margin:0 auto;">

<h3>Demo Consume Simple REST API in PHP</h3>   
<form action="" method="POST">
<label>Enter Order ID:</label><br />
<input type="text" name="order_id" placeholder="Enter Order ID" required/>
<br/><br/>
<input type="submit" name="submit"/>
<br/><br/><br/>
</form>    

<?php
if (isset($_POST['order_id']) && $_POST['order_id']!="") {
	$order_id = $_POST['order_id'];
	$url = "http://localhost:8888/rest/api/".$order_id;
	
	$client = curl_init($url);
	curl_setopt($client,CURLOPT_RETURNTRANSFER,true);
	$response = curl_exec($client);
	$result = json_decode($response,true);

echo "<table border='1'>";
	echo "<tr><td>Order ID</td><td>".$result["order_id"]." </td></tr>";
	echo "<tr><td>Amount</td><td>".$result["amount"]." </td></tr>";
	echo "<tr><td>Response Code</td><td>".$result["response_code"]." </td></tr>";
	echo "<tr><td>Response Desc</td><td>".$result["response_desc"]." </td></tr>";
	echo "</table>";
}
?>
<br/>
<b>Sample Order IDs for Demo:</b><br/>
15478952<br/>
15478955<br/>
15478958<br/>
15478959
<br/><br/>
</div>
</body>
</html>