<div class="input-group">
					<span class="input-group-button">
	<button id="copy-btn" class="btn btn-nav-menu" data-clipboard-text="<?php /** @var WP_Refer_Code $ref_code */
echo esc_url($ref_code->get_ref_link())?>">COPY TO CLIPBOARD
        <!-- <img src="<?php esc_attr_e(plugins_url('', __FILE__).'/copy.png')?>"> -->
	</button>

	</span>
    <div class="tooltip"><span class="tooltiptext"><?php _e('Tooltip text', 'wp-referral-code');?></span>
        <input id="ref_link" readonly type="text" value="<?php /** @var WP_Refer_Code $ref_code */
echo esc_url($ref_code->get_ref_link())?>"></div>

</div>
