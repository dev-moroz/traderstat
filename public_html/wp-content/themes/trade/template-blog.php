<?php
/*
Template Name: Blog
Template Post Type: post, page, product
 */
get_header();
?>

<br>
<div class="signals">


    <div class="container">

        <h1 style="text-align:left;"><?php echo get_the_title();
?></h1>
<?php echo the_content()?><br><br>

        <div class="row">

<?php
$args = array(
	'post_type' => 'blog',
	'publish'   => true,
);

query_posts($args);

if (have_posts()) {while (have_posts()) {the_post();?>
		<!-- <button class="accordion" onclick="plus_minus()"> -->


				                    <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 " style="margin-bottom: 30px;display:flex; justify-content: space-between;">
		                        
				                        <div style="text-align: left; display:flex; flex-direction: column; justify-content: space-between;">


                                  <div>
                                    
                                      <?php the_post_thumbnail()?><br><br>
                                      <h5><?php the_title();?></h5>
                                      <p style="margin-bottom: 0 !important;"><?php echo get_the_date('j F Y');?></p>

                                  </div>

				                            <div>
                                      <p><?php the_excerpt();?></p>
                                      <a href="<?php echo get_the_permalink();?>" style="text-decoration: none;">Show more</a>
                                    </div>
				                        </div>
				                    </div>

		<?php }} else {?>
	<p>Записей нет.</p>
	<?php }?>
</div>
            <button class="btn btn-outline-secondary btn-lg btn-education" style="margin-top: 20px;">LOAD MORE</button>
        </div>
    </div>


<!-- <script>
    var acc = document.getElementsByClassName("accordion");
    var i;

    for (i = 0; i < acc.length; i++) {
      acc[i].addEventListener("click", function() {
        this.classList.toggle("active");
        var panel = this.nextElementSibling;
        if (panel.style.display === "block") {
          panel.style.display = "none";
      } else {
          panel.style.display = "block";
      }
  });
  }
</script> -->

<?php
get_footer();
