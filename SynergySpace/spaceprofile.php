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
			//gets the sid of the appropriate listing and queries for its info
			if (isset($_GET['sid'])) {
				$sid = $_GET['sid'];
				$sid = htmlspecialchars($sid);
				$raw_results = mysql_query("SELECT * FROM space
						WHERE sid='".$sid."'");
				$results = mysql_fetch_array($raw_results);
				}  
		?> 
		
		<section class="logform">
		<div class="wrapper">
			<div class="profiles">
			<div class="backlinks">
				<div class="insidelinks">
					<img src="uploads/<?=$results['photo']?>" width="200" alt="Thumb!" />
					<h5> Location: <?php 
						//gets the location of the appropriate listing
						echo "".$results['location'].""; 
					?> 
					</h5>
					<h5> Price: <?php 
						//gets the price of the appropriate listing
						echo "".$results['price']."";
					?> 
					</h5>
					<h5> Owner: <?php 
						//gets the username of the owner of the appropriate listing
						echo "".$results['ownerusername']."";
						?> 
					</h5>
					<hr class="sidebreak" />
						<form action="#" method="post">				
							<input type="submit" id="interest" class="form_button" name="interest" value="Work here!"/>
						</form>
					<br><br>
				</div>
			</div>
			<div class="mainprof">
				<h3> 
				<h3> Information: </h3>
				<?php 
					//gets the description of the appropriate listing
					echo "".$results['description']."";
				?> 
				</h3>
				<hr class="profbreak" />				
			</div>
			<br>
			<div class="mainprof">
				<h3> Reviews: </h3>
				<hr class="profbreak" />
			</div>
			</div>
		</div>
	</section>	


<?php require('footer.html');?>
</body>	

</html>