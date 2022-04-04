<?php if ( current_user_can( 'activate_plugins' ) ) { ?>
	<div class="sv_setting_subpage">
		<h2><?php _e('General', 'sv100'); ?></h2>
		<h3 class="divider"><?php _e( 'Subareas', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'branding_order' )->form();
				echo $module->get_setting( 'navigation_order' )->form();
				echo $module->get_setting( 'sidebar_order' )->form();
			?>
		</div>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'branding_alignment' )->form();
				echo $module->get_setting( 'navigation_alignment' )->form();
				echo $module->get_setting( 'sidebar_alignment' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Width', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'max_width_wrapper' )->form();
				echo $module->get_setting( 'max_width' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Position & Alignment', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'position' )->form();
				echo $module->get_setting( 'alignment' )->form();
				echo $module->get_setting( 'direction' )->form();
			?>
		</div>
		<h3 class="divider"><?php _e( 'Colors', 'sv100' ); ?></h3>
		<div class="sv_setting_flex">
			<?php
				echo $module->get_setting( 'bg_color' )->form();
			?>
		</div>
	</div>
<?php } ?>