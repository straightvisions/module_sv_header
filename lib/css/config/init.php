<?php
	require( $script->get_parent()->get_path( 'lib/css/config/general.php' ) );

	// include container css
	include( $script->get_parent()->get_path( 'lib/css/config/header_bar.php' ) );

	// include inner css
	if( $script->get_parent()->get_module('sv_branding') && $script->get_parent()->get_module('sv_branding')->get_setting( 'active' )->get_data() ){
		include( $script->get_parent()->get_path( 'lib/css/config/branding.php' ) );
	}
	if( $script->get_parent()->get_module('sv_header_menu') && $script->get_parent()->get_module('sv_header_menu')->get_setting( 'active' )->get_data() ){
		include( $script->get_parent()->get_path( 'lib/css/config/navigation.php' ) );
	}

	if( in_array('1', $script->get_parent()->get_setting( 'sidebar_active' )->get_data())
		&& $script->get_parent()->get_root()->get_module( 'sv_sidebar' )
		&& $script->get_parent()->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $script->get_parent()->get_module_name().'_sidebar', ) )
	){
		include( $script->get_parent()->get_path( 'lib/css/config/sidebar.php' ) );
	}