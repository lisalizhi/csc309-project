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
					<img src="uploads/<?=$results['photo']?>" width="200" alt="Profile Picture!" />
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
					<h5><a href="spaceprofile.php?sid=<?=$sid?>">Full Profile</a></h5>
					<?php 
					//checks if user is a member so user to write a review
					$currentuser = $_SESSION['username'];
					$sid = $_GET['sid'];
					$member = mysql_query("SELECT * FROM members
							WHERE username='$currentuser' AND sid = '$sid'");
					if(mysql_num_rows($member) > 0){ ?>
						<h5><a href="addreview.php?sid=<?=$sid?>">Write a Review</a></h5>
					<?php } ?>
				</div>
			</div>
			<?php
			if (isset($_GET['sid'])) {
				$sid = $_GET['sid'];
				$sid = htmlspecialchars($sid);
				$reviewresults = mysql_query("SELECT * FROM review
						WHERE sid='".$sid."'");
				if(mysql_num_rows($reviewresults) > 0){ //checks if there are reviews for this space
					while($review = mysql_fetch_array($reviewresults)){ ?>
						<div class="mainprof">
							<h3>Rating: <?=$review['score']?>/10</h3>
							<h4><a href="profile.php?u=<?=$review['reviewerusername']?>"><?=$review['reviewerusername']?></a></h4>
							<hr class="profbreak" />
							<p><?=$review['description']?></p>
						</div>
						<br>
					<?php
					}
				}else{ //there are no reviews ?>
					<div class="mainprof">
						<h3>There are no reviews for this space!</h3>
						<?php 
						//checks if user is a member so user can write a review
						$currentuser = $_SESSION['username'];
						$sid = $_GET['sid'];
						$member = mysql_query("SELECT * FROM members
							WHERE username='$currentuser' AND sid = '$sid'");
						if(mysql_num_rows($member) > 0){ ?>
						<h5><a href="addreview.php?sid=<?=$sid?>">Write a Review?</a></h5>
						<?php } ?>
						
						<hr class="profbreak" />
					</div>
					<br>
				<?php
				}
			} 
			?>
			</div>
		</div>
	</section>	


<?php require('footer.html');?>
</body>	

</html>