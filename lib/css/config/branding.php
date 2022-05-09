<?php
$properties = array();
$properties['justify-content'] 	= $_s->prepare_css_property_responsive($module->get_setting('branding_alignment')->get_data());
$properties['order'] 			= $_s->prepare_css_property_responsive($module->get_setting('branding_order')->get_data());

if($module->override_logo() === 'invert_colors'){
	$properties['filter'] 			= $_s->prepare_css_property('invert(1)');
}elseif($module->override_logo() === 'hide'){
	$properties['display'] 			= $_s->prepare_css_property('none', '', ' !important');
}

echo $_s->build_css(
	'.sv100_sv_header .sv100_sv_branding',
	$properties
);
