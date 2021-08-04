<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package TraderStat
 */

get_header();

$return_url = wp_get_referer()
?>




<div class="blog_page_first">




    <main id="primary blog_page" class="site-main">

    <p><a style="text-decoration: none; color: #636e71" class="button" href="<?php echo esc_url($return_url);?>">&#8592;
 Back to all blog</a></p>


<?php the_post_thumbnail()?>

        <div class="blog_page_content">
            <h3><?php the_title();?></h3>
            <p class="blog_page_content_date"><?php echo get_the_date('j F Y');?></p>
            <p><?php the_content();?></p>
        </div>



    </main><!-- #main -->

    <div class="widget_blog" >
<?php if (function_exists('dynamic_sidebar')) {
	dynamic_sidebar('right-sidebar');
}
?>
</div>

</div>

<?php
get_footer();
