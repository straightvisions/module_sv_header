<div class="sv_setting_subpage">
	<h2><?php _e('Menu (Mobile)', 'sv100'); ?></h2>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'menu_padding_mobile' )->run_type()->form(); ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_color_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_image_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_media_size_menu_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_position_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_size_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_fit_menu_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_repeat_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_attachment_menu_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_radius_menu_mobile' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'menu_item_margin_mobile' )->run_type()->form();
			echo $module->get_setting( 'menu_item_padding_mobile' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'font_size_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'line_height_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'text_deco_menu_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_color_menu_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_menu_mobile' )->run_type()->form();
		?>
    </div>

	<h3 class="divider"><?php _e( 'Items - Border', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_style_menu_item_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_radius_menu_item_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_color_menu_item_mobile' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_width_menu_item_mobile' )->run_type()->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_deco_menu_mobile_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_menu_mobile_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_menu_mobile_hover' )->run_type()->form();
		?>
    </div>

    <h3><?php _e('Submenu (Mobile)', 'sv100'); ?></h3>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'sub_padding_mobile' )->run_type()->form(); ?>
    </div>
    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_color_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_image_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_media_size_sub_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_position_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_size_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_fit_sub_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_repeat_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'bg_attachment_sub_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_radius_sub_mobile' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'sub_item_margin_mobile' )->run_type()->form();
			echo $module->get_setting( 'sub_item_padding_mobile' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'font_size_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'line_height_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'text_deco_sub_mobile' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_color_sub_mobile' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_sub_mobile' )->run_type()->form();
		?>
    </div>

	<h3 class="divider"><?php _e( 'Items - Border', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_style_menu_sub_item_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_radius_menu_sub_item_mobile' )->run_type()->form();
			echo $module->get_setting( 'border_color_menu_sub_item_mobile' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_width_menu_sub_item_mobile' )->run_type()->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
            echo $module->get_settings_component( 'text_deco_sub_mobile_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_sub_mobile_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_sub_mobile_hover' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Menu Icon', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'menu_icon_size' )->run_type()->form(); ?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'menu_icon_closed' )->run_type()->form();
			echo $module->get_setting( 'menu_icon_open' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'menu_icon_closed_color' )->run_type()->form();
			echo $module->get_setting( 'menu_icon_open_color' )->run_type()->form();
		?>
    </div>
</div>