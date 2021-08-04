<?php
/*
Template Name: Signal
Template Post Type: post, page, product
 */

get_header();
?>

<br>
<div class="signals">
	<h1><?php echo get_the_title();?></h1>
    <!-- <?php echo the_content()?><br><br> -->
    <p class="homepage_block_text_p f_24">VIP signals have been proven to be highly profitable which can be seen in our results section. If you are an experienced trader or just getting started, by joining our VIP will not only give you an opportunity to make good profits but also perfect your trading skills.</p>
    <hr>
    <br>
    <h1>Benefits of using Degram VIP signals</h1>
    <p class="homepage_block_text_p f_24">Below are some examples as to why traders are choosing our VIP Signals over other providers</p>

    <div class="grid_signals">

<?php $i = 1;
if (have_rows('benefits_of_using_degram_vip_signals')):

while (have_rows('benefits_of_using_degram_vip_signals')):the_row();?>

		                <div class="block_signals1">
		                    <div class="block_signals_number1"><?php echo $i++;?></div><!-- номер блока -->
		                    <div class="block_signals_text1"><?php the_sub_field('text');?></div>
		                </div>

<?php endwhile;
endif;
?>
</div>
    <div class="btn_signal" ><button type="button" class="btn btn-nav-menu btn_signal_btn btn_post_big">GET STARTED TODAY</button></div>

    <hr>
    <br>
    <h1>Example of a Trade Call</h1>
    <p class="homepage_block_text_p">Below are some examples as to why traders are choosing our VIP Signals over other providers</p>

    <div class="grid_signals">
<?php if (have_rows('example_of_a_trade_call')):

while (have_rows('example_of_a_trade_call')):the_row();?>
<div class="block_signals">
		                    <p>Degram Forex</p>
		                    <p class="block_signals_sell"><span>&nbsp;
		                      SELL&nbsp;
		                  </span>&nbsp;
<?php the_sub_field('cell');
?></p>
		              <hr>
		              <div class="block_sigbals_num">
		                <div class="block_sigbals_left">Take Profit</div>
		                <div class="block_sigbals_right"><?php the_sub_field('take_pofit');?></div>
		            </div>
		            <div class="block_sigbals_num">
		                <div class="block_sigbals_left">Stop loss</div>
		                <div class="block_sigbals_right"><?php the_sub_field('stop_loss');?></div>
		            </div>
		        </div>
<?php

endwhile;
 else :
// вложенных полей не найдено
endif;?>
</div>


<hr>
<br>
<h1>Weekly Trade Reports</h1>
<p class="homepage_block_text_p">Below are some examples as to why traders are choosing our VIP Signals over other providers</p>


<div class="grid_brokers">

<?php if (have_rows('weekly_trade_reports')):

while (have_rows('weekly_trade_reports')):the_row();?>


		            <div class="block_signals">

		                <h5 style="text-align: center;"><?php the_sub_field('date');
?></h5>

		            <hr style="height: 1px;">
		            <div class="block_sigbals_num">
		                <div class="block_sigbals_left">Signals</div>
		                <div class="block_sigbals_right"><?php the_sub_field('signals');?></div>
		            </div>
		            <div class="block_sigbals_num">
		                <div class="block_sigbals_left">Pips</div>
		                <div class="block_sigbals_right"><?php the_sub_field('pips');?></div>
		            </div>
		            <div class="block_sigbals_num">
		                <div class="block_sigbals_left">Win Rate</div>
		                <div class="block_sigbals_right"><span class="block_sigbals_right-green_prosent"><?php the_sub_field('win_rate');?>%</span></div>
		            </div>

		            <div class="block_signals_line">
		                <div class="block_signals_line-red" style="width: <?php the_sub_field('win_rate');?>%"></div>
		            </div>


		            <button type="button" class="btn btn-nav-menu btn_post btn_trade">DOWNLOAD REPORT</button>

		        </div>
<?php

endwhile;
 else :
// вложенных полей не найдено
endif;?>
</div>




<div class="homepage_block">

  <h1>Premium Plans</h1>
  <p class="homepage_block_text_p">Want to trade with the best? Join the Degram team now. Start winning your trades.</p>

  <div class="container desktop_slider">
    <div class="row">
      <?php $i=0;
      if (have_rows('Premium Plans2')):
        while (have_rows('Premium Plans2')):the_row();
          $i++; $r = 0;

          switch ($i) {
            case '1':
            $r = 'easy_level';
            break;
            case '2':
            $r = 'middle_level';
            break;
            case '3':
            $r = 'pro_level';
            break;
          };
          ?>

          <div class="col-xl-4 col-md-4 col-lg-4 col-sm-4 ">
            <div class="work_card" style="text-align: center;">
            </style>
            <img src="<?php echo the_sub_field('img');?>" class="hiw_card_img" alt="...">
            <div class="card-body price_body">

              <h3><?php echo the_sub_field('title');?></h3>
              <p class="card-text"><?php echo the_sub_field('sub_title');?></p>
              <p class="price_euro"><sup>€</sup><span> <?php echo the_sub_field('price');?></span><sub> / month</sub></p>
              <hr>
              <p class="price_card_text"> <?php echo the_sub_field('description');?>
              <strike> <?php echo the_sub_field('description_hide');?></strike>
            </p>
            <?php 
            $current_user = wp_get_current_user();

            if (is_user_logged_in()) { ?>
              <!-- <button type="button" id="<?php echo the_sub_field('id_btn');?>" class="btn btn-nav-menu btn_post ">GET NOW</button> -->
              <?php widget_tinkoff("$r");?>
              <?php
                            // 'Приветствую тебя, зарегистрированный и авторизованный пользователь!';
            } else {?>
             <button id="" type="button" class="btn btn-nav-menu btn_post" onclick="tap_login_btn()">LOGIN</button>
           <?php } ?>


           <!-- <button type="button" id="<?php echo the_sub_field('id_btn');?>" class="btn btn-nav-menu btn_post ">GET NOW</button> -->



         </div>
       </div>
     </div>
   <?php endwhile;
   else :endif;
   ?>
 </div>
</div>

<!--  -->

<div class="slider mob_slider">
  <div class="slider-list">
    <div class="slider-track">

      <!--  -->
      <?php if (have_rows('Premium Plans2')):
        while (have_rows('Premium Plans2')):the_row();
          ?>
          <div class="slide">

            <div class="work_card" style="text-align: center;">
            </style>
            <img src="<?php echo the_sub_field('img');?>" class="hiw_card_img" alt="...">
            <div class="card-body price_body">

              <h3><?php echo the_sub_field('title');?></h3>
              <p class="card-text"><?php echo the_sub_field('sub_title');?></p>
              <p class="price_euro"><sup>€</sup><span> <?php echo the_sub_field('price');?></span><sub> / month</sub></p>
              <hr>
              <p class="price_card_text"> <?php echo the_sub_field('description');?>
              <strike> <?php echo the_sub_field('description_hide');?></strike>
            </p>

            <?php
            $current_user = wp_get_current_user();

            if (is_user_logged_in()) {
              ?>
              <!-- <button type="button" id="<?php echo the_sub_field('id_btn');?>" class="btn btn-nav-menu btn_post ">GET NOW</button> -->
              <?php widget_tinkoff("easy_level");?>
              <?php
  // 'Приветствую тебя, зарегистрированный и авторизованный пользователь!';
            } else {?>
              <button id="" type="button" class="btn btn-nav-menu btn_post" onclick="tap_login_btn()">LOGIN</button>
            <?php }

            ?>
          </div>
        </div>
      </div>

    <?php endwhile;
    else :endif;
    ?>
    
  </div>
</div>
<div class="slider-arrows">
  <button type="button" class="prev">&larr;</button>
  <button type="button" class="next">&rarr;</button>
</div>
</div>

<!--  -->


</div>


<?php
get_footer();
