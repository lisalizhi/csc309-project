<?php 		
	require('connect.php');
	session_start();	
	if (isset ($_POST['add_review'])){
		if (isset($_SESSION['username'])){
			$user = $_GET['u'];
			$reviewer = $_SESSION['username'];
			$score = $_POST['rating'];
			$description = $_POST['review'];
		
			$user = htmlspecialchars($user);
			$reviewer = htmlspecialchars($reviewer);
			$score = htmlspecialchars($score);
			$description = htmlspecialchars($description);
		
			$user = mysql_real_escape_string($user);
			$reviewer = mysql_real_escape_string($reviewer);
			$score = mysql_real_escape_string($score);
			$description = mysql_real_escape_string($description);
			
			
				if ($user == $reviewer){ //checks if user is reviewing their own profile
					echo "You can't review yourself!";
				}else{
					$dup_results = mysql_query("SELECT * FROM userreview WHERE reviewerusername='$reviewer' AND reviewedusername = '$user'");
					if(mysql_num_rows($dup_results) > 0){ //checks if current user has already reviewed this user
						echo "You've already reviewed this user!";
					}else{
						$sql = "INSERT INTO userreview (urid, reviewerusername, reviewedusername, description, score) VALUES (NULL, '$reviewer', '$user', '$description', '$score')";	
						$retval = mysql_query($sql);
						if(!$retval ){//error handling
							die('Could not enter data: ' . mysql_error());
						}else{
							$score_results = mysql_query("SELECT AVG(score) AS average FROM userreview WHERE reviewedusername='$user'");
							if(mysql_num_rows($score_results) == 1){
								$averesults = mysql_fetch_array($score_results);
								$avescore = $averesults['average'];
								$updatescores = mysql_query("UPDATE users SET avescore = '$avescore' WHERE username= '$user'");
								if(!$updatescores ){//error handling
									die('Could not enter data: ' . mysql_error());
								}else{
									header('Location: ../userreviews.php?u='.$user);
								}
							}
						}
					}
				}
				
				

		}else{
			echo "You're not logged in!";
		}
	}
		?>