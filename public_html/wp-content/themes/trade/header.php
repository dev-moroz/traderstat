<?php
/**
 * The header.
 *
 * This is the template that displays all of the <head> section and everything up until main.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

?>
<!doctype html>
<html <?php language_attributes();?>>
<head>
	<meta charset="<?php bloginfo('charset');?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<?php wp_head();?>
</head>





<nav class="navbar navbar-expand-lg navbar-light bsnav">
	<div class="container-fluid">
		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<a class="navbar-brand" href="<?php echo get_home_url();?>"><img src="<?php echo get_template_directory_uri()?>/assets/img/logo-web-color.png" alt=""></a>



		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<?php

			wp_nav_menu([
				'theme_location'  => 'top_menu',
				'menu'            => '',
				'container'       => false,
				'container_class' => '',
				'container_id'    => '',
				'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0',
				'menu_id'         => '',
				'echo'            => true,
				'fallback_cb'     => 'wp_page_menu',
				'before'          => '',
				'after'           => '',
				'link_before'     => '',
				'link_after'      => '',
				'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
				'depth'           => 0,
				'walker'          => '',
				'add_li_class'    => 'nav-item',
			]);

			?> 
			<form class="d-flex">

			</form>
		</div>

		<?php
		$current_user = wp_get_current_user();

		if (is_user_logged_in()) {
			?>
			<div id="login_btn_popup2" style="position: absolute; right: 2%;display: flex;">
				<a href="<?php echo get_home_url();?>/account-2/" id="current_user-user_login" style="margin-right: 15px; margin-top: 2px; text-decoration: none; color: #2d3436;">
					<?php echo "$current_user->user_login";?>

					<!-- id user -->
					<!-- <?php echo "$current_user->ID";?> -->
				</a>
				<a href="<?php echo wp_logout_url();?>"><img src="<?php echo get_template_directory_uri()?>/assets/img/out_door.svg" alt=""></a>
			</div>
			<?php
	// 'Приветствую тебя, зарегистрированный и авторизованный пользователь!';
		} else {?>
			 <button id="login_btn_popup" type="button" class="btn btn-nav-menu" style="position: absolute; right: 2%;">LOGIN</button> 
		<?php }

		?>
		
	</div>


</nav>
<hr style="width: 86%; margin: auto; margin-top: 10px;" >



<!-- подключаем popup login -->
<?php include 'login_popup.php';?>

<!-- подключаем iframe_tinkoff -->
<?php include 'iframe_tinkoff.php';?>



<!-- <?php add_action('wp_footer', 'footer_enqueue_scripts_logo'); ?>  -->

<body <?php body_class();?>class="home-bg">

	<?php wp_body_open();?>

	<div id="page" class="site">
