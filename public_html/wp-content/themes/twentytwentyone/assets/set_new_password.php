<?php 

// $new_pass = $_POST['new_pass'];
$password = $_POST['new_pass'];
$password = wp_hash_password( $password );
$new_email = $_POST['new_email'];
$user_id = $_POST['current_user-id'];


// function wp_set_password( $password, $user_id ) {
//     global $wpdb;
 
//     // $hash = wp_hash_password( $password );
//     $wpdb->update(
//         $wpdb->users,
//         [   'ID'                  => $user_id,
//             'user_pass'           => $password,
//         ],
//     );
 
//     clean_user_cache( $user_id );
// }


$args = array(
    'ID'         => $current_user->id,
    'user_email' => esc_attr( $_POST['new_email'] )
);
wp_update_user( $args );




// function new_pass2(){
    // $user_id = wp_update_user( [
    //     'ID'         => $user_id,
    //     'user_email' => $new_email,
    // ] );
// }


// function new3 (){
//     $user_id = 1;
//     $website = 'http://wordpress.org';
//     $user_id = wp_update_user( [
//         'ID'       => $user_id,
//         'user_url' => $website
//     ] );
// }

// UPDATE wp_users SET user_pass = MD5('newpass') WHERE user_email = 'adminko@gmail.com';

// UPDATE wp_users SET user_pass = MD5("$new_pass") WHERE user_email = "$new_email";

 ?>