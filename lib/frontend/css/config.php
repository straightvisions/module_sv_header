<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();
	}

	// Columns
	$columns_count = 0;
	$columns_count += $script->get_parent()->get_module('sv_branding')->get_setting( 'active' )->get_data() ? 1 : 0;
	$columns_count += $script->get_parent()->get_module('sv_header_menu')->get_setting( 'active' )->get_data() ? 1 : 0;
	$columns_count += $script->get_parent()->get_setting( 'sidebar_active' )->get_data() == 1
	&& $script->get_parent()->get_root()->get_module( 'sv_sidebar' )
	&& empty(
	$script->get_parent()->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $script->get_parent()->get_module_name().'_sidebar', ) )
	) === false ? 1 : 0;

	if($columns_count > 0 && $columns_count <= 3){ // 3 test to prevent error
		include( $script->get_parent()->get_path( 'lib/frontend/css/config/columns_'.$columns_count.'.php' ) );
	}

	// Configs
	require_once( $script->get_parent()->get_path( 'lib/frontend/css/config/header.php' ) );
	require_once( $script->get_parent()->get_path( 'lib/frontend/css/config/sidebar.php' ) );

?>
.sv100_sv_header .sv100_sv_header_branding{
order: <?php echo $branding_order; ?>;
}
.sv100_sv_header .sv100_sv_navigation_container{
order: <?php echo $navigation_order; ?>;
}
.sv100_sv_header .sv100_sv_header_sidebar{
order: <?php echo $sidebar_order; ?>;
}
