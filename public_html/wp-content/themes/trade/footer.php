<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package TraderStat
 */

?>
</div><!-- #page -->
</div>
<footer id="colophon" class="site-footer">

<hr style="width: 70%; margin: auto;" >
	<nav class="navbar navbar-expand-lg navbar-light">
  		<div class="container-fluid">
    		<div class="collapse navbar-collapse footer_navbar" id="navbarSupportedContent">
<?php

wp_nav_menu([
		'theme_location'  => 'down_menu',
		'menu'            => '',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'navbar-nav me-auto mb-2 mb-lg-0 footer_navbar',
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
        	<p id="footer_text">Degram 2020. All Right Reserved</p>
    		</form>
    	</div>
	</div>
</nav>





</footer><!-- #colophon -->

<?php wp_footer();?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


</body>
</html>
