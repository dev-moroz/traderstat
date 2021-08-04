<?php
/*
Template Name: Brokers
Template Post Type: post, page, product
 */

get_header();
?>


<div class="about">
	<h1><?php echo get_the_title();?></h1>
<!-- <?php echo the_content()?><br> -->
<p class="homepage_block_text_p f_24">How not to lose money with a broker? 90% of brokers want to take your money!️ I myself saw how brokers.
Here are good brokers with whom you will not have problems</p>

<div class="grid_brokers">

<?php if (have_rows('brokers_block')):

while (have_rows('brokers_block')):the_row();?>

		       <div class="block_brokers">
		       	<img src="<?php the_sub_field('img');?>"><br><br>
		       	<h4><?php the_sub_field('title');?></h4>
		       	<p><?php the_sub_field('text');?></p>
		       	<button class="btn_brokers btn btn-lg btn-nav-menu "><?php the_sub_field('button');?></button>
		       </div>
<?php

endwhile;
 else :
// вложенных полей не найдено
endif;?>
</div>
</div>


<?php
get_footer();
