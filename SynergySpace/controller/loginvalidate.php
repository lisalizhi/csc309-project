<?php		
				
			require('connect.php');
			session_start();
			
			if (isset($_POST['submit_login'])){  
				$username = $_POST['username'];
				$password = $_POST['password'];
				
				$username = htmlspecialchars($username);// changes characters used in html to their equivalents,ex. < to &gt;
				$password = htmlspecialchars($password);	
				
				$username = mysql_real_escape_string($username);// makes sure nobody uses SQL injection
				$password = mysql_real_escape_string($password);
				
				$raw_results = mysql_query("SELECT username, password FROM users
						WHERE username='".$username."' and password='".$password."'");
						
				if(mysql_num_rows($raw_results) == 1){ 
					$_SESSION['username'] = $username;
					header('Location: ../index.php');			 
				}
				else{ // if there is no matching rows do following
					header('Location: ../login.php');

				}
			}				
		?>