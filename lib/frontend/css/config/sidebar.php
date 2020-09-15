<?php
$properties = array();
$properties['justify-content']		= $setting->prepare_css_property_responsive($sidebar_alignment);
$properties['-webkit-justify-content']		= $setting->prepare_css_property_responsive($sidebar_alignment);
$properties['order']				= $setting->prepare_css_property_responsive($sidebar_order);
$properties['-webkit-order']				= $setting->prepare_css_property_responsive($sidebar_order);

echo $setting->build_css(
	'.sv100_sv_header .sv100_sv_header_sidebar',
	array_merge(
		$properties,
		$script->get_parent()->get_setting('sidebar_max_width')->get_css_data('max-width'),
	)
);

	echo $setting->build_css(
		'.sv100_sv_header .sv100_sv_header_sidebar .sv100_sv_sidebar_sv_header_sidebar',
		array_merge(
			$properties,
			$script->get_parent()->get_setting('sidebar_margin')->get_css_data(),
			$script->get_parent()->get_setting('sidebar_padding')->get_css_data('padding')
		)
	);