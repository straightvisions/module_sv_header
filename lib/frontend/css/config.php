<?php
	// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
	// This reduces the lines of code for the needed setting values.
	foreach ( $script->get_parent()->get_settings() as $setting ) {
		${ $setting->get_ID() } = $setting->get_data();

		// If setting is color, it gets the value in the RGB-Format
		if ( $setting->get_type() === 'setting_color' ) {
			${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
		}
	}

	// Font Vars
	// Header (General)
	$font = $font_family
		? $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family )
		: false;

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
	require_once( $script->get_parent()->get_path( 'lib/frontend/css/config/order.php' ) );
	require_once( $script->get_parent()->get_path( 'lib/frontend/css/config/sidebar.php' ) );
