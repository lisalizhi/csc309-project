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


	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
	
</head>
<body>

	<section class="topper">
		<?php session_start(); ?>
		<?php require('/controller/connect.php');?>
		<?php require('header.php');?>
		
		<?php 
			//get the old user info
			
			$username = $_SESSION['username'];
			$username = htmlspecialchars($username);
			$raw_results = mysql_query("SELECT * FROM users
						WHERE username='".$username."'");
			$results = mysql_fetch_array($raw_results);
			
		?> 
	
		<section class="logform">
			<div class="wrapper">
				<h1>Edit Profile</h1>
				<!-- below are the areas a user can edit for their profile -->
				<form action="controller/updateprofile.php" method="post" enctype="multipart/form-data">
					<div class="search_fields">
						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="fname" placeholder="First Name" value="<?=$results['first']?>"  autocomplete="off">
						<hr class="form_vert"/>
						<input type="text" class="float" id="logform" name="lname" placeholder="Last Name" value="<?=$results['last']?>"  autocomplete="off">	
						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="location" placeholder="Location"  value="<?=$results['location']?>" autocomplete="off">
						<hr class="form_vert"/>
						<input type="text" class="float" id="logform" name="occupation" placeholder="Occupation"  value="<?=$results['occupation']?>" autocomplete="off">
						<input type="number" class="float" id="logform" name="age" placeholder="Age"  value="<?=$results['age']?>" autocomplete="off">
						<hr class="form_vert"/>
						<input type="email" class="float" id="logform" name="email" placeholder="Email"  value="<?=$results['email']?>" autocomplete="off">	
						<hr class="form_horiz"/>
						<textarea name="description" rows="15" cols="45" placeholder="Description"><?=$results['description']?></textarea>
						<hr class="form_vert"/>
						<input type="file" class="float" id="logform" name="photo" accept="image/*">
										
					</div>
					<hr class="form_horiz"/>					
					<input type="submit" id="edit_profile" class="form_button" name="edit_profile" value="submit"/>
					<input type="submit" id="submit_search" class="form_button" name="cancel_search" value="cancel"/>
				</form>	
			</div>
		</section>	


	<?php require('footer.html');?>
</body>	

</html>