<?php
$properties = array();
$properties['justify-content']	= $setting->prepare_css_property_responsive($navigation_alignment);
$properties['-webkit-justify-content']	= $setting->prepare_css_property_responsive($navigation_alignment);
$properties['order'] 			= $setting->prepare_css_property_responsive($navigation_order);
$properties['-webkit-order'] 			= $setting->prepare_css_property_responsive($navigation_order);

echo $setting->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_navigation_container, .editor-styles-wrapper .sv100_sv_header .sv100_sv_navigation_container' : '.sv100_sv_header .sv100_sv_navigation_container',
	$properties
);