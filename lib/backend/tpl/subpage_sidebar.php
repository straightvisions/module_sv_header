<div class="sv_setting_subpage">
	<h2><?php _e('Sidebar', 'sv100'); ?></h2>
    <div class="sv_setting_flex">
        <?php
			echo $module->get_setting( 'sidebar_active' )->form();
			echo $module->get_setting( 'sidebar_max_width' )->form();
        ?>
    </div>
</div>