<?php

	$properties = array();

	$sidebar_active		= $module->get_setting('sidebar_active')->get_data();
	if(empty($sidebar_active) === false) {
		$sidebar_height = array_map(function ($val) {
			return $val ? 'auto' : '0';
		}, $sidebar_active);

		$properties['height'] = $_s->prepare_css_property_responsive($sidebar_height, '', '');
		$properties['width'] = $_s->prepare_css_property_responsive($sidebar_height, '', '');

		$sidebar_opacity = array_map(function ($val) {
			return $val ? '100' : '0';
		}, $sidebar_active);

		$properties['opacity'] = $_s->prepare_css_property_responsive($sidebar_opacity, '', '');

		$sidebar_overflow = array_map(function ($val) {
			return $val ? 'visible' : 'hidden';
		}, $sidebar_active);

		$properties['overflow'] = $_s->prepare_css_property_responsive($sidebar_overflow, '', '');

		$properties['order'] 			= $_s->prepare_css_property_responsive($module->get_setting('sidebar_order')->get_data());
	}

	echo $_s->build_css(
		'.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_sidebar',
		array_merge(
			$properties,
			$module->get_setting('sidebar_max_width')->get_css_data('max-width'),
			$module->get_setting('sidebar_alignment')->get_css_data('justify-content')
			
		)
	);
	
	echo $_s->build_css(
		'.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_sidebar .sv100_sv_sidebar_sv_header_sidebar',
		array_merge(
			$module->get_setting('sidebar_margin')->get_css_data(),
			$module->get_setting('sidebar_padding')->get_css_data('padding')
		)
	);