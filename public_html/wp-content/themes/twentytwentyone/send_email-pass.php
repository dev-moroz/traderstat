<?php

 $wpdb->update( 'wp_users', ['user_nicename'=>$_POST['new_user_login']], [ 'ID' => 2 ], [ '%s', '%d' ],[ '%d' ] );

//  $user_fields = [ 
// 'ID' => $current_user->ID, , 
// 'user_email' => esc_attr($_POST['new_email']), 
// 'user_pass' => esc_attr($_POST['new_pass']),
// ]; 

// wp_update_user($user_fields) ;


// if( !empty($_POST['new_email']) ){
// 	update_user_meta( 2, 'user_email', esc_attr($_POST['new_email']) )
// }


// if( !empty($_POST['new_email']) ){
// 	wp_update_user( 2, 'user_email', esc_attr($_POST['new_email']) )
// }


// $user_id = 2;
// $user_email = $_POST['new_email']; 
// $user_pass = md5($_POST['new_pass']);
// $user_nicename = 'lol';
// $id = $current_user->ID;
// $id = $_POST['current_user-id']);
// $id = $current_user->ID;
// echo "Пользователь c email - ".$user_email." pass - ".$user_pass." добавлен, id "; // выводим текстовое содержимое (значение вышесозданных переменных)

// $user_fields = [ 
// 'ID' => $current_user->ID,
// 'user_email' => $_POST['new_email'], 
// 'user_pass' => $_POST['new_pass'],
// ]; 


// wp_update_user([ 
// 'ID' 			=> $user_id,
// // 'user_email'	=> $user_email, 
// // 'user_pass' 	=> $user_pass,
// 'nickname' => $user_nicename,
// ]) ;



// $wpdb->update( 'wp_users', [ 'user_email'=> $user_email ];  ], [ 'ID' => 2, ] );

// $user_fields = [ 
// // 'ID' => $current_user->ID, 
// 'ID' => 2, 
// 'user_email' => esc_attr($_POST['new_email']), 
// ]; 
// wp_update_user($user_fields) ;

?>



<?php 


 // $user_fields = [ 
// 'ID' => $current_user->ID, 
// 'nickname' => esc_attr($_POST['nickname']), 
// 'first_name' => esc_attr($_POST['first_name']), 
// 'last_name' => esc_attr($_POST['last_name']), 
// 'display_name' => esc_attr($_POST['display_name']), 
// 'user_email' => $_POST['new_email'], 
// 'user_pass' => $_POST['new_pass'],
// 'user_url' => esc_attr($_POST['url']), 
// 'twitter' => esc_attr($_POST['twitter']), 
// 'facebook' => esc_attr($_POST['facebook']), 
// 'description' => esc_attr($_POST['description']), 
// 'dCity' => esc_attr($_POST['dCity']) 
// ]; 

// wp_update_user($user_fields) ;





// $user_fields = [ 
// 'ID' => $current_user->ID, 
// 'nickname' => esc_attr($_POST['nickname']), 
// 'first_name' => esc_attr($_POST['first_name']), 
// 'last_name' => esc_attr($_POST['last_name']), 
// 'display_name' => esc_attr($_POST['display_name']), 
// 'user_email' => esc_attr($_POST['email']), 'user_url' => esc_attr($_POST['url']), 
// 'twitter' => esc_attr($_POST['twitter']), 
// 'facebook' => esc_attr($_POST['facebook']), 
// 'description' => esc_attr($_POST['description']) ]; 
// wp_update_user($user_fields); 
// update_user_meta( $current_user->ID, 'dCity', $_POST['dCity'] );

 ?>