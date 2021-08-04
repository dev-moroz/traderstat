<?php
/*
Template Name: Settings2
Template Post Type: post, page, product
 */

get_header();
?>

<br>
<div class="signals">
   <!-- <h1><?php echo get_the_title();?></h1>
<?php echo the_content()?><br><br>
   <hr> -->
   <br>
</div>
<div class="settings">
    <div class="setting_sidebar">
        <h5>Settings</h5>
        <hr style="width: 90%;margin: 30px auto;">

<?php

wp_nav_menu([
		'theme_location'  => 'setting_menu',
		'menu'            => '',
		'container'       => false,
		'container_class' => '',
		'container_id'    => '',
		'menu_class'      => 'setting_menu_ul',
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
	]);

?>

    </div>
    <div class="setting_field">
        <div class="login_popup_form" id="login_popup_form">
            <h4>Your Referal Links</h4><br>

                <p class="black03" ><?php echo do_shortcode('[wp-referral-code var="ref_link"]')?></p>

                <div class="login_popup_form_btn">
<?php echo do_shortcode('[wp-referral-code var="copy_ref_link"]')?>
</div>

        </div>
         <hr>

         <div class="login_popup_form" id="login_popup_form">
            <div style="display: flex; justify-content: space-between;">
                <div class="referal_info">
                    <div>Responses count</div>
                    <div class="referal_info_num">9</div>
                </div>
                <div class="referal_info">
                    <div>Registration count</div>
                    <div class="referal_info_num">
                        <?php echo do_shortcode('[wp-referral-code var = "hibited_count "]');?>
                    </div>
                </div>
                <div class="referal_info">
                    <div>Rewards for users</div>
                    <div class="referal_info_num"><nobr>$ 540</nobr></div>
                </div>
            </div>
        </div>
        <hr>

        <div> <?php echo do_shortcode('[wp-referral-code var = "hibited_list "] ');?></div>

        <div class="login_popup_form" id="login_popup_form" style="margin-bottom: 30px;">
            <h4>Order History</h4>
            <table class="referal_table">
                <thead>
                    <tr>
                        <th class="black03">People</th>
                        <th class="black03">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Gussie Hill</td>
                        <td>Entered 04 Dec 2021</td>
                    </tr>
                     <tr>
                        <td>Brent Mack</td>
                        <td>Entered 08 Dec 2021</td>
                    </tr>
                     <tr>
                        <td>Unknown</td>
                        <td>Pending</td>
                    </tr>
                     <tr>
                        <td>Unknown</td>
                        <td>Pending</td>
                    </tr>
                     <tr>
                        <td>Abbie Bryant</td>
                        <td>Entered 07 Nov 2021</td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>
</div>

<?php
get_footer();
