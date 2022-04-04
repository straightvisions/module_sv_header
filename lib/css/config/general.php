<?php

	// if position is absolute or fixed, header must have spacing to top for wp-admin-bar
	$properties = array();
	$container_alignment  = $_s->prepare_css_property_responsive($module->get_setting('position')->get_data());
	$properties['top']   = $_s->get_breakpoints();

	foreach( $properties['top'] as $key => &$value){
		$value = '0';

		if(isset($container_alignment[$key])) {
			if ($container_alignment[$key] == 'absolute' || $container_alignment[$key] == 'fixed') {
				if ($key === 'mobile') {
					$value = '46px';
				} else {
					$value = '32px';
				}
			}
		}
	}

	echo $_s->build_css(
		'.admin-bar .sv100_sv_header_wrapper',
		$properties
	);

	// if position is sticky, header must have top = 0
	$properties = array();
	$container_alignment  = $_s->prepare_css_property_responsive($module->get_setting('position')->get_data());
	$properties['top']   = $_s->get_breakpoints();

	foreach( $properties['top'] as $key => &$value){
		$value = '';

		if(isset($container_alignment[$key])) {
			if ($container_alignment[$key] == 'sticky' || $container_alignment[$key] == 'absolute') {
				$value = '0';
			}
		}
	}

	echo $_s->build_css(
		'.sv100_sv_header_wrapper',
		array_merge(
			$properties,
			$module->get_setting('position')->get_css_data('position'),
			$module->get_setting('bg_color')->get_css_data('background-color'),
			$module->get_setting('max_width_wrapper')->get_css_data('max-width')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header',
		array_merge(
			$module->get_setting('max_width')->get_css_data('max-width')
		)
	);