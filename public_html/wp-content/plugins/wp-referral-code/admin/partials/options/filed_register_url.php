<input style="padding: .5em;"
       id="<?php echo esc_attr( $args['label_for'] ); ?>"
       class="large-text"
       name="wp_referral_code_options[<?php echo esc_attr( $args['label_for'] ); ?>]"
       value="<?php echo isset( $option[ $args['label_for'] ] ) ? $option[ $args['label_for'] ] : wp_registration_url(); ?>">
