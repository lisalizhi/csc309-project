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
			if (isset($_SESSION['username'])) {
				$username = $_SESSION['username'];
				$username = htmlspecialchars($username);
				$raw_results = mysql_query("SELECT * FROM users
						WHERE username='".$username."'");
				$results = mysql_fetch_array($raw_results);
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
						<h5> Score: <?php echo "".$results['avescore']."";?> </h5>
						<hr class="sidebreak" />
						<form action="editprofile.php" method="post">				
							<input type="submit" id="edit_profile" class="form_button" name="edit_profile" value="Edit"/>
						</form>
						<br><br>
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