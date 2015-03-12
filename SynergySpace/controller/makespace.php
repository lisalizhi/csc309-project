<?php 		
		require('connect.php');
		session_start();	
			
		if (isset($_POST['spacecreate'])){ 
			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				$location = $_POST['location'];
				$price = $_POST['price'];
				$description = $_POST['description'];
			
				$username = htmlspecialchars($username);
				$location = htmlspecialchars($location);
				$price = htmlspecialchars($price);
				$description = htmlspecialchars($description);
			
				$username = mysql_real_escape_string($username);
				$location = mysql_real_escape_string($location);// makes sure nobody uses SQL injection
				$price = mysql_real_escape_string($price);
				$description = mysql_real_escape_string($description);
			
				if($location and $price and $description){
					//insert information into the space table 
					$sql = "INSERT INTO space (sid, location, price, description, ownerusername, photo) VALUES (NULL, '$location', '$price', '$description', '$username', '')";	
					$retval = mysql_query($sql);
					if(!$retval ){//error handling
						die('Could not enter data: ' . mysql_error());
					}else{
						header('Location: ../index.php');//redirects user to the indicated page when the info is successfully added to database
					}
				}else{
					echo "Missing fields";
				}
			
			} 
		} 
	?>