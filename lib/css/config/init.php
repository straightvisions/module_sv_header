<?php
	require( $module->get_path( 'lib/css/config/general.php' ) );

	// require container css
	require( $module->get_path( 'lib/css/config/header_bar.php' ) );

	// require inner css
	if( $module->get_module('sv_branding') && $module->get_module('sv_branding')->get_setting( 'active' )->get_data() ){
		require( $module->get_path( 'lib/css/config/branding.php' ) );
	}
	if( $module->get_module('sv_header_menu') && $module->get_module('sv_header_menu')->get_setting( 'active' )->get_data() ){
		require( $module->get_path( 'lib/css/config/navigation.php' ) );
	}

	if( in_array('1', $module->get_setting( 'sidebar_active' )->get_data())
		&& $module->get_root()->get_module( 'sv_sidebar' )
		&& $module->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $module->get_module_name().'_sidebar', ) )
	){
		require( $module->get_path( 'lib/css/config/sidebar.php' ) );
	}