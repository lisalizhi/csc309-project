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