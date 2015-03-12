<?php			
		require('connect.php');
			
		if (isset($_POST['submit_search'])){  
			$username = $_POST['username'];
			$password = $_POST['password'];
			$repassword = $_POST['repassword'];
			$email = $_POST['email'];
			$fname = $_POST['fname'];
			$lname = $_POST['lname'];
			
			$username = htmlspecialchars($username);// changes characters used in html to their equivalents,ex. < to &gt;
			$password = htmlspecialchars($password);
			$repassword = htmlspecialchars($repassword);
			$email = htmlspecialchars($email);
			$fname = htmlspecialchars($fname);
			$lname = htmlspecialchars($lname);				
			
			$username = mysql_real_escape_string($username);// makes sure nobody uses SQL injection
			$password = mysql_real_escape_string($password);
			$repassword = mysql_real_escape_string($repassword);
			$email = mysql_real_escape_string($email);
			$fname = mysql_real_escape_string($fname);
			$lname = mysql_real_escape_string($lname);
			
			//checks if all fields have been filled in
			if($username and $password and $repassword and $email and $fname and $lname){
				if ($password == $repassword){	//password verification 
					$raw_results = mysql_query("SELECT username, email FROM users
							WHERE username='".$username."' OR email='".$email."'");
							
					if(mysql_num_rows($raw_results) == 0){//checks if account already exists 
						
						$sql = "INSERT INTO users (username, password, first, last, age, occupation, 
						photo, description, email, location, avescore) VALUES ('$username', '$password', 
						'$fname', '$lname', NULL, NULL, NULL, NULL, '$email', NULL, NULL)";	
						$retval = mysql_query($sql);
						if(!$retval ){
							die('Could not enter data: ' . mysql_error());
						}else{
							header('Location: ../login.php');
						}
					}
					else{
						echo "Username or email already exist";
					}
				}else{
					echo "Passwords don't match";
				}
			}else{
				echo "Missing fields";
			}
			
		}			
?>