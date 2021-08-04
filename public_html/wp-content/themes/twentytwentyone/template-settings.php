<?php
/*
Template Name: Settings
Template Post Type: post, page, product
 */

get_header();
$current_user_id = get_current_user_id();
?>
<!-- <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script> -->

<br>
<div class="signals">

   <br>
</div>
<div class="settings">
    <div class="setting_sidebar">
        <h5>Settings</h5>
        <hr style="width: 90%;margin: 30px auto;">
       
    <?php 

    wp_nav_menu( [
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
] );

     ?>


    </div>
    <div class="setting_field">
        <div class="login_popup_form" id="login_popup_form">
            <div id="result_email-pass"></div>
            <h4>Change Name & Email</h4>
            <!-- <form action="<?php bloginfo( 'url' ) ?>/assets/set_new_password.php" method="post"> -->
            <form id="change_email-pass" method="post">
                <label>Email</label>
                <input name="new_email" type="email" placeholder="Enter your email...">
                <label>Password</label>
                <input name="new_pass" type="password" placeholder="Enter your password...">

                <input  type="hidden" name="current_user-id" value="<?php echo $current_user->ID ?>" /> 

                <div class="login_popup_form_btn">
                    <button name="submit" type="button" id="change_email-pass_btn" class="btn btn-nav-menu" onclick="send_new_info_user()">SAVE CHANGES</button>
                </div>
            </form>
        </div>
        <!-- <?php var_dump( $current_user->ID) ?> -->
        

      

    

         <hr>

         <div class="login_popup_form" id="login_popup_form">
               <div id="result_pass"></div>
            <h4>Change your password</h4>
            <form  method="post" id="change_pass">
                <label>Old password</label>
                <input name="old_pass" type="password" placeholder="Enter old password…">
                <label>New password</label>
                <input name="new_pass" type="password" placeholder="Enter new password…">

                <input type="hidden" name="current_user-id" value="$current_user->ID" /> 
                <input type="hidden" name="testcookie" value="1" />


                <div class="login_popup_form_btn">
                    <button  name="submit" type="button" class="btn btn-nav-menu" id="change_pass_btn">SAVE CHANGES</button>
                </div>
            </form>
        </div>
        <hr>

        <div class="login_popup_form" id="login_popup_form" style="margin-bottom: 30px;">
            <h4 >Close Account</h4>
        
                        <div class="delete_acc">
                            <div class="black03" >Delete your account and account data</div>
                            <?php echo do_shortcode( '[plugin_delete_me]<span style="color:red;">Admin can`t delete account</span>[/plugin_delete_me]' ); ?>
                        </div>

                   
           
        </div>

    </div>
</div>

<script type="text/javascript" src="<?php echo get_template_directory_uri() ?>/js/send_user_info.js"></script>

<!-- вывод инфы из бд -->
<!-- <?php 
   $user_id = $current_user->ID;
   $results = $wpdb->get_results($wpdb->prepare("SELECT * from $wpdb->users WHERE ID = $user_id", $id));
   // var_dump($results); 
   // print_r($result_search_user['0']['user_login']);
   foreach ($results as $result ) {
     echo $result->user_pass;
   }
   $user_info = get_userdata($user_id);

    echo 'Имя пользователя: ' . $user_info->user_login . "\n";
    echo 'ID: ' . $user_info->ID . "\n";

 ?> -->


            <!-- форма смены логина и пароля без плагина Old -->

            <!-- <div id="result_username"></div>
            <form method="POST" id="update_user_info">
                <table class="form-table">
                <tr class="user-user-login-wrap">
                    <th><label for="olduser_login"><?php _e('Old Username','easy_username_updater') ?></label></th>
                    <td><strong><?php echo $result->user_login; ?></strong></td>
                </tr>

                <tr class="user-user-login-wrap">
                    <th><label for="olduser_email"><?php _e('Old Email','easy_email_updater') ?></label></th>
                    <td><strong><?php echo $result->user_email; ?></strong></td>
                </tr>

                <tr class="user-user-login-wrap">
                    <th><label for="user_login"><?php _e('New Username','easy_username_updater') ?></label></th>
                    <td><input type="text" name="new_user_login" class="regular-text" id="user_login" value=""/></td>
                </tr>
                </table>
                <input type="submit" name="button" id="change_username_btn" class="button button-primary" value="Update Username">
            </form> -->




<!-- <button onclick="<?php

function()
    {
        $wpdb->update( 
        'wp_users', 
        [ 'ID' => 2 , 'user_nicename'=>'new_login_user' ], 
        [ 'ID' => 2 ], 
        [ '%s', '%d' ],
        [ '%d' ] 
        );
    }
?>">click update</button> -->






<!-- <?php 

     $wpdb->update(
                    $wpdb->users, //table
                    array('user_login' => $name, 'display_name'=> $name), //data
                    array('id' => $id), //where
                    array('%s', '%s'), //data format
                    array('%d') //where format
                 );

 ?> -->


<?php
get_footer();
