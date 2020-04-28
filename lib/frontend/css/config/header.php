<?php
	$properties					= array();

	// Background
	if($position) {
		$properties['position'] = $setting->prepare_css_property_responsive($position, '', '');
	}

	echo $setting->build_css(
		'.sv100_sv_header_wrapper',
		$properties
	);

	$properties					= array();

	if($bg_color) {
		$properties['background-color'] = $setting->prepare_css_property_responsive($bg_color, 'rgba(', ')');
	}

	if($max_width) {
		$properties['max-width'] = $setting->prepare_css_property($max_width, '', '');
	}

	// Margin
	if($margin) {
		$imploded		= false;
		foreach($margin as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : false;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : false;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : false;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : false;

			if($top !== false || $right !== false || $bottom !== false || $left !== false) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['margin'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	// Padding
	// @todo: same as margin, refactor to avoid doubled code
	if($padding) {
		$imploded		= false;
		foreach($padding as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : false;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : false;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : false;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : false;

			if($top !== false || $right !== false || $bottom !== false || $left !== false) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['padding'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	echo $setting->build_css(
		'.sv100_sv_header',
		$properties
	);