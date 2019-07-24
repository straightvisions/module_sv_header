<div class="sv_setting_subpage">
	<h2><?php _e('Menu', 'sv100'); ?></h2>

    <h3 class="divider"><?php _e( 'Submenu - Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_color_sub' )->run_type()->form();
		echo $module->get_settings_component( 'bg_image_sub' )->run_type()->form();
		echo $module->get_settings_component( 'bg_media_size_sub' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_position_sub' )->run_type()->form();
		echo $module->get_settings_component( 'bg_size_sub' )->run_type()->form();
		echo $module->get_settings_component( 'bg_fit_sub' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'bg_repeat_sub' )->run_type()->form();
		echo $module->get_settings_component( 'bg_attachment_sub' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Submenu - Items', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'font_size_sub' )->run_type()->form();
		echo $module->get_settings_component( 'text_deco_sub' )->run_type()->form();
		echo $module->get_settings_component( 'text_color_sub' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting('text_bg_active_sub')->run_type()->form();
		echo $module->get_settings_component( 'text_bg_color_sub' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Submenu - Items (hover/focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_settings_component( 'text_deco_sub_hover' )->run_type()->form();
		echo $module->get_settings_component( 'text_color_sub_hover' )->run_type()->form();
		echo $module->get_setting( 'text_bg_active_sub_hover' )->run_type()->form();
		echo $module->get_settings_component( 'text_bg_color_sub_hover' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Mobile', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		echo $module->get_setting( 'bg_opacity_mobile' )->run_type()->form();
		echo $module->get_setting( 'menu_icon_closed_color' )->run_type()->form();
		echo $module->get_setting( 'menu_icon_open_color' )->run_type()->form();
		?>
    </div>
</div>