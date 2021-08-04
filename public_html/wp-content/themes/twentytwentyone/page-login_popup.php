<?php
/**
	Template Name: page-login_popup
	Template Post Type: post, page, product
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WordPress
 * @subpackage Twenty_Twenty_One
 * @since Twenty Twenty-One 1.0
 */

// get_header();
	?>

	<style>
		nav,hr{display:none !important;}
		#log-in-links{
			display: flex;
			justify-content: space-between;
			border-bottom: 1px solid rgba(0, 0, 0, 0.3);
			margin-bottom: 10px;
			padding-bottom: 10px;
			align-items: center;
		}

		#log-in-links input{
			order: 2;
		}

		#log-in-links a{
			order: 1;
			text-decoration: none;
			color: red;
		}
		fieldset{
			border: none;
		}
		article{
			border-radius: 8px;
			position: fixed;
			background-color: #ffffff;
			padding: 30px 20px 0 10px;
			z-index: 9999;
		}
		.tac{
			text-align: center;
			clear: both;
			font-family: "Geomanist-Book";
		}

	</style>
	<?php
	// add_filter( 'wp_head', 'login_popup');
	/* Start the Loop */
	while (have_posts()):
		the_post();
// get_template_part( 'template-parts/content/content-page' );
		get_template_part('template-parts/content/login_popup');

// If comments are open or there is at least one comment, load up the comment template.
		if (comments_open() || get_comments_number()) {
			comments_template();
		}
endwhile;// End of the loop.

