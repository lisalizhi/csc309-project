<?php 		
	require('connect.php');
	session_start();	
	if (isset ($_POST['add_review'])){
		if (isset($_SESSION['username'])){
			$sid = $_GET['sid'];
			$reviewer = $_SESSION['username'];
			$score = $_POST['rating'];
			$description = $_POST['review'];
		
			$sid = htmlspecialchars($sid);
			$reviewer = htmlspecialchars($reviewer);
			$score = htmlspecialchars($score);
			$description = htmlspecialchars($description);
		
			$sid = mysql_real_escape_string($sid);
			$reviewer = mysql_real_escape_string($reviewer);
			$score = mysql_real_escape_string($score);
			$description = mysql_real_escape_string($description);
			
			//get username of space owner
			$raw_results = mysql_query("SELECT sid, ownerusername FROM space WHERE sid='$sid'");
			
			if(mysql_num_rows($raw_results) == 1){
				$results = mysql_fetch_array($raw_results);
				$ownerusername = $results['ownerusername'];
				if ($reviewer == $ownerusername){ //checks if current user owns the space
					echo "You can't review your own space!";
				}else{
					$dup_results = mysql_query("SELECT * FROM review WHERE sid='$sid' AND reviewerusername = '$reviewer'");
					if(mysql_num_rows($dup_results) > 0){
						echo "You've already reviewed this space!";
					}else{
						$sql = "INSERT INTO review (rid, reviewerusername, ownerusername, description, score, sid) VALUES (NULL, '$reviewer', '$ownerusername', '$description', '$score', $sid)";	
						$retval = mysql_query($sql);
						if(!$retval ){//error handling
							die('Could not enter data: ' . mysql_error());
						}else{
							header('Location: ../index.php');
						}
					}
				}
				
				
			}else{
				echo "oops!";
				header('Location: ../model/reviews.php?sid='.$sid);

			}
		}else{
			echo "You're not logged in!";
		}
	}
		?>