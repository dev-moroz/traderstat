<?php
/*
Template Name: Search_traders
Template Post Type: post, page, product
 */

get_header();
?>




<div class="homepage_block">

	<h1 class="" style="text-align: center;"><?php echo get_the_title();
?></h1>

<p class="homepage_block_text_p">Want to trade with the best? Join the Degram team now. Start winning your trades.</p>

<br>

<div class="search_trades_div">
	<div class="search_slider_btn" >
		<button class="slider_prev slider_btn_np">Ideas</button>
		<button class="slider_next">Signals</button>
	</div>
	<br>



	<div class="search_filter">
		<select style="">
			<option>Crypto</option>
			<option>Forex</option>
		</select>
		<input type="text" style="" placeholder="Search trader by name…">
		<button style="" type="button" class="btn btn-nav-menu">SEARCH</button>
	</div>
	<br><br>




	<div class="search_slider">
		<div class="slider">
			<div class="slider-row">

				<!-- <table class="info_table tablesorter {sortlist: [[1,0]]}" id="myTable">
					<thead>
						<tr class="color_table_title">
							<th class="sortless">Trader name</th>
							<th>Number of ideas</th>
							<th>Successful ideas</th>
							<th>Successful percentage</th>
						</tr>
					</thead>
					<tbody>
						<?php if (have_rows('table_search_traders')):
							while (have_rows('table_search_traders')):the_row();?>

								<tr class="color_table" >
									<td class="info_table_name"><?php the_sub_field('trader_name');?></td>
									<td><?php the_sub_field('number_of_ideas');?></td>
									<td><?php the_sub_field('successful_ideas');?></td>
									<td><?php the_sub_field('successful_percentage');?>%</td>
								</tr>

							<?php endwhile;
							else :endif;
							?>
						</tbody>
					</table>

					<table class="info_table tablesorter {sortlist: [[1,0]]}" id="myTable">
					<thead>
						<tr class="color_table_title">
							<th class="sortless">Trader name</th>
							<th>Number of ideas</th>
							<th>Successful ideas</th>
							<th>Successful percentage</th>
						</tr>
					</thead>
					<tbody>
						<?php if (have_rows('table_search_traders')):
							while (have_rows('table_search_traders')):the_row();?>

								<tr class="color_table" >
									<td class="info_table_name"><?php the_sub_field('trader_name');?></td>
									<td><?php the_sub_field('number_of_ideas');?></td>
									<td><?php the_sub_field('successful_ideas');?></td>
									<td><?php the_sub_field('successful_percentage');?>%</td>
								</tr>

							<?php endwhile;
							else :endif;
							?>
						</tbody>
					</table> -->



<?php connect_to_out_bd_01("slider-row"); ?>
<?php connect_to_out_bd_01("slider-row"); ?>


						</div>


						<hr><hr>

						<div class="slider-row">


							<!-- таблица с идеями -->

							<?php status_ideas(); ?>



							<!-- ================================================ -->



						<!-- <table class="info_table table_sort tablesorter {sortlist: [[1,0]]}">
							<thead>
								<tr class="color_table_title">
									<th class="sortless">Idea’s name</th>
									<th>Idea’s date</th>
									<th class="sortless">Successful / Not successful</th>
									<th class="sortless">Vote</th>
									<th class="sortless"></th>
								</tr>
							</thead>
							<tbody>
								<?php if (have_rows('ideas')):
									while (have_rows('ideas')):the_row();?>

										<tr class="color_table" >
											<td ><?php the_sub_field('idea’s_name');?></td>
											<td style="opacity: .6"><?php the_sub_field('ideas_date');?></td>
											<td style="color: #00b647"><?php the_sub_field('successful__not_successful');?></td>
											

											<td style="padding: 0;">
												<table style="margin: 0; background: none;">
													<tr>
														<td style="padding:0; min-width: 90px;">
															<button class="info_table_plus" style="margin-right: 10px;">+</button>432
														</td>
														<td style="padding:0; min-width: 90px;">
															<button class="info_table_minus" style="margin-right: 10px;">-</button>389
														</td>
													</tr>
												</table>

											</td> -->

											<!-- <td style="display: flex; align-items: center; padding: 20px 20px 0 20px; min-width: 200px; justify-content: space-between;">
												
															<span style="margin-right: 10px;"><button class="info_table_plus" style="margin-right: 10px;">+</button>432</span>
														
															<span style="margin-right: 10px;"><button class="info_table_minus" style="margin-right: 10px;">-</button>389</span>
													

											</td> -->

											<!-- <td><div href="#" class="info_table_popup">i
												<div class="info_table_popup_message">
													<h4 style="color: #000;">Vote for Idea 🔥</h4>
													<p style="text-align: left;">
														Our automated algorithms have small prediction error. If you find inaccuracy in prediction result, you can vote to clarify it.
													</p>
												</div>
											</div></td>
										</tr>

									<?php endwhile;
									else :endif;
									?>
								</tbody>
							</table> -->

							</div>

						</div>




						<div class="slider-row_mob">

							<div class="block_signals w100">

								<h4 style="text-align: left;">Top Traders</h4>
								<br><hr>

								<?php if (have_rows('table_search_traders')):
									while (have_rows('table_search_traders')):the_row();?>

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
									</div>
									<hr><br>
								<?php endwhile;
								else :endif;
								?>
							</div>

							<div class="block_signals w100">

								<h4 style="text-align: left;">Top Traders</h4>
								<br><hr>

								<?php if (have_rows('table_search_traders')):
									while (have_rows('table_search_traders')):the_row();?>

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
									</div>
									<hr><br>
								<?php endwhile;
								else :endif;
								?>
							</div>
						</div>
						<div class="slider-row_mob">
							<!-- block +- -->
							<div class="block_signals w100">

								<!-- 	 -->
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
							</div>
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
