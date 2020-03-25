<div class="sv_setting_subpage">
	<h2><?php _e('Menu (Desktop)', 'sv100'); ?></h2>

    <div class="sv_setting_flex">
        <?php
            echo $module->get_setting( 'navigation_active' )->form();
            echo $module->get_setting( 'navigation_order' )->form();
        ?>
    </div>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'menu_padding' )->form(); ?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_color_menu' )->form();
			echo $module->get_setting( 'bg_image_menu' )->form();
			echo $module->get_setting( 'bg_media_size_menu' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_position_menu' )->form();
			echo $module->get_setting( 'bg_size_menu' )->form();
			echo $module->get_setting( 'bg_fit_menu' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_repeat_menu' )->form();
			echo $module->get_setting( 'bg_attachment_menu' )->form();
			echo $module->get_setting( 'border_radius_menu' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'menu_item_margin' )->form();
            echo $module->get_setting( 'menu_item_padding' )->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'font_family_menu' )->form();
			echo $module->get_setting( 'font_size_menu' )->form();
			echo $module->get_setting( 'line_height_menu' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'text_deco_menu' )->form();
			echo $module->get_setting( 'text_color_menu' )->form();
			echo $module->get_setting( 'text_bg_color_menu' )->form();
			echo $module->get_setting( 'border_radius_menu_item' )->form();
		?>
    </div>

	<h3 class="divider"><?php _e( 'Items - Border', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_style_menu_item' )->form();
			echo $module->get_setting( 'border_radius_menu_item' )->form();
			echo $module->get_setting( 'border_color_menu_item' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_width_menu_item' )->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'text_deco_menu_hover' )->form();
			echo $module->get_setting( 'text_color_menu_hover' )->form();
			echo $module->get_setting( 'text_bg_color_menu_hover' )->form();
		?>
    </div>

    <h3><?php _e('Submenu (Desktop)', 'sv100'); ?></h3>

    <h3 class="divider"><?php _e( 'Padding', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php echo $module->get_setting( 'sub_padding' )->form(); ?>
    </div>
    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_color_sub' )->form();
			echo $module->get_setting( 'bg_image_sub' )->form();
			echo $module->get_setting( 'bg_media_size_sub' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_position_sub' )->form();
			echo $module->get_setting( 'bg_size_sub' )->form();
			echo $module->get_setting( 'bg_fit_sub' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'bg_repeat_sub' )->form();
			echo $module->get_setting( 'bg_attachment_sub' )->form();
			echo $module->get_setting( 'border_radius_sub' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Spacing', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'sub_item_margin' )->form();
			echo $module->get_setting( 'sub_item_padding' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'font_family_sub' )->form();
			echo $module->get_setting( 'font_size_sub' )->form();
			echo $module->get_setting( 'line_height_sub' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'text_deco_sub' )->form();
			echo $module->get_setting( 'text_color_sub' )->form();
			echo $module->get_setting( 'text_bg_color_sub' )->form();
		?>
    </div>

	<h3 class="divider"><?php _e( 'Items - Border', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_style_menu_sub_item' )->form();
			echo $module->get_setting( 'border_radius_menu_sub_item' )->form();
			echo $module->get_setting( 'border_color_menu_sub_item' )->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'border_width_menu_sub_item' )->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Items - Fonts & Colors (Hover/Focus)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'text_deco_sub_hover' )->form();
			echo $module->get_setting( 'text_color_sub_hover' )->form();
			echo $module->get_setting( 'text_bg_color_sub_hover' )->form();
		?>
    </div>
</div>