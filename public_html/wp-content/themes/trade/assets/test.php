<?php
// проверка на спам - просто прерываем выполнение кода, при желании можно и сообщение спамерам вывести
// if( isset( $_POST['comment'] ) || isset( $_POST['message'] ) )
//     exit;
 $ulr_new = bloginfo('url') . '/wp-login.php?action=register&ref=' . $_POST['referal_code']; 


// подключаем WP, можно конечно обойтись без этого, но зачем?
require( dirname(__FILE__) . '/wp-load.php');
 
// следующий шаг - проверка на обязательные поля, у нас это емайл, имя и сообщение
if( isset( $_POST['new_name'] )&& isset( $_POST['new_email'] ) && isset( $_POST['referal_code'] )  ) {
 
    // $headers = array(
    //     "Content-type: text/html; charset=utf-8",
    //     "From: " . $_POST['name'] . " <" . $_POST['email'] . ">"
    // );
 
    // if( wp_mail( get_option('admin_email'), 'Сообщение с сайта', wpautop( $_POST['soobschenie'] ), $headers ) ) {
    //     header('Location:' . site_url('/123test_send?msg=success') );
    //     exit;


    // exit("<meta http-equiv='refresh' content='0; url= / " . bloginfo('url') . "/wp-login.php?action=register&ref=" .  $_POST['referal_code']; .">"); 

    exit("<meta http-equiv='refresh' content='0; url= / "$ulr_new">");  
    }
  
 
 
}

exit("<meta http-equiv='refresh' content='0; url= /index.php'>");         
 
// header('Location:' . site_url('/123test_send?msg=error') );
// exit;