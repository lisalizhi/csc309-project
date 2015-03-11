<!DOCTYPE html>
<!-- original template by pixelhint.com, modified substantially by the group -->
<html lang="en">
<head>
	<title>SynergySpace</title>
	<meta charset="utf-8">
	<meta name="author" content="Leora">
	<meta name="description" content="Search page for space listings"/>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/responsive.css">

	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/main.js"></script>
</head>

<body>
	<!-- Header and search bar -->
	<section class="topper">
		<?php session_start(); ?>
		<?php require('header.php');?>
		<?php require('searchbar.php');?>

	</section>
	
	<!-- Listing results from basic search -->
	<section class="listings">
		<div class="wrapper">
			<?php
				require('/controller/connect.php');

				$query = $_POST['search'];// gets value sent over search form
				
				$query = htmlspecialchars($query);// changes characters used in html to their equivalents,ex. < to &gt;
					 
				$query = mysql_real_escape_string($query);// makes sure nobody uses SQL injection
					 
				$raw_results = mysql_query("SELECT location, price, description FROM space
						WHERE (`location`='$query') OR (`description` LIKE '%".$query."%')") or die(mysql_error());
						
				if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
				// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it prints the formatted data in the loop
					while($results = mysql_fetch_array($raw_results)){ 
						//output formatted results
						?>
						<li><a href="<?= $results['profile']?>"><img src="<?=$results['image']?>" class="property_img"/></a>
						<span class='price'><?=$results['price']?></span>
						<div class='property_details'>
						<h1>
							<a href="<?=$results['profile']?>"><?=$results['description']?>"</a>
						</h1>
					</div></li> 
						<?php }			 
					}
				else{ // if there is no matching rows do following
					echo "No results";
				}	
		?>
		</div>
	</section>	<!--  end listing section  -->

	<?php require('footer.html');?>
</body>
</html>