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

	<?php require('header.php');?>

	
		<section class="logform">
		<div class="wrapper">
		<br>
		<h1>Create Profile</h1>

				<form action="#" method="post">
					<div class="search_fields">
						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="firstname" placeholder="First Name"  autocomplete="off">
				
						<hr class="form_vert"/>
				
						<input type="text" class="float" id="logform" name="lastname" placeholder="Last Name"  autocomplete="off">

						<hr class="form_horiz"/>
						<textarea name="description" placeholder="Describe yourself" rows="10" cols="60"></textarea>

						<hr class="form_horiz"/>
						<textarea name="proskills" placeholder="What are your professional skills?" rows="10" cols="60"></textarea>

						<hr class="fomr_horiz"/>
						<textarea name="rentspaces" placeholder="List the spaces you would like to rent" rows="10" cols="60"></textarea>

						<hr class="form_horiz"/>
						<textarea name="leasespaces" placeholder="List the spaces you would like to lease" rows="10" cols="60"></textarea>

						<hr class="form_horiz"/>
						<textarea name="projects" placeholder="What projects are you interested in?" rows="10" cols="60"></textarea>
					</div>
					<hr class="form_horiz"/>					
					<input type="submit" id="submit_search" class="form_button" name="submit_search"/>
				</form>	
		</div>
	</section>


<?php require('footer.html');?>
</body>	

</html>	