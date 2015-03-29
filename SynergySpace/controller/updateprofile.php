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
					header('Location: ../profile.php');
				}
			}else{
				echo "Missing fields";
			}
			
		}			
?>