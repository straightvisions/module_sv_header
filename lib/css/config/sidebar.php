<?php
$properties = array();
$properties['justify-content']		= $_s->prepare_css_property_responsive($script->get_parent()->get_setting('sidebar_alignment')->get_data());
$properties['order']				= $_s->prepare_css_property_responsive($script->get_parent()->get_setting('sidebar_order')->get_data());

echo $_s->build_css(
	'.sv100_sv_header .sv100_sv_header_sidebar',
	array_merge(
		$properties,
		$script->get_parent()->get_setting('sidebar_max_width')->get_css_data('max-width'),
	)
);

	echo $_s->build_css(
		'.sv100_sv_header .sv100_sv_header_sidebar .sv100_sv_sidebar_sv_header_sidebar',
		array_merge(
			$properties,
			$script->get_parent()->get_setting('sidebar_margin')->get_css_data(),
			$script->get_parent()->get_setting('sidebar_padding')->get_css_data('padding')
		)
	);