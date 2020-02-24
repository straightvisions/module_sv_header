<div class="sv_setting_subpage">
	<h2><?php _e('Menu (Desktop)', 'sv100'); ?></h2>

    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'navigation_active' )->run_type()->form();
            echo $module->get_settings_component( 'navigation_order' )->run_type()->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'menu_padding' )->run_type()->form(); ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_color_menu' )->run_type()->form();
			echo $module->get_settings_component( 'bg_image_menu' )->run_type()->form();
			echo $module->get_settings_component( 'bg_media_size_menu' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_position_menu' )->run_type()->form();
			echo $module->get_settings_component( 'bg_size_menu' )->run_type()->form();
			echo $module->get_settings_component( 'bg_fit_menu' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'bg_repeat_menu' )->run_type()->form();
			echo $module->get_settings_component( 'bg_attachment_menu' )->run_type()->form();
			echo $module->get_setting( 'border_radius_menu' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'menu_item_margin' )->run_type()->form();
            echo $module->get_setting( 'menu_item_padding' )->run_type()->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'font_family_menu' )->run_type()->form();
			echo $module->get_settings_component( 'font_size_menu' )->run_type()->form();
			echo $module->get_settings_component( 'line_height_menu' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_deco_menu' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_menu' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_menu' )->run_type()->form();
			echo $module->get_setting( 'border_radius_menu_item' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_deco_menu_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_menu_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_menu_hover' )->run_type()->form();
		?>
    </div>

    <h3><?php _e('Submenu (Desktop)', 'sv100'); ?></h3>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'sub_padding' )->run_type()->form(); ?>
    </div>
    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
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
			echo $module->get_setting( 'border_radius_sub' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'sub_item_margin' )->run_type()->form();
			echo $module->get_setting( 'sub_item_padding' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'font_family_sub' )->run_type()->form();
			echo $module->get_settings_component( 'font_size_sub' )->run_type()->form();
			echo $module->get_settings_component( 'line_height_sub' )->run_type()->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_deco_sub' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_sub' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_sub' )->run_type()->form();
			echo $module->get_setting( 'border_radius_sub_item' )->run_type()->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_settings_component( 'text_deco_sub_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_color_sub_hover' )->run_type()->form();
			echo $module->get_settings_component( 'text_bg_color_sub_hover' )->run_type()->form();
		?>
    </div>
</div>