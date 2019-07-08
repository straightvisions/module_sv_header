<?php
	if ( current_user_can( 'activate_plugins' ) ) {
		?>
		<div class="sv_section_description"><?php echo $module->get_section_desc(); ?></div>
  
		<?php
		include($module->get_root()->get_path('core_theme/lib/backend/tpl/settings_draft_font.php'));
		include($module->get_root()->get_path('core_theme/lib/backend/tpl/settings_draft_background.php'));
		?>
		<?php
	}