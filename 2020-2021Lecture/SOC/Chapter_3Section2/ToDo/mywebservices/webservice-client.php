<?php
  
	require_once('lib/nusoap.php');
	$error  = '';
	$result = array();
	$response = '';
	$wsdl = "http://localhost/mywebservices/webservice-server.php?wsdl";
	if(isset($_POST['sub'])){
		$isbn = trim($_POST['isbn']);
		if(!$isbn){
			$error = 'ISBN cannot be left blank.';
		}

		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				$result = $client->call('fetchBookData', array($isbn));
				$result = json_decode($result);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}	

	/* Add new book **/
	if(isset($_POST['addbtn'])){
		$title = trim($_POST['title']);
		$isbn = trim($_POST['isbn']);
		$author = trim($_POST['author']);
		$category = trim($_POST['category']);
		$price = trim($_POST['price']);

		//Perform all required validations here
		if(!$isbn || !$title || !$author || !$category || !$price){
			$error = 'All fields are required.';
		}

		if(!$error){
			//create client object
			$client = new nusoap_client($wsdl, true);
			$err = $client->getError();
			if ($err) {
				echo '<h2>Constructor error</h2>' . $err;
				// At this point, you know the call that follows will fail
			    exit();
			}
			 try {
				/** Call insert book method */
				 $response =  $client->call('insertBook', array($title, $author, $price, $isbn, $category));
				 $response = json_decode($response);
			  }catch (Exception $e) {
			    echo 'Caught exception: ',  $e->getMessage(), "\n";
			 }
		}
	}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Book Store Web Service</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2>Books Store SOAP Web Service</h2>
  <p>Enter <strong>ISBN</strong> of book and click <strong>Fetch Book Information</strong> button.</p>
  <br />       
  <div class='row'>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email">ISBN:</label>
	      <input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN" required>
	    </div>
	    <button type="submit" name='sub' class="btn btn-default">Fetch Book Information</button>
    </form>
   </div>
   <br />
   <h2>Book Information</h2>
  <table class="table">
    <thead>
      <tr>
        <th>Title</th>
        <th>Author</th>
        <th>Price</th>
        <th>ISBN</th>
        <th>Category</th>
      </tr>
    </thead>
    <tbody>
    <?php if($result){ ?>
      	
		      <tr>
		        <td><?php echo $result->title; ?></td>
		        <td><?php echo $result->author_name; ?></td>
		        <td><?php echo $result->price; ?></td>
		        <td><?php echo $result->isbn; ?></td>	
		        <td><?php echo $result->category; ?></td>
		      </tr>
      <?php 
  		}else{ ?>
  			<tr>
		        <td colspan='5'>Enter ISBN and click on Fetch Book Information button</td>
		      </tr>
  		<?php } ?>
    </tbody>
  </table>
	<div class='row'>
	<h2>Add New Book</h2>
	 <?php if(isset($$response->status)) {

	  if($response->status == 200){ ?>
		<div class="alert alert-success fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Success!</strong>&nbsp; Book Added succesfully. 
	        </div>
	  <?php }elseif(isset($response) && $response->status != 200) { ?>
			<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp; Cannot Add a book. Please try again. 
	        </div>
	 <?php } 
	 }
	 ?>
  	<form class="form-inline" method = 'post' name='form1'>
  		<?php if($error) { ?> 
	    	<div class="alert alert-danger fade in">
    			<a href="#" class="close" data-dismiss="alert">&times;</a>
    			<strong>Error!</strong>&nbsp;<?php echo $error; ?> 
	        </div>
		<?php } ?>
	    <div class="form-group">
	      <label for="email"></label>
	      <input type="text" class="form-control" name="title" id="title" placeholder="Enter Title" required>
				<input type="text" class="form-control" name="author" id="author" placeholder="Enter Author" required>
				<input type="text" class="form-control" name="price" id="price" placeholder="Enter Price" required>
				<input type="text" class="form-control" name="isbn" id="isbn" placeholder="Enter ISBN" required>
				<input type="text" class="form-control" name="category" id="category" placeholder="Enter Category" required>
	    </div>
	    <button type="submit" name='addbtn' class="btn btn-default">Add New Book</button>
    </form>
   </div>
</div>

</body>
</html>



