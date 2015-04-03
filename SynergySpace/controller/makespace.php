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
			
				if($location and $price and $description and $_FILES["photo"]){
					//insert information into the space table 
					$sql = "INSERT INTO space (sid, location, price, description, ownerusername, photo) VALUES (NULL, '$location', '$price', '$description', '$username', '')";	
					$retval = mysql_query($sql);
					if(!$retval ){//error handling
						die('Could not enter data: ' . mysql_error());
					}
					else{
						//upload the photo
						$target_dir = "../uploads/";
						$target_file = $target_dir . basename($_FILES["photo"]["name"]);
						$uploadOk = 1;
						$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
						// Check if image file is a actual image or fake image
							$check = getimagesize($_FILES["photo"]["tmp_name"]);
							if($check !== false) {
								//echo "File is an image - " . $check["mime"] . ".";
								$uploadOk = 1;
							} else {
								echo "File is not an image.";
								$uploadOk = 0;
							}
						// Check if file already exists
						if (file_exists($target_file)) {
							echo "Sorry, file already exists.";
							$uploadOk = 0;
						}
						// Check file size
						if ($_FILES["photo"]["size"] > 500000) {
							echo "Sorry, your file is too large.";
							$uploadOk = 0;
						}
						// Allow certain file formats
						if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
						&& $imageFileType != "gif" ) {
							echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
							$uploadOk = 0;
						}
						// Check if $uploadOk is set to 0 by an error
						if ($uploadOk == 0) {
							echo "Sorry, your file was not uploaded.";
						// if everything is ok, try to upload file
						} 
						else {
							if (move_uploaded_file($_FILES["photo"]["tmp_name"], $target_file)) {
								$file = basename( $_FILES["photo"]["name"]);
								//echo "The file ". $file. " has been uploaded.";
								$sql = "UPDATE space SET `photo`='$file' WHERE `ownerusername`='$username' AND `location`='$location' AND `price`='$price' AND `description`='$description'";
								$retval = mysql_query($sql);
								if(!$retval ){
									die('Could not update data: ' . mysql_error());
								}
								else{
									header('Location: ../profile.php');
								}
							}
							else {
								echo "Sorry, there was an error uploading your file.";
							}
						}	
					}
				}
				else{
					echo "Missing fields";
				}
			
			} 
		} 
	?>