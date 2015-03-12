<!DOCTYPE html>
<!-- original template by pixelhint.com, modified substantially by the ArgoBots group -->
<html lang="en">
<header>
	<div class="wrapper">
		<a href="index.php"><img src="img/logo2.png" class="logo" alt="" titl=""/></a>
		<a href="#" class="hamburger"></a>
		<nav>
			<ul>
			<?php
			if (isset($_SESSION['username'])){ ?>
				<li><a href="profile.php">Profile</a></li>
			<?php } ?>
				<li><a href="listings.php">Search Spaces</a></li>
			<?php
			if (isset($_SESSION['username'])){ ?>
				<li><a href="createspace.php">List a Space</a></li>
			<?php } ?>
			</ul>
			
			<?php

			if (isset($_SESSION['username'])){ ?>
				<a href="controller/logout.php" class="login_btn">Logout</a>
			<?php }else{ ?>
				<a href="login.php" class="login_btn">Login</a>
                <a href ="signup.php" class = "login_btn"> Register </a>
			<?php } ?>
		</nav>
	</div>
</header><!--  end header section  -->
</html>
