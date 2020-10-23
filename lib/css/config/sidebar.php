<?php
	$properties = array();

	$sidebar_active		= $module->get_setting('sidebar_active')->get_data();
	if(empty($sidebar_active) === false) {
		$sidebar_display = array_map(function ($val) {
			return $val ? 'flex' : 'none';
		}, $sidebar_active);

		$properties['display'] = $_s->prepare_css_property_responsive($sidebar_display, '', '');
	}

	echo $_s->build_css(
		'.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_sidebar',
		array_merge(
			$properties,
			$module->get_setting('sidebar_max_width')->get_css_data('max-width'),
			$module->get_setting('sidebar_alignment')->get_css_data('justify-content'),
			$module->get_setting('sidebar_order')->get_css_data('order')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header .sv100_sv_header_bar > .sv100_sv_header_sidebar .sv100_sv_sidebar_sv_header_sidebar',
		array_merge(
			$properties,
			$module->get_setting('sidebar_margin')->get_css_data(),
			$module->get_setting('sidebar_padding')->get_css_data('padding')
		)
	);