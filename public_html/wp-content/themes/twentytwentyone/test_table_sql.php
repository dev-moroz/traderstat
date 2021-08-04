<?php
/*
Template Name: test_table_sql
Template Post Type: post, page, product
 */

get_header();
?>

<div class="slider-row">
  <?php connect_to_out_bd_01("slider-row"); ?>
</div>

<?php 

$mysqli = new mysqli('92.53.96.174', 'cr08935_0', '5cKV13BP', 'cr08935_0');

		if (mysqli_connect_errno()) {
		   printf("Подключение к серверу MySQL невозможно. Код ошибки: %s\n", mysqli_connect_error());
		   exit;
		}

		if ($result = $mysqli->query('SELECT * FROM traders_table_home')){  

		   while( $row = $result->fetch_assoc() ){  

				echo do_shortcode('[table id=1 /]');
				print($row['trader_name']);

			 }} 

 ?>

	<?php echo do_shortcode('[table id=1 /]')?>
	<?php echo do_shortcode('[table id=1 /]')?>
			


<?php
get_footer();
