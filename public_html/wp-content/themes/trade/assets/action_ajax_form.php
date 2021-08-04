<?php

// user_email
// user_pass
// password
// user_login
// referal_code

// if (isset($_POST["name"]) && isset($_POST["phonenumber"]) ) { 
if (isset($_POST["user_email"]) && isset($_POST["user_pass"]) && isset($_POST["user_login"]) ) { 

	// Формируем массив для JSON ответа
    // $result = array(
    // 	'name' => $_POST["name"],
    // 	'phonenumber' => $_POST["phonenumber"],
    // 	'url_ref' => 'http://cf52359-wordpress.tw1.ru/wp-login.php?action=register&ref=',
    // 	'referal_code' => $_POST["referal_code"],
    // ); 

     $result = array(
    	'user_email' => $_POST["user_email"],
    	'user_pass' => $_POST["user_pass"],
    	'user_login' => $_POST["user_login"],
    	'url_ref' => 'http://cf52359-wordpress.tw1.ru/wp-login.php?action=register&ref=',
    	'referal_code' => $_POST["referal_code"],
    ); 

    // Переводим массив в JSON
    echo json_encode($result); 
}

?>