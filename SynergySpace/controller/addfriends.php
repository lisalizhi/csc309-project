<?php 		
	require('connect.php');
	session_start();	

	if (isset($_SESSION['username'])) {
		$sid = $_GET['sid'];
		$user = $_SESSION['username'];

	
		$sid = htmlspecialchars($sid);
		$user = htmlspecialchars($user);

	
		$sid = mysql_real_escape_string($sid);
		$user = mysql_real_escape_string($user);
		
		//get username of space owner
		$raw_results = mysql_query("SELECT * FROM members WHERE sid='$sid'");
		
		if(mysql_num_rows($raw_results) > 0){
			while($results = mysql_fetch_array($raw_results)){
				if ($results['username'] != $user){
					$friend = $results['username'];
					$check_friend = mysql_query("SELECT * FROM friendswith WHERE (username1 = '$user' AND username2 = '$friend')
					OR (username1 = '$friend' AND username2 = '$user')");
					if(mysql_num_rows($check_friend) == 0){//No results means they're already friends
						$addfriend = mysql_query("INSERT INTO friendswith (username1, username2, sid)
						VALUES('$user', '$friend', '$sid')");
					}
				}
			}
			
			
		} //if rows == 0 then there are no members for this space, redirect anyways
			//header('Location: ../model/spacepage.php?sid='.$sid);
			header('Location: ../index.php');


	}else{
		echo "You're not logged in!";
	}
		?>