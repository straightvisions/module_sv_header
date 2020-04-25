<?php
	$properties = array();
	$properties['justify-content']  = $setting->prepare_css_property_responsive($alignment);
	$properties['flex-direction']   = $setting->get_breakpoints();

	// flex direction injection
	foreach( $properties['flex-direction'] as $key => &$value){
		$value = 'row';
		if(isset($alignment[$key]) && $key === 'mobile' && $alignment[$key] === 'center'){
			$value = 'column';
		}
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar' : '.sv100_sv_header .sv100_sv_header_bar',
		$properties
	);

	// children flex setup
	$properties = array();
	$container_alignment  = $setting->prepare_css_property_responsive($alignment);
	$properties['flex']   = $setting->get_breakpoints();

	foreach( $properties['flex'] as $key => &$value){
		$value = '1 1 0';
		if(isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['center', 'spread'])){
			$value = '0 1 auto';
		}

		if($key === 'mobile' && isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['spread'])){
			//$value = '1 1 auto';
		}
	}

	$properties['margin']   = $setting->get_breakpoints();

	foreach( $properties['margin'] as $key => &$value){
		$value = '0 15px';
		if($key === 'mobile' && isset($container_alignment[$key]) && in_array($container_alignment[$key] , ['center'])){
			$value = '0';
		}
	}

	echo $setting->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *' : '.sv100_sv_header .sv100_sv_header_bar > *',
		$properties
	);