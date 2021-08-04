<?php
if ( ! defined( 'ABSPATH' ) ) {
	die();
}
//shortcode for showing referral system realated data
function wp_referral_code_user_param_shortcodes_init() {
	function wp_referral_code_user_param( $atts = [] ) {

		//nothing for not logged in users
		if ( ! is_user_logged_in() ) {
			return '';
		}
		//analyze shortcode parameters
		$para     = $atts['var'];
		$user_id  = get_current_user_id();
		$ref_code = new WP_Refer_Code( $user_id );

		switch ( $para ) {
			case 'ref_code'://[wp-referral-code var="ref_code"]
				return $ref_code->get_ref_code();
				break;
			case 'ref_link'://[wp-referral-code var="ref_link"]
				return $ref_code->get_ref_link();
				break;
			case 'invited_count'://[wp-referral-code var="invited_count"]
				return empty( $ref_code->get_invited_users_id() ) ? '0' : count( $ref_code->get_invited_users_id() );
				break;
			case 'invited_list': // [wp-referral-code var="invited_list"]
				$invited_users = $ref_code->get_invited_users_id();
				ob_start();
				require WP_REFERRAL_CODE_PATH . 'public/partials/invited-list.php';

				return ob_get_clean();
			case 'copy_ref_link'://[wp-referral-code var="copy_ref_link"]

				if ( ! wp_script_is( 'jquery', 'enqueued' ) ) {
					//Enqueue jquery only if not enqueued before
					wp_enqueue_script( 'jquery' );
				}
				if ( ! wp_script_is( 'clipboard', 'enqueued' ) ) {
					//Enqueue clipboard only if not enqueued before
					wp_enqueue_script( 'clipboard' );
				}
				wp_enqueue_script( 'wrc-copy-ref-link', plugin_dir_url( __FILE__ ) . 'js/wp-referral-code-public.js', array(), '1.0.0', true );
				wp_enqueue_style( 'wrc-copy-ref-link-styles', plugin_dir_url( __FILE__ ) . 'css/wp-referral-code-copy-link.css', array(), '1.0.0' );
				ob_start();
				require WP_REFERRAL_CODE_PATH . 'public/partials/copy_ref_link_box.php';
				return ob_get_clean();
				break;
		}

//        [wp-referral-code var="valid_invited_count"]
		return '';

	}
	add_shortcode( 'wp-referral-code', 'wp_referral_code_user_param' );
}

add_action( 'init', 'wp_referral_code_user_param_shortcodes_init' );
