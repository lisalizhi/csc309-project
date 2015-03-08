<!-- Search bar -->
	<section class="search">
		<!-- Regular Search bar -->
		<div class="wrapper">
			<form action="searchresults.php" method="post">
				<input type="text" id="search" name="search" placeholder="What city do you want to work in?"  autocomplete="off"/>
				<input type="submit" id="submit_search" name="submit_search"/>
			</form>
			<a href="#" class="advanced_search_icon" id="advanced_search_btn"></a>
		</div>

		<!-- Advanced Search bar -->
		<div class="advanced_search">
			<div class="wrapper">
				<span class="arrow"></span>
				<form action="listings.php" method="post">
					<div class="search_fields">
						<input type="number" min="0" class="float" id="min_price" name="min_price" placeholder="Min. Price"  autocomplete="off">

						<hr class="field_sep float"/>

						<input type="number" min="0" class="float" id="max_price" name="max_price" placeholder="Max. price"  autocomplete="off">
					</div>
					<input type="number" min="0" max="5" id="keywords" name="rating" placeholder="Min. Rating"  autocomplete="off">
					<input type="submit" id="submit_search" name="submit_search"/>
				</form>
			</div>
		</div><!--  end advanced search section  -->
	</section>
<!--  end search section  -->
