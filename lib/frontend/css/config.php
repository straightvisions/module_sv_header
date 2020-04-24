<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();
	}

    include( $script->get_parent()->get_path( 'lib/frontend/css/config/header.php' ) );

    // include container css
    include( $script->get_parent()->get_path( 'lib/frontend/css/config/header_bar.php' ) );

    // include inner css
    if( $script->get_parent()->get_module('sv_branding')->get_setting( 'active' )->get_data() ){
		include( $script->get_parent()->get_path( 'lib/frontend/css/config/branding.php' ) );
    }
    if( $script->get_parent()->get_module('sv_header_menu')->get_setting( 'active' )->get_data() ){
        include( $script->get_parent()->get_path( 'lib/frontend/css/config/navigation.php' ) );
    }

    if( in_array('1', $script->get_parent()->get_setting( 'sidebar_active' )->get_data())
    && $script->get_parent()->get_root()->get_module( 'sv_sidebar' )
    && $script->get_parent()->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $script->get_parent()->get_module_name().'_sidebar', ) )
    ){
        include( $script->get_parent()->get_path( 'lib/frontend/css/config/sidebar.php' ) );
    }
