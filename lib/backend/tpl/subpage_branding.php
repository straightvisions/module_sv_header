<div class="sv_setting_subpage">
	<h2><?php _e('Branding', 'sv100'); ?></h2>

    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'branding' )->form();
		echo $module->get_setting( 'branding_title' )->form();
        echo $module->get_setting( 'branding_order' )->form();
		?>
    </div>
	<?php if ( get_custom_logo() ) { ?>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'branding_logo_width' )->form();
			echo $module->get_setting( 'branding_logo_height' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'branding_logo_width_mobile' )->form();
			echo $module->get_setting( 'branding_logo_height_mobile' )->form();
		?>
	</div>
	<?php } ?>
</div>