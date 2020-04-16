<?php
	$properties					= array();

	// Background
	if($position) {
		$properties['position'] = $setting->prepare_css_property_responsive($position, '', '');
	}

	if($bg_color) {
		$properties['background-color'] = $setting->prepare_css_property_responsive($bg_color, 'rgba(', ')');
	}

	echo $setting->build_css(
		'.sv100_sv_header',
		$properties
	);

	$properties					= array();

	// Margin
	if($margin) {
		$imploded		= false;
		foreach($margin as $breakpoint => $val) {
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : 0;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : 0;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : 0;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : 0;

			if($top+$right+$bottom+$left!==0) {
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
			$top = (isset($val['top']) && strlen($val['top']) > 0) ? $val['top'] : 0;
			$right = (isset($val['right']) && strlen($val['right']) > 0) ? $val['right'] : 0;
			$bottom = (isset($val['bottom']) && strlen($val['bottom']) > 0) ? $val['bottom'] : 0;
			$left = (isset($val['left']) && strlen($val['left']) > 0) ? $val['left'] : 0;

			if($top+$right+$bottom+$left!==0) {
				$imploded[$breakpoint] = $top . ' ' . $right . ' ' . $bottom . ' ' . $left;
			}
		}
		if($imploded) {
			$properties['padding'] = $setting->prepare_css_property_responsive($imploded, '', '');
		}
	}

	echo $setting->build_css(
		'.sv100_sv_header_bar',
		$properties
	);