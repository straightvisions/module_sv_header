<?php
$properties = array();
$properties['justify-content']  = $setting->prepare_css_property_responsive($sidebar_alignment);
$properties['order'] 			= $setting->prepare_css_property_responsive($sidebar_order);

echo $setting->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_sidebar, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_sidebar' : '.sv100_sv_header .sv100_sv_header_sidebar',
	$properties
);

