<div class="sv_setting_subpage">
	<h2><?php _e('Branding', 'sv100'); ?></h2>

    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'branding' )->run_type()->form();
		echo $module->get_setting( 'branding_title' )->run_type()->form();
        echo $module->get_setting( 'branding_order' )->run_type()->form();
		?>
    </div>
	<?php if ( get_custom_logo() ) { ?>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'branding_logo_width' )->run_type()->form();
			echo $module->get_setting( 'branding_logo_height' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'branding_logo_width_mobile' )->run_type()->form();
			echo $module->get_setting( 'branding_logo_height_mobile' )->run_type()->form();
		?>
	</div>
	<?php } ?>
</div>