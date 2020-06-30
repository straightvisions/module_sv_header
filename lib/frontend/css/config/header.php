<?php

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