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
		
		<section class="logform">
		<div class="wrapper">
			<div class="profiles">
			<div class="backlinks">
				<div class="insidelinks">
					<img src="img/testprofile.png" width="200" alt="Thumb!" />
					<h5> <a href="editprofile.php">Edit Profile</a></h5>
					<h5> Age: Unknown</h5>
					<h5> Location: The Wall </h5>
					<h5> Score: 1000 </h5>
					<hr class="sidebreak" />
					<h5> Skills: </h5>
					<h5>War Tactics, The Power of R'hllor</h5>
				</div>
			</div>
			<div class="mainprof">
				<h2> 
				<?php 
					//if user is logged in, print their username
					if (isset($_SESSION['username'])) {
						$username = $_SESSION['username'];
						$username = htmlspecialchars($username);
						$raw_results = mysql_query("SELECT first, last FROM users
						WHERE username='".$username."'");
						$results = mysql_fetch_array($raw_results);
						echo "".$results['first']." ".$results['last']."";
						
					} 
					else { 
						print("Stannis Baratheon");
					} ?> 
				</h2>
				<h3>Ruler of the Seven Kingdoms </h3>
				<hr class="profbreak" />				
				<p>This rent space is mine by right.</p>
			</div>
			<br>
			<div class="mainprof">
				<h3> Spaces </h3>
				<hr class="profbreak" />
			</div>
			</div>
		</div>
	</section>	


<?php require('footer.html');?>
</body>	

</html>