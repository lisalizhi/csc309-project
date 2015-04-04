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
			<ul class="properties_list">
			<?php
				require('/controller/connect.php');

				$query = "SELECT * FROM space
						WHERE  1 ";
				if (isset($_POST['city']) && ($_POST['city'] != "")){
					$location = $_POST['city'];// gets value sent over search form	
					$location = htmlspecialchars($location);// changes characters used in html to their equivalents,ex. < to &gt;				 
					$location = mysql_real_escape_string($location);// makes sure nobody uses SQL injection
					
					$query .= " AND (`location`='$location')";
				}
				
				if (isset($_POST['min_price']) && ($_POST['min_price'] != "")){
					$minprice = $_POST['min_price'];// gets min price sent over search form	
					$minprice = htmlspecialchars($minprice);				 
					$minprice = mysql_real_escape_string($minprice);
					
					$query .= " AND (`price`>'$minprice')";
				}
				
				if(isset($_POST['max_price']) && ($_POST['max_price'] != "")){
					$maxprice = $_POST['max_price'];// gets min price sent over search form	
					$maxprice = htmlspecialchars($maxprice);				 
					$maxprice = mysql_real_escape_string($maxprice);
					
					$query .= " AND (`price`<'$maxprice')";
				}
				
				if(isset($_POST['rating']) && ($_POST['rating'] != "")){
					$rating = $_POST['rating'];// gets min price sent over search form	
					$rating = htmlspecialchars($rating);				 
					$rating = mysql_real_escape_string($rating);
					
					$query .= " AND (`score`>'$rating')";
				}
				
				$raw_results = mysql_query($query) or die(mysql_error());
						
				if(mysql_num_rows($raw_results) > 0){ // if one or more rows are returned do following
				// $results = mysql_fetch_array($raw_results) puts data from database into array, while it's valid it prints the formatted data in the loop
					while($results = mysql_fetch_array($raw_results)){ 
						//output formatted results
						?>
						<li>
						<form action="spaceprofile.php" method="get">
						<button type="submit" name="sid" value="<?=$results['sid']?>">
							<img src="uploads/<?=$results['photo']?>" class="property_img"/>
							<span class='price'><?=$results['price']?></span>
							<div class='property_details'>
								<h1>
									<?=$results['name']?>
								</h1>
								<h3>
									Score: <?=$results['score']?>
								</h3>
							</div> 
						</button>
						</form>
						</li>
						<?php }			 
					}
				else{ // if there is no matching rows do following
					echo "No results";
				}	
			?>
			</ul>
		</div>
	</section>	<!--  end listing section  -->

	<?php require('footer.html');?>
</body>
</html>