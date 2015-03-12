<?php			
		require('connect.php');
			
		if (isset($_POST['submit_search'])){  
			$location = $_POST['location'];
			$price = $_POST['price'];
			$description = $_POST['description'];
			
			$location = htmlspecialchars($location);// changes characters used in html to their equivalents,ex. < to &gt;
			$price = htmlspecialchars($price);
			$description = htmlspecialchars($description);
			
			$location = mysql_real_escape_string($location);// makes sure nobody uses SQL injection
			$price = mysql_real_escape_string($price);
			$description = mysql_real_escape_string($description);
			
			if($location and $price and $description){
							
				if(mysql_num_rows($raw_results) == 0){ 
					//insert information into the space table 
					$sql = "INSERT INTO spaces (location, price, description, image) VALUES ('$location', '$price', '$description', NULL)";	
					$retval = mysql_query($sql);
					if(!$retval ){//error handling
						die('Could not enter data: ' . mysql_error());
					}else{
						header('Location: ../index.php');//redirects user to the indicated page when when teh info is successfully added to database
					}
				}
				else{ // if there is no matching rows do following
					echo "Username or email already exist";
				}
			}else{
				echo "Missing fields";
			}
			
		}			
	?>