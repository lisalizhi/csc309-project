<?php			
		require('connect.php');
		session_start();
		
		//accept applicant
		if (isset($_POST['accept'])){  
			$sid = $_POST['sid'];
			$username = $_POST['username'];
			
			$sid = htmlspecialchars($sid);	
			$username = htmlspecialchars($username);			
			
			$sql = "INSERT INTO members (username, sid) VALUES ('$username', '$sid')";	
			$retval = mysql_query($sql);
			if(!$retval ){//error handling
				die('There was an error: ' . mysql_error());
			}
			else{
				$sql = "DELETE FROM interestedin where `username`='$username' AND `sid`='$sid'";	
				$retval = mysql_query($sql);
				if(!$retval ){//error handling
					die('There was an error: ' . mysql_error());
				}
				else{
					//get username of users in space
					$raw_results = mysql_query("SELECT * FROM members WHERE sid='$sid'");
					
					if(mysql_num_rows($raw_results) > 0){
						while($results = mysql_fetch_array($raw_results)){
							if ($results['username'] != $username){
								$friend = $results['username'];
								$check_friend = mysql_query("SELECT * FROM friendswith WHERE (username1 = '$username' AND username2 = '$friend')
								OR (username1 = '$friend' AND username2 = '$username')");
								if(mysql_num_rows($check_friend) == 0){//No results means they're not already friends
									$addfriend = mysql_query("INSERT INTO friendswith (username1, username2, sid)
									VALUES('$username', '$friend', '$sid')");
								}
							}
						}
					}
					//add owner as well
					$self = $_SESSION['username'];
					$addfriend = mysql_query("INSERT INTO friendswith (username1, username2, sid)
									VALUES('$username', '$self', '$sid')");
					
					header('Location: ../applicants.php?sid='.$sid);
				}
			}	
		}
		//decline applicant
		else if (isset($_POST['decline'])){  
			$sid = $_POST['sid'];
			$username = $_POST['username'];
			
			$sid = htmlspecialchars($sid);	
			$username = htmlspecialchars($username);			
			
			$sql = "DELETE FROM interestedin where `username`='$username' AND `sid`='$sid'";	
			$retval = mysql_query($sql);
			if(!$retval ){//error handling
				die('There was an error: ' . mysql_error());
			}
			else{
				header('Location: ../applicants.php?sid='.$sid);
			}
		}
?>