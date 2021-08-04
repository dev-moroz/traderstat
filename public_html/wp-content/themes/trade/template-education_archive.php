<?php
/*
Template Name: Archive_education
Template Post Type: post, page, product
 */

get_header();
?>


<br>
<div class="signals">
	<h1><?php echo get_the_title();?></h1>
    <?php echo the_content()?><br><br>
    <hr>



<div class="container">
    <div class="row">

    <?php 
    $args = array(
     'post_type' => 'stars',
     'publish' => true,
 );

    query_posts($args);

    if ( have_posts() ) { while ( have_posts() ) { the_post(); ?>

        <div class="col-xl-3 col-md-3 col-lg-3 col-sm-12 ">
            <div class="work_card">
                <div class="card-body price_body">

                     <img src="" alt="">
                    <h4><?php the_title(); ?></h4>

                    <button type="button" class="btn btn-nav-menu btn_post">SHOW DETAILS</button>
                </div>
            </div>
        </div>
   


      <?php } } else { ?>
        <p>Записей нет.</p>
    <?php } ?>

     </div>
</div>


</div>

<?php add_filter('wp_footer','footer_enqueue_scripts_after'); ?>

<script>
   // var acc = document.getElementsByClassName("accordion");
  //   var i;

  //   for (i = 0; i < acc.length; i++) {
  //     acc[i].addEventListener("click", function() {
  //       this.classList.toggle("active");
  //       var panel = this.nextElementSibling;
  //       if (panel.style.display === "block") {
  //         panel.style.display = "none";
  //     } else {
  //         panel.style.display = "block";
  //     }
  // });
  // }

  // function plus_minus(){
  //   var plus = document.getElementsByClassName("faq_title_plus");
  //   var minus = document.getElementsByClassName("faq_title_minus");
  //   minus.classList.toggle("show_symbol");
  //   plus.classList.toggle("hide_symbol");
  // }
</script>
<?php
get_footer();
