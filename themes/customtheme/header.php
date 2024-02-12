<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	
	<!-- agar tidak terindex dengan google -->
	<!-- ref = https://developers.google.com/search/docs/crawling-indexing/block-indexing -->
	<meta name="robots" content="noindex">
	<meta name="googlebot" content="noindex">
	<title>eKnowledge Taharica</title>
		<?php wp_head(); ?>

</head>
<body>
	
<header>

	<div class="container d-flex justify-content-between flex-wrap">


			<?php 
				wp_nav_menu(
					array(
						'thene_location' => 'top-menu',
						'menu' => 'Top Bar',
						'menu_class' => 'top-bar'

					)
				);
			?>
			

			<form
				method="post"
				action=""
				class="d-flex justify-content-center align-items-center gap-1"
			 >

				<input type="text" name="searchBar" class="form-control w-search" placeholder="Search">
				<input type="submit" name="submit" class="btn btn-light" />

			</form>

			
	</div>


</header>


