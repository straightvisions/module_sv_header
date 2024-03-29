<?php
	$properties = array();
	$properties['justify-content']  = $_s->prepare_css_property_responsive($module->get_setting('alignment')->get_data());
	$properties['flex-direction']   = $_s->prepare_css_property_responsive($module->get_setting( 'direction' )->get_data());

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar' : '.sv100_sv_header .sv100_sv_header_bar',
		array_merge(
			$properties
		)
	);

	// children flex setup
	$properties = array();
	$container_alignment  = $_s->prepare_css_property_responsive($module->get_setting('alignment')->get_data());
	$properties['flex']   = $_s->get_breakpoints();

	foreach( $properties['flex'] as $key => &$value){
		$value = '1 1 auto';
		if(isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['center', 'spread'])){
			$value = '0 1 auto';
		}

		if($key === 'mobile' && isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['spread'])){
			//$value = '1 1 auto';
		}
	}

	$properties['margin']   = $_s->get_breakpoints();

	foreach( $properties['margin'] as $key => &$value){
		$value = '0';
		if($key === 'mobile' && isset($container_alignment[$key]) && in_array($container_alignment[$key] , ['center'])){
			$value = '0';
		}
	}

	echo $_s->build_css(
		is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *' : '.sv100_sv_header .sv100_sv_header_bar > *',
		$properties
	);