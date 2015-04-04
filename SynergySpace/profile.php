<?php include("controller/connect.php"); 
?>

<!DOCTYPE html>
<!-- original template by pixelhint.com, modified substantially by the ArgoBots group -->
<html lang="en">
<head>
	<title>SynergySpace</title>
	<meta charset="utf-8">
	<meta name="author" content="ArgoBots">
	<meta name="description" content="index page"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">
	<link rel="stylesheet" type="text/css" href="css/formpages.css">
	<link rel="stylesheet" type="text/css" href="css/profpages.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
</head>
<body>

	<section class="topper">

		<?php session_start(); ?>
		<?php require('/controller/connect.php');?>
		<?php require('header.php');?>
		<?php 
			//if user is logged in, get their user info
			if (isset($_GET['u'])) {
				$username = $_GET['u'];
				$username = htmlspecialchars($username);
				$raw_results = mysql_query("SELECT * FROM users
						WHERE username='".$username."'");
				$results = mysql_fetch_array($raw_results);
				
				//get spaces user owns
				$raw_ownspaces = mysql_query("SELECT * FROM space
						WHERE ownerusername='".$username."'");
						
				//get info on where user works
				$raw_w = mysql_query("SELECT * FROM members
						WHERE username='".$username."'");
				$w = mysql_fetch_array($raw_w);	
				$w_sid = $w['sid'];
				$w_sid = htmlspecialchars($w_sid);
				$raw_works = mysql_query("SELECT * FROM space WHERE sid='".$w_sid."'");
				$works = mysql_fetch_array($raw_works);	
			}
		?> 
		
		
		<section class="logform">
		<div class="wrapper">
			<div class="profiles">
				<div class="backlinks">
					<div class="insidelinks">
						<img src="uploads/<?=$results['photo']?>" width="200" alt="Profile Picture!" />
						<h5> Age: <?php echo "".$results['age']."";?></h5>
						<h5> Location: <?php echo "".$results['location']."";?></h5>
						<h5> Works at: <a href="spaceprofile.php?sid=<?=$works['sid']?>"><?=$works['name']?></a></h5>
						<h5> Score: <?php echo "".$results['avescore']."";?> </h5>
						
						<?php
						if (isset($_SESSION['username']) and $username == $_SESSION['username']){ ?>
							
							<form action="editprofile.php" method="post">				
								<input type="submit" id="edit_profile" class="form_button" name="edit_profile" value="Edit"/>
							</form>
							<br><br>
						<?php } ?>
						
					</div>
				</div>
				<div class="mainprof">
					<h2> 
					<?php 
						//if user is logged in, print their username
						echo "".$results['first']." ".$results['last']."";				
					?> 
					</h2>
					<h3>Occupation: <?php echo "".$results['occupation']."";?></h3>
					<p>Email: <?php echo "".$results['email']."";?></p>
					<hr class="profbreak" />				
					<p><?php echo "".$results['description']."";?></p>
				</div>
			
				<br>
				<div class="mainprof">
					<h3> Spaces </h3>
					<hr class="profbreak" />
					<?php
					if (mysql_num_rows($raw_ownspaces) > 0){ // if one or more rows are returned do following
						// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it prints the formatted data in the loop
						while($ownspaces = mysql_fetch_array($raw_ownspaces)){ 
							//output formatted results
							?>
							<a href="spaceprofile.php?sid=<?=$ownspaces['sid']?>"><h4><?=$ownspaces['name']?></h4></a>
							<br>
							<?php 
						}			 
					}
					else{ // if there is no matching rows do following
						echo "No results";
					}	
					?>
				</div>
				
				<br>
				<div class="mainprof">
					<h3> Friends </h3>
					<hr class="profbreak" />
				</div>
			</div>
		</div>
	</section>	


<?php require('footer.html');?>
</body>	

</html>