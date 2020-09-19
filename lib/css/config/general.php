<?php

	// calculate margin for adminbar when header has position fixed
	$top_set	= false;
	$top		= array('top' => array());
	foreach($script->get_parent()->get_setting('position')->get_data() as $screen_size => $value){
		if($value == 'fixed' || $value == 'absolute' || $value == 'sticky'){
			$top_set = true;
			if($screen_size == 'desktop') {
				$top['top'][$screen_size] = '32px';
			}else{
				$top['top'][$screen_size] = '46px';
			}
		}
	}

	if($top_set) {
		echo $_s->build_css(
			'.admin-bar .sv100_sv_header_wrapper',
			$top
		);
	}

	echo $_s->build_css(
		'.sv100_sv_header_wrapper',
		array_merge(
			$script->get_parent()->get_setting('position')->get_css_data('position'),
			$script->get_parent()->get_setting('bg_color')->get_css_data('background-color'),
			$script->get_parent()->get_setting('box_shadow_color')->get_css_data('box-shadow','0px 5px 5px 0px rgba(',')'),
			$script->get_parent()->get_setting('max_width_wrapper')->get_css_data('max-width')
		)
	);

	echo $_s->build_css(
		'.sv100_sv_header',
		array_merge(
			$script->get_parent()->get_setting('max_width')->get_css_data('max-width'),
			$script->get_parent()->get_setting('padding')->get_css_data('padding'),
			$script->get_parent()->get_setting('margin')->get_css_data()
		)
	);