<?php
/*
Template Name: Search_traders
Template Post Type: post, page, product
 */

get_header();
?>




<div class="homepage_block">


	<?php
// 	if (isset($_GET['id'])){
// 		$id_table_ideas = $_GET['id'];
// 	};

// 	 global $mysqli;

// if (mysqli_connect_errno()) {
//    printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
// 	   exit;	
// }

// if ($result = $mysqli->query("SELECT * FROM ideas WHERE id = '$id_table_ideas'" )){  
// 	while( $row = $result->fetch_assoc() ){ 
// 	  print($row['ideas_date']);
// 	} 

// 	};

	 // info_get_ideas('slider-row_mob'); 
	?>




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

		<!-- <?php connect_to_out_bd_01("slider-row"); ?> -->

<?php  info_get_ideas('slider-row');  ?>
		<!-- вторая -->
		<!-- <?php connect_to_out_bd_01("slider-row"); ?> -->

		</div>
		<br><br>
		<div class="slider-row">

		<!-- таблица с идеями -->
		

		</div>
	</div>


	<div class="slider-row_mob">
		<?php  info_get_ideas('slider-row_mob');  ?>

		<!-- <?php connect_to_out_bd_01("slider-row_mob"); ?> -->

<!-- <section id="content">
	<div id="results">
		<div class="results"><div class="ytube">
			<h4 style="text-align: left;">Top Traders</h4><br><hr>

			<?php if (have_rows('table_search_traders')):
				while (have_rows('table_search_traders')):the_row();?>

					<div id="trololo">

						<h5 style="text-align: left; color: #039cfc;"><?php the_sub_field('trader_name');
						?></h5><br>

						<div class="block_sigbals_num">
							<div class="block_sigbals_left block_sigbals_left_grey">Number of ideas</div>
							<div class="block_sigbals_right"><?php the_sub_field('number_of_ideas');?></div>
						</div>
						<div class="block_sigbals_num">
							<div class="block_sigbals_left block_sigbals_left_grey">Successful ideas</div>
							<div class="block_sigbals_right"><?php the_sub_field('successful_ideas');?></div>
						</div>
						<div class="block_sigbals_num">
							<div class="block_sigbals_left block_sigbals_left_grey">Successful percentage</div>
							<div class="block_sigbals_right"><?php the_sub_field('successful_percentage');?>%</div>
						</div><hr><br>

					</div>


				<?php endwhile;
				else :endif;
				?>
			</div>
		</div>
	</div>
</section> -->

</div>

<div class="slider-row_mob">

<!-- <?php status_ideas('slider-row_mob'); ?> -->
							<!-- block +- -->
							<!-- <div class="block_signals w100">

								
								<br><hr>

								<?php if (have_rows('table_search_traders')):
									while (have_rows('table_search_traders')):the_row();?>
										<h5 style="text-align: left;">How To Excel In A Technical Job Interview</h5><br>

										<div class="block_sigbals_num">
											<div class="block_sigbals_left_grey">29 Sep 2021</div>
											<div>Success</div>
										</div>

										<div class="" style="display: flex; justify-content: space-between;">
											<div style="display: flex; justify-content: center; align-items: center; border: 1px solid gray; border-radius: 8px; padding: 10px 20px; width: 49%">
												<button class="info_table_plus" style="margin-right: 10px;">+</button>432
											</div>
											<div style="display: flex; justify-content: center; align-items: center; border: 1px solid gray; border-radius: 8px; padding: 10px 20px; width: 49%">
												<button class="info_table_minus" style="margin-right: 10px;">-</button>389
											</div>
										</div>

										<hr><br>
									<?php endwhile;
								endif;?>
							</div>  -->
</div>





					</div>

				</div>
				<br><br><br><br>

				<button class="btn btn-outline-secondary btn-lg btn-education">LOAD MORE</button>
			</div>
			<br><br><br><br>


			<div class="homepage_block">
				<h1 class="" style="text-align: center;">Add Custom Trader</h1>
				<p class="homepage_block_text_p">You can can add link to the trader you want to get statistics for. We'll check him as soon as possible</p>

				<div class="cf7">
					<?php echo do_shortcode('[contact-form-7 id="178" title="Enter your link to trader here"]')?>
				</div>

			</div>

		</div>




		
	
	<?php footer_enqueue_scripts_searchTraders(); ?>



<?php get_footer();
