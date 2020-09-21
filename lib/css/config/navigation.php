<?php
$properties = array();
$properties['justify-content']	= $_s->prepare_css_property_responsive($module->get_setting('navigation_alignment')->get_data());
$properties['order'] 			= $_s->prepare_css_property_responsive($module->get_setting('navigation_order')->get_data());

echo $_s->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_navigation_container, .editor-styles-wrapper .sv100_sv_header .sv100_sv_navigation_container' : '.sv100_sv_header .sv100_sv_navigation_container',
	$properties
);