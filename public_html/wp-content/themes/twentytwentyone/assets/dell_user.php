<?php 

$user_id = wp_get_current_user()->ID;
$user_id2 = $_POST['current_user-id'];

// wp_delete_user($user_id);
wp_delete_user($user_id2);

 ?>



 <?php
//add_action( 'admin_print_scripts', 'my_action_javascript' ); // такое подключение будет работать не всегда
add_action( 'admin_print_footer_scripts', 'my_action_javascript', 99 );
function my_action_javascript() {
	?>
	<script>
	jQuery(document).ready( function( $ ){
		var data = {
			action: 'my_action',
			whatever: 1234
		};

		// с версии 2.8 'ajaxurl' всегда определен в админке
		jQuery.post( ajaxurl, data, function( response ){
			alert( 'Получено с сервера: ' + response );
		} );
	} );
	</script>
	<?php
}
?>



<!-- создаем переменную ajax -->

<?php  

	add_action( 'wp_ajax_(action)', 'my_action_callback' );


add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){

	// Первый параметр 'twentyfifteen-script' означает, что код будет прикреплен к скрипту с ID 'twentyfifteen-script'
	// 'twentyfifteen-script' должен быть добавлен в очередь на вывод, иначе WP не поймет куда вставлять код локализации
	// Заметка: обычно этот код нужно добавлять в functions.php в том месте где подключаются скрипты, после указанного скрипта
	wp_localize_script( 'jquery2', 'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);

}

 ?>



 <?php

add_action( 'wp_enqueue_scripts', 'myajax_data', 99 );
function myajax_data(){

	wp_localize_script( 'jquery2', 'myajax',
		array(
			'url' => admin_url('admin-ajax.php')
		)
	);

}

add_action( 'wp_footer', 'my_action_javascript', 99 ); // для фронта
function my_action_javascript() {
	?>
	<script type="text/javascript" >
	jQuery(document).ready(function($) {
		var data = {
			action: 'my_action',
			whatever: 1234
		};

		// 'ajaxurl' не определена во фронте, поэтому мы добавили её аналог с помощью wp_localize_script()
		jQuery.post( myajax.url, data, function(response) {

			// $user_id = wp_get_current_user()->ID;
			// $user_id2 = $_POST['current_user-id'];

			// // wp_delete_user($user_id);
			// wp_delete_user($user_id2);
		});
	});
	</script>
	<?php
}

add_action( 'wp_ajax_my_action', 'my_action_callback' );
function my_action_callback() {
	
	$user_id = wp_get_current_user()->ID;
	$user_id2 = $_POST['current_user-id'];

	// wp_delete_user($user_id);
	wp_delete_user($user_id2);

	// выход нужен для того, чтобы в ответе не было ничего лишнего, только то что возвращает функция
	wp_die();
}