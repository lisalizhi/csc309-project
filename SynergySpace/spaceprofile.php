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
		<br>
		<h1>Create a Space Listing</h1>

				<form action="#" method="get">
					<div class="search_fields">

						<hr class="form_horiz"/>
						SpaceID:<br>
						<input type="text" class="float" id="logform" name="SID"  autocomplete="off">
						<br>
						<hr class="form_horiz"/>

						Owner Name:<br>
						<input type="text" class="float" id="logform" name="owner"  autocomplete="off">
						<br>
						<hr class="form_horiz"/>
				
						Space Location:<br>
						<input type="text" class="float" id="logform" name="location"   autocomplete="off">
						<br>
						<hr class="form_horiz"/>

						Price:<br>
						<input type="number" min="0" class="float" id="logform" name="price"  autocomplete="off">
						<br>
						<hr class="form_horiz"/>

						Space Description:<br>
						<textarea name="description" rows="15" cols="45"></textarea>
					</div>
					<hr class="form_horiz"/>					
					<input type="submit" id="submit_search" class="form_button" name="submit_search" value="submit"/>
				</form>	
		</div>
	</section>


<?php require('footer.html');?>
</body>	

</html>	