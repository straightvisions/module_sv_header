<?php
$properties = array();
$properties['justify-content']  = $setting->prepare_css_property_responsive($alignment);

echo $setting->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar' : '.sv100_sv_header .sv100_sv_header_bar',
	$properties
);

// children flex setup
$properties = array();
$container_alignment  = $setting->prepare_css_property_responsive($alignment);
$properties['flex']   = $setting->get_breakpoints();

foreach( $properties['flex'] as $key => &$value){
	$value = '1 1 auto';
	if(isset($container_alignment[$key]) && !in_array($container_alignment[$key] , ['center', 'spread'])){
		$value = '0 1 auto';
	}
}

echo $setting->build_css(
	is_admin() ? '.editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *, .editor-styles-wrapper .sv100_sv_header .sv100_sv_header_bar > *' : '.sv100_sv_header .sv100_sv_header_bar > *',
	$properties
);

