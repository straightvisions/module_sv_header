<?php
$properties = array();
$properties['justify-content'] 	= $setting->prepare_css_property_responsive($branding_alignment);
$properties['order'] 			= $setting->prepare_css_property_responsive($branding_order);

echo $setting->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_branding, .editor-styles-wrapper .sv100_sv_header .sv100_sv_branding' : '.sv100_sv_header .sv100_sv_branding',
	$properties
);
