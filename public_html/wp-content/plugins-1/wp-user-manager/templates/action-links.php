<?php
/**
 * The Template for displaying the action links within forms.
 *
 * This template can be overridden by copying it to yourtheme/wpum/action-links.php
 *
 * HOWEVER, on occasion WPUM will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @version 1.0.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

if( isset( $data->scalar ) ) {
	return;
}

?>
<?php if( isset( $data->psw_link ) && $data->psw_link == 'yes' ) : ?>
	<!-- <li> -->
		<a href="<?php echo esc_url( get_permalink( wpum_get_core_page_id( 'password' ) ) );?>">
			<?php echo apply_filters( 'wpum_password_link_label', __( 'Forgot password?', 'wp-user-manager' ) ); ?>
		</a>
	<!-- </li> -->


	<?php endif; ?>
	</div>
		</form>
</div>

<ul class="wpum-action-links" style="text-align: center;">
	<?php if( isset( $data->login_link ) && $data->login_link == 'yes' ) : ?>

	<li>
		<?php echo apply_filters( 'wpum_login_link_label', sprintf( __( 'Already have an account? <a href="%s">Sign In &raquo;</a>', 'wp-user-manager' ), esc_url( get_permalink( wpum_get_core_page_id( 'login' ) ) ) ) ); ?>
	</li>
	<?php endif; ?>
	<?php if( isset( $data->register_link ) && $data->register_link == 'yes' ) : ?>
	<li>
		<?php echo apply_filters( 'wpum_registration_link_label', sprintf( __( 'No have a account? <a href="%s">Create new account</a>', 'wp-user-manager' ), esc_url( get_permalink( wpum_get_core_page_id( 'register' ) ) ) ) ); ?>
	</li>
	<?php endif; ?>
	
</ul>

