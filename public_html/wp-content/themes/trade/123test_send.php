<?php
/* 
 Template name: Форма обратной связи
 Template Post Type: post, page, product
 */
get_header(); 
?>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> -->

	<div id="message_r"></div>
	<form method="post" id="test_send_form"> 
	<!-- <form action="<?php echo site_url() ?>/test.php" method="POST"> -->
		<input type="text" name="new_name" required="true" placeholder="Имя *" />
		<input type="text" name="new_email" required="true" placeholder="Email *" />
		<input type="text" name="referal_code" required="true" placeholder="Referal code" />
		<button name="submit" type="button" id="test_send_form_btn" class="btn btn-nav-menu">SAVE CHANGES</button>
	</form>
	<p><?php echo get_template_directory_uri()?>/assets/test.php</p>


<?php

get_footer();