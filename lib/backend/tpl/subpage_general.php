<div class="sv_setting_subpage">
	<h2><?php _e('General', 'sv100'); ?></h2>

    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'position' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Branding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'branding' )->run_type()->form();
		echo $module->get_setting( 'branding_title' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Text', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'font_family' )->run_type()->form();
		echo $module->get_settings_component( 'font_size' )->run_type()->form();
		echo $module->get_settings_component( 'text_color' )->run_type()->form();
		echo $module->get_settings_component( 'highlight_color' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_color' )->run_type()->form();
		echo $module->get_settings_component( 'bg_image' )->run_type()->form();
		echo $module->get_settings_component( 'bg_media_size' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_position' )->run_type()->form();
		echo $module->get_settings_component( 'bg_size' )->run_type()->form();
		echo $module->get_settings_component( 'bg_fit' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_repeat' )->run_type()->form();
		echo $module->get_settings_component( 'bg_attachment' )->run_type()->form();
		?>
    </div>
</div>