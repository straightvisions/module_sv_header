<div class="sv_setting_subpage">
	<h2><?php _e('Header', 'sv100'); ?></h2>

    <h3 class="divider"><?php _e( 'Position & Alignment (Desktop)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		    echo $module->get_setting( 'position' )->run_type()->form();
		    echo $module->get_setting( 'box_content_alignment' )->run_type()->form();
			echo $module->get_setting( 'box_margin_top' )->run_type()->form();
			echo $module->get_setting( 'box_margin_bottom' )->run_type()->form();
		?>
    </div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'header_padding' )->run_type()->form();
		?>
	</div>

	<h3 class="divider"><?php _e( 'Position & Alignment (Mobile)', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'position_mobile' )->run_type()->form();
			echo $module->get_setting( 'box_content_alignment_mobile' )->run_type()->form();
			echo $module->get_setting( 'box_margin_top_mobile' )->run_type()->form();
			echo $module->get_setting( 'box_margin_bottom_mobile' )->run_type()->form();
		?>
	</div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'header_padding_mobile' )->run_type()->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Fonts & Colors', 'sv100' ); ?></h3>
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

    <h3 class="divider"><?php _e( 'Box Shadow', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'box_shadow_color' )->run_type()->form();
		?>
    </div>
</div>