<?php
/*
Template Name: Homepage
Template Post Type: post, page, product
 */

$mysqli = new mysqli('92.53.96.174', 'cr08935_0', '5cKV13BP', 'cr08935_0');

get_header();
?>
<!--  <iframe class="iframe_tinkoff_pay" name="pay-form-iframe" id="pay-form-iframe" src="http://cf52359-wordpress.tw1.ru/log-in-3/" ></iframe> -->

<div class="homepage_wrapper">
  <div class="homepage_content">

    <div class="homepage_block homepage_block_first">
      <h1>Degram Signals for Crypto & Forex</h1>
      <p class="homepage_block_text_p f_24{">Degram is a team of traders and analysts with 11 years of experience in the financial markets.</p>
      <img src="<?php echo get_template_directory_uri()?>/assets/img/group_sociality.png" alt="">
    </div>

    <div class="homepage_block homepage_block_second">

     <h1>Header Text Here</h1>
     <p class="homepage_block_text_p f_24{">Want to trade with the best? Join the Degram team now. Start winning your trades.</p>



     <!-- table decktop -->
     <div class="slider-row">
      <div style="width: 100%; position:relative;">

<?php connect_to_out_bd_01("slider-row");?>
<div class="back_shadowTable"></div>
        <!-- <button type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</button> -->


<?php
$current_user = wp_get_current_user();

if (is_user_logged_in()) {?>
	<!-- <button type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</button> -->
		          <a href="#" type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</a>
	<?php } else {?>
	<button id="" type="button" class="btn btn-nav-menu btn_post_big" onclick="tap_login_btn()">SHOW FULL</button>
	<?php }
?>
</div>

    </div>

    <!-- table mobile -->
    <div class="slider-row_mob">
<?php connect_to_out_bd_01("slider-row_mob");?>
<!-- <button type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</button> -->


<?php
$current_user = wp_get_current_user();

if (is_user_logged_in()) {?>
	<!-- <button type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</button> -->
		        <a href="#" type="button" class="btn btn-nav-menu btn_post btn_post_big">SHOW FULL</a>
	<?php } else {?>
	<button type="button" class="btn btn-nav-menu btn_post btn_post_big" onclick="tap_login_btn()">SHOW FULL</button>
	<?php }
?>


    </div>




  </div>

  <div class="homepage_block">
    <h1>Degram Analytics</h1>
    <p class="homepage_block_text_p f_24{">We are top analysts in one of the best forex platforms.2 million visits per day thousands of traders and only a few go to the TOP.<p>
      <img src="<?php echo get_template_directory_uri()?>/assets/img/men.svg" alt=""><br>
      <!-- <button type="button" class="btn btn-nav-menu btn_post btn_post_big">JOIN TODAY</button> -->

<?php
$current_user = wp_get_current_user();
if (is_user_logged_in()) {?>
	<button type="button" class="btn btn-nav-menu btn_post btn_post_big">JOIN TODAY</button>
	<?php } else {?>
	<button type="button" class="btn btn-nav-menu btn_post btn_post_big" onclick="tap_login_btn()">JOIN TODAY</button>
	<?php }
?>
</div>

    <div class="homepage_block">

      <h1>Premium Plans</h1>
      <p class="homepage_block_text_p">Want to trade with the best? Join the Degram team now. Start winning your trades.</p>

      <div class="container">
        <div class="row">
<?php if (have_rows('Premium Plans2')):
while (have_rows('Premium Plans2')):the_row();
?>

				              <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 ">
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
						                  <button type="button" id="<?php echo the_sub_field('id_btn');?>" class="btn btn-nav-menu btn_post ">GET NOW</button>
	<?php
	// 'Приветствую тебя, зарегистрированный и авторизованный пользователь!';
} else {?>
	<button id="" type="button" class="btn btn-nav-menu btn_post" onclick="tap_login_btn()">LOGIN</button>
	<?php }

?>


				                <!-- <button type="button" id="<?php echo the_sub_field('id_btn');?>" class="btn btn-nav-menu btn_post ">GET NOW</button> -->



				              </div>
				            </div>
				          </div>
<?php endwhile;
 else :endif;
?>
</div>
    </div>
  </div>



  <div class="homepage_block">

    <h1>Our Social Network</h1>
    <p class="homepage_block_text_p">News, communication and always up-to-date information. also you can write to us directly.</p>

    <div class="container">
      <div class="row">


<?php if (have_rows('Our Social Network')):
while (have_rows('Our Social Network')):the_row();
?>

				            <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 ">
				              <div class="work_card">
				                <div class="link_icons"><img src="<?php echo the_sub_field('img');?>" class="hiw_card_img link_icons_img" id="<?php echo the_sub_field('img_id');?>" alt="..."></div>
				                <div class="card-body">
				                  <h5 class="card-text"><span><?php echo the_sub_field('title');?></span></h5>
				                  <p><?php echo the_sub_field('sub_title');?></p>
				                  <br>
				                  <!-- <button type="button" class="btn btn-nav-menu btn_post">JOIN NOW</button> -->

<?php
$current_user = wp_get_current_user();
if (is_user_logged_in()) {?>
	<button type="button" class="btn btn-nav-menu btn_post btn_post_big">JOIN NOW</button>
	<?php } else {?>
	<button type="button" class="btn btn-nav-menu btn_post btn_post_big" onclick="tap_login_btn()">JOIN NOW</button>
	<?php }
?>
</div>
				              </div>
				            </div>

<?php endwhile;
 else :endif;
?>

        <!-- <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 ">
            <div class="work_card">
                <div class="link_icons"><img src="<?php echo get_template_directory_uri()?>/assets/img/telegram.png" class="hiw_card_img link_icons_img" alt="..." style="padding: 7px;"></div>
                <div class="card-body">
                    <h5 class="card-text"><span>Telegram </span></h5>
                    <p>76 456 Subscribers</p>
                    <br>
                    <button type="button" class="btn btn-nav-menu btn_post">JOIN NOW</button>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 ">
            <div class="work_card">
                <div class="link_icons"><img src="<?php echo get_template_directory_uri()?>/assets/img/instagram.png" class="hiw_card_img link_icons_img" alt="..."></div>
                <div class="card-body">
                    <h5 class="card-text"><span>Instagram</span></h5>
                    <p>31 037 Followers</p>
                    <br>
                    <button type="button" class="btn btn-nav-menu btn_post">JOIN NOW</button>
                </div>
            </div>
        </div>

        <div class="col-xl-4 col-md-4 col-lg-4 col-sm-12 ">
            <div class="work_card">
                <div class="link_icons"><img src="<?php echo get_template_directory_uri()?>/assets/img/whatsapp.png" class="hiw_card_img link_icons_img" alt="..." style="border-radius: 25px;"></div>
                <div class="card-body">
                    <h5 class="card-text"><span>WhatsApp</span></h5>
                    <p>21 188 Subscribers</p>
                    <br>
                    <button type="button" class="btn btn-nav-menu btn_post">JOIN NOW</button>
                </div>
            </div>
          </div> -->


        </div>
      </div>
    </div>

<!-- <?php
echo do_shortcode('[product_category per_page="4" orderby="date" order="desc" category="Misc"]');
?>-->


 <div class="homepage_block">
  <h1>Contact Us</h1>
  <p class="homepage_block_text_p">Leave us a message and we will reply you later</p>
  <!-- <button type="button" class="btn btn-nav-menu btn_post">ASK AWAY, WE’RE HERE TO HELP</button> -->
  <div class="cf7">
<?php echo do_shortcode('[contact-form-7 id="60" title="contact us - homepage"]')?>
</div>

</div>



<script>
  function tap_login_btn() {
    bg_login_popup.classList.toggle('display_none');
    login_popup_form.classList.toggle('display_none');
  }
</script>


</div>



<?php add_filter('wp_footer', 'tinkoff_pay_popup');?>
<?php

get_footer();
