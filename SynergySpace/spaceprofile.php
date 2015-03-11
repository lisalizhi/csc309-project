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
	<?php session_start(); ?>
	
		<section class="logform">
		<div class="wrapper">
		<br>
		<h1>Create a Space Listing</h1>

				<form action="#" method="get">
					<div class="search_fields">

						<hr class="form_horiz"/>
						<input type="text" class="float" id="logform" name="SID"  placeholder="SpaceID" autocomplete="off">
						<br>
						<hr class="form_vert"/>

						<input type="text" class="float" id="logform" name="owner"  placeholder="Owner Name" autocomplete="off">
						<br>
						<hr class="form_horiz"/>
				
						<input type="text" class="float" id="logform" name="location"  placeholder="Location" autocomplete="off">
						<br>
						<hr class="form_vert"/>

						<input type="number" min="0" class="float" id="logform" name="price" placeholder="Price" autocomplete="off">
						<br>
						<hr class="form_horiz"/>

						<textarea name="description" class="float" rows="15" cols="45" placeholder="Description"></textarea>
						<hr class="form_vert"/>

						<input type="file" class="float" id="logform" name="photo" accept="image/*">
					</div>
					<hr class="form_horiz"/>					
					<input type="submit" id="submit_search" class="form_button" name="submit_search" value="submit"/>
				</form>	
		</div>
	</section>


<?php require('footer.html');?>
</body>	

</html>	