<?php
/*
Template Name: FAQ
Template Post Type: post, page, product
 */

get_header();
?>

<br>
<div class="signals">
	<h1><?php echo get_the_title();?></h1>
<?php echo the_content()?><br><br>
    <hr>


<div class="faq_div">
<?php
$args = array(
	'post_type' => 'faq',
	'publish'   => true,
);

query_posts($args);

if (have_posts()) {while (have_posts()) {the_post();?>
		<button class="accordion" onclick="plus_minus()">
		<?php the_title();?></button>
				        <div class="panel">
				            <p><?php the_content();?></p>
				        </div>



		<?php }} else {?>
	<p>Записей нет.</p>
	<?php }?>
</div>
</div>

<?php add_filter('wp_footer', 'footer_enqueue_scripts_after');?>

<?php
get_footer();
