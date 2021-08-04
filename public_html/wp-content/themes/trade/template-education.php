<?php
/*
Template Name: Education
Template Post Type: post, page, product
 */

get_header();
?>
<div class="homepage_block">

  <h1 style="text-align: center;">Degram Education</h1>
        <p class="homepage_block_text_p">Here are the best traders who provide training and their rankings. You can add new traders, rate and comment.</p>


<div class="grid_brokers">

    <?php if( have_rows('education_block') ):

        while ( have_rows('education_block') ) : the_row(); ?>

        <div class="block_signals">

        
             
                <div class=""><img src="<?php the_sub_field('img'); ?>"alt="" class="education_block_img" ></div>
                <h5 class="education_block_name"><?php the_sub_field('name'); ?></h5>
                <div class=""><?php the_sub_field('stars'); ?></div>
           
           

            <button type="button" class="btn btn-nav-menu btn_post btn_trade btn-education-cards">SHOW DETAILS</button>

        </div>
        <?php

    endwhile;
else :
        // вложенных полей не найдено
endif;?>
</div>
<br>

<button class="btn btn-outline-secondary btn-lg btn-education">LOAD MORE</button>

<br>
<br>
  <h1 style="text-align: center;">Add Custom Trader</h1>
        <p class="homepage_block_text_p">You can can add link to the trader you want to get statistics for. We'll check him as soon as possible</p>

</div>

<?php
get_footer();