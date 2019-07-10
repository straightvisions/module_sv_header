<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>

		<h3 class="divider"><?php _e( 'Header Text Settings', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_settings_component( 'font_family' )->run_type()->form();
				echo $module->get_settings_component( 'font_size' )->run_type()->form();
				echo $module->get_settings_component( 'text_color' )->run_type()->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Header Background Settings', 'sv100' ); ?></h3>
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

		<h3 class="divider"><?php _e( 'Submenu Background Settings', 'sv100' ); ?></h3>
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
		
		<h3 class="divider"><?php _e( 'Submenu Item Settings', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_settings_component( 'font_size_sub' )->run_type()->form();
				echo $module->get_settings_component( 'text_deco_sub' )->run_type()->form();
				echo $module->get_settings_component( 'text_color_sub' )->run_type()->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_settings()['text_bg_active_sub']->run_type()->form();
				echo $module->get_settings_component( 'text_bg_color_sub' )->run_type()->form();
			?>
		</div>

		<h3 class="divider"><?php _e( 'Submenu Item Settings (Hover/Focus)', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_settings_component( 'text_deco_sub_hover' )->run_type()->form();
				echo $module->get_settings_component( 'text_color_sub_hover' )->run_type()->form();
				echo $module->get_settings()['text_bg_active_sub_hover']->run_type()->form();
				echo $module->get_settings_component( 'text_bg_color_sub_hover' )->run_type()->form();
			?>
		</div>
		
		<?php
	}
?>