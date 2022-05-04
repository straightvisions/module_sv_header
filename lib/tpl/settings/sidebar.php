<div class="sv_setting_subpage">
	<h2><?php _e('Sidebar', 'sv100'); ?></h2>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'sidebar' )->form();
			echo $module->get_setting( 'sidebar_active' )->form();
			echo $module->get_setting( 'sidebar_max_width' )->form();
		?>
	</div>
	<h3 class="divider"><?php _e( 'Spacing', 'sv100' ); ?></h3>
	<div class="sv_setting_flex">
		<?php
			echo $module->get_setting( 'sidebar_margin' )->form();
			echo $module->get_setting( 'sidebar_padding' )->form();
		?>
	</div>
</div>