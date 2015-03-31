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
		<?php require('header.php');
		$sid = $_GET['sid'];?>
	
		<section class="logform">
			<div class="wrapper">
				<h1>Write Review</h1>
				<!-- below are the areas a user can add a review -->
				<form action="controller/reviewcont.php?sid=<?=$sid?>" method="post" enctype="multipart/form-data">
					<div class="search_fields">
						<hr class="form_horiz"/>
						<input type="number" class="float" id="logform" name="rating" placeholder="Rating" min="1" max="10" autocomplete="off">
						<hr class="form_vert"/>
						<textarea name="review" rows="15" cols="45" placeholder="Review"/></textarea>
						<br>
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