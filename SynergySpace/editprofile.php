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
		<?php require('header.html');?>

	
		<section class="logform">
		<div class="wrapper">
		<h1>Edit Profile</h1>

				<form action="#" method="post">
					<div class="search_fields">
						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="fname" placeholder="First Name"  autocomplete="off">
						<hr class="form_vert"/>
						<input type="text" class="float" id="logform" name="lname" placeholder="Last Name"  autocomplete="off">	
						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="email" placeholder="Email"  autocomplete="off">
						<hr class="form_vert"/>
						<input type="text" class="float" id="logform" name="occupation" placeholder="Occupation"  autocomplete="off">
						<hr class="form_horiz"/>
						<textarea name="description" rows="15" cols="45" placeholder="Description"></textarea>
						<hr class="form_vert"/>
						<input type="text" class="float" id="logform" name="photo" placeholder="Photo to be changed to an upload"  autocomplete="off">					
				
										
					</div>
					<hr class="form_horiz"/>					
					<input type="submit" id="submit_search" class="form_button" name="submit_search" value="submit"/>
					<input type="submit" id="submit_search" class="form_button" name="cancel_search" value="cancel"/>
				</form>	
		</div>
	</section>	


<?php require('footer.html');?>
</body>	

</html>