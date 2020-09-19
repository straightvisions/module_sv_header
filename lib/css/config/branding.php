<?php
$properties = array();
$properties['justify-content'] 	= $_s->prepare_css_property_responsive($script->get_parent()->get_setting('branding_alignment')->get_data());
$properties['order'] 			= $_s->prepare_css_property_responsive($script->get_parent()->get_setting('branding_order')->get_data());

echo $_s->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_branding, .editor-styles-wrapper .sv100_sv_header .sv100_sv_branding' : '.sv100_sv_header .sv100_sv_branding',
	$properties
);
