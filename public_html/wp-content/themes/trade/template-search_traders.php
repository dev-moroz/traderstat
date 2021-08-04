<?php
/*
Template Name: Search_traders
Template Post Type: post, page, product
 */

get_header();
?>




<div class="homepage_block">


	<?php if (isset($_GET['trader'])) { 

	$id_trader = $_GET['trader'];


	global $mysqli;

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}

	if ($result = $mysqli->query("SELECT * FROM traders_table_home WHERE id = '$id_trader'" )){ 
	while( $row = $result->fetch_assoc() ){  
		$trader_name = $row['trader_name'];
}}; ?>

 <div class="traders_title">
			<h2><a style="color: rgba(0,0,0,.3);" href="<?php echo get_home_url()?>/search-traders/">Search-traders/</a><?php echo $trader_name; ?></h2>
		</div>

		<div class="search_slider">
			<div class="slider">

				<div class="slider-row">


					<?php  info_get_ideas('slider-row');  ?>


				</div>
			</div>


			<div class="slider-row_mob">

				<?php  info_get_ideas('slider-row_mob');  ?>

			</div>

		</div>


	<?}else{ ?>



	<h1 class="" style="text-align: center;"><?php echo get_the_title();?></h1>
	<p class="homepage_block_text_p">Want to trade with the best? Join the Degram team now. Start winning your trades.</p>

	<br>

	<div class="search_trades_div">
		<div class="search_slider_btn" >
			<button class="slider_prev slider_btn_np">Ideas</button>
			<button class="slider_next">Signals</button>
		</div>
		<br>

		<div class="search_filter">
			<input type="text" style="" placeholder="Search trader by name…" id="search">
		</div>


		<div class="search_slider">
			<div class="slider">

				<div class="slider-row">


					<?php  info_get_ideas('slider-row');  ?>


				</div>
			</div>


			<div class="slider-row_mob">

				<?php  info_get_ideas('slider-row_mob');  ?>

			</div>

		</div>

	</div>
	<br><br><br><br>

	<button class="btn btn-outline-secondary btn-lg btn-education">LOAD MORE</button>
<!-- </div> -->
<br><br><br><br>


<div class="homepage_block">
	<h1 class="" style="text-align: center;">Add Custom Trader</h1>
	<p class="homepage_block_text_p">You can can add link to the trader you want to get statistics for. We'll check him as soon as possible</p>

	<div class="cf7">
		<?php echo do_shortcode('[contact-form-7 id="178" title="Enter your link to trader here"]')?>
	</div>

</div>




		
	<?php }; ?>


</div>
<!--  -->
<!-- </div> -->





<?php footer_enqueue_scripts_searchTraders(); ?>



<?php get_footer();
