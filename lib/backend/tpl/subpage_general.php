<div class="sv_setting_subpage">
	<h2><?php _e('Header', 'sv100'); ?></h2>

	<h3 class="divider"><?php _e( 'Position Subareas', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'branding_order' )->form();
			echo $module->get_setting( 'navigation_order' )->form();
		?>
	</div>

    <h3 class="divider"><?php _e( 'Position & Alignment (Desktop)', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
		    echo $module->get_setting( 'position' )->form();
		    echo $module->get_setting( 'box_content_alignment' )->form();
			echo $module->get_setting( 'box_margin_top' )->form();
			echo $module->get_setting( 'box_margin_bottom' )->form();
		?>
    </div>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'header_padding' )->form();
		?>
	</div>
    <h3 class="divider"><?php _e( 'Fonts & Colors', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'font_family' )->form();
            echo $module->get_setting( 'font_size' )->form();
            echo $module->get_setting( 'text_color' )->form();
            echo $module->get_setting( 'highlight_color' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Background', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'bg_color' )->form();
            echo $module->get_setting( 'bg_image' )->form();
            echo $module->get_setting( 'bg_media_size' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'bg_position' )->form();
            echo $module->get_setting( 'bg_size' )->form();
            echo $module->get_setting( 'bg_fit' )->form();
		?>
    </div>
    <div class="sv_setting_flex">
		<?php
            echo $module->get_setting( 'bg_repeat' )->form();
            echo $module->get_setting( 'bg_attachment' )->form();
		?>
    </div>

    <h3 class="divider"><?php _e( 'Box Shadow', 'sv100' ); ?></h3>
    <div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'box_shadow_color' )->form();
		?>
    </div>
</div>