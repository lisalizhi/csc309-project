<?php			
		require('connect.php');
		session_start();
		
		
		if (isset($_POST['edit_profile'])){  
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			$location = $_POST['location'];
			$occupation = $_POST['occupation'];
			$age = $_POST['age'];
			$email = $_POST['email'];
			$description = $_POST['description'];
			$username = $_SESSION['username'];
			
			$location = htmlspecialchars($location);// changes characters used in html to their equivalents,ex. < to &gt;
			$occupation = htmlspecialchars($occupation);
			$age = htmlspecialchars($age);
			$email = htmlspecialchars($email);
			$fname = htmlspecialchars($fname);
			$lname = htmlspecialchars($lname);
			$description = htmlspecialchars($description);	
			$username = htmlspecialchars($username);			
			
			$location = mysql_real_escape_string($location);// makes sure nobody uses SQL injection
			$occupation = mysql_real_escape_string($occupation);
			$age = mysql_real_escape_string($age);
			$email = mysql_real_escape_string($email);
			$fname = mysql_real_escape_string($fname);
			$lname = mysql_real_escape_string($lname);
			$description = mysql_real_escape_string($description);
			

			//checks if all fields have been filled in
			if($location and $occupation and $age and $email and $fname and $lname and $description){

				$sql = "UPDATE users SET `first`='$fname', `last`='$lname', `description`='$description', `email`='$email',`age`='$age', `occupation`='$occupation',`location`='$location' WHERE `username`='$username'";	
				$retval = mysql_query($sql);
				if(!$retval ){
					die('Could not update data: ' . mysql_error());
				}
				else{
					if($_FILES["photo"]["name"]){
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
								$sql = "UPDATE users SET `photo`='$file' WHERE `username`='$username'";
								$retval = mysql_query($sql);
								if(!$retval ){
									die('Could not update data: ' . mysql_error());
								}
								else{
									header('Location: ../profile.php?u='.$_SESSION['username']);
								}
							} else {
								echo "Sorry, there was an error uploading your file.";
							}
						}
					}
					else{
						header('Location: ../profile.php?u='.$_SESSION['username']);
					}
				}
			}else{
				echo "Missing fields";
			}
			
		}			
?>