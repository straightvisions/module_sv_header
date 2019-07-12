<?php
	// Header Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                   = false;
	}
	
	$font_size					= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$text_color					= $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
	
	// Header Background Settings
	$bg_color					= $script->get_parent()->get_setting( 'bg_color' )->run_type()->get_data();
	$bg_image					= $script->get_parent()->get_setting( 'bg_image' )->run_type()->get_data();
	$bg_media_size				= $script->get_parent()->get_setting( 'bg_media_size' )->run_type()->get_data();
	$bg_position				= $script->get_parent()->get_setting( 'bg_position' )->run_type()->get_data();
	$bg_size					= $script->get_parent()->get_setting( 'bg_size' )->run_type()->get_data();
	$bg_fit						= $script->get_parent()->get_setting( 'bg_fit' )->run_type()->get_data();
	$bg_repeat					= $script->get_parent()->get_setting( 'bg_repeat' )->run_type()->get_data();
	$bg_attachment				= $script->get_parent()->get_setting( 'bg_attachment' )->run_type()->get_data();
	
	// Submenu Item Settings
	$font_size_sub				= $script->get_parent()->get_setting( 'font_size_sub' )->run_type()->get_data();
	$text_deco_sub				= $script->get_parent()->get_setting( 'text_deco_sub' )->run_type()->get_data();
	$text_color_sub				= $script->get_parent()->get_setting( 'text_color_sub' )->run_type()->get_data();
	$text_bg_active_sub			= $script->get_parent()->get_setting( 'text_bg_active_sub' )->run_type()->get_data();
	$text_bg_color_sub			= $script->get_parent()->get_setting( 'text_bg_color_sub' )->run_type()->get_data();
	
	// Submenu Background Settings
	$bg_color_sub				= $script->get_parent()->get_setting( 'bg_color_sub' )->run_type()->get_data();
	$bg_image_sub				= $script->get_parent()->get_setting( 'bg_image_sub' )->run_type()->get_data();
	$bg_media_size_sub			= $script->get_parent()->get_setting( 'bg_media_size_sub' )->run_type()->get_data();
	$bg_position_sub			= $script->get_parent()->get_setting( 'bg_position_sub' )->run_type()->get_data();
	$bg_size_sub				= $script->get_parent()->get_setting( 'bg_size_sub' )->run_type()->get_data();
	$bg_fit_sub					= $script->get_parent()->get_setting( 'bg_fit_sub' )->run_type()->get_data();
	$bg_repeat_sub				= $script->get_parent()->get_setting( 'bg_repeat_sub' )->run_type()->get_data();
	$bg_attachment_sub			= $script->get_parent()->get_setting( 'bg_attachment_sub' )->run_type()->get_data();
	
	// Submenu Item Settings (Hover/Focus)
	$text_deco_sub_hover		= $script->get_parent()->get_setting( 'text_deco_sub_hover' )->run_type()->get_data();
	$text_color_sub_hover		= $script->get_parent()->get_setting( 'text_color_sub_hover' )->run_type()->get_data();
	$text_bg_active_sub_hover	= $script->get_parent()->get_setting( 'text_bg_active_sub_hover' )->run_type()->get_data();
	$text_bg_color_sub_hover	= $script->get_parent()->get_setting( 'text_bg_color_sub_hover' )->run_type()->get_data();
?>

/* Header */
.sv100_sv_header {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $text_color; ?>;
	background-color: <?php echo $bg_color; ?>;


<?php
	if ( $bg_image ) {
		$bg_size = $bg_size > 0 ? $bg_size . 'px' : $bg_fit;
	?>
	background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image, $bg_media_size )[0]; ?>' );
	background-position:<?php echo $bg_position; ?>;
	background-size:<?php echo $bg_size; ?>;
	background-repeat:<?php echo $bg_repeat; ?>;
	background-attachment:<?php echo $bg_attachment; ?>;
<?php } ?>
}

.sv100_sv_header .sv100_sv_header_website_title,
.sv100_sv_header .sv100_sv_header_website_title:hover,
.sv100_sv_header .sv100_sv_header_website_title:focus,
.sv100_sv_header ul.menu li > a,
.sv100_sv_header ul.menu li:hover > a,
.sv100_sv_header ul.menu li:focus > a {
	color: <?php echo $text_color; ?>;
}

/* Submenu */
.sv100_sv_header ul.sub-menu {
	background-color: <?php echo $bg_color_sub; ?>;
<?php
	if ( $bg_image_sub ) {
	$bg_size_sub = $bg_size_sub > 0 ? $bg_size_sub . 'px' : $bg_fit_sub;
	?>
	background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image_sub, $bg_media_size_sub )[0]; ?>' );
	background-position:<?php echo $bg_position_sub; ?>;
	background-size:<?php echo $bg_size_sub; ?>;
	background-repeat:<?php echo $bg_repeat_sub; ?>;
	background-attachment:<?php echo $bg_attachment_sub; ?>;
<?php } ?>
}

/* Submenu Items */
.sv100_sv_header ul.sub-menu li > a {
	font-family: <?php echo ( $font ? '"' . $font['family'] . '", ' : '' ); ?>sans-serif;
	font-weight: <?php echo ( $font ? '"' . $font['weight'] . '", ' : '400' ); ?>;
	font-size: <?php echo $font_size_sub; ?>px;
	color: <?php echo $text_color_sub; ?>;
	text-decoration: <?php echo $text_deco_sub; ?>;
	background-color: <?php echo $text_bg_active_sub ? $text_bg_color_sub : 'transparent'; ?>
}

.sv100_sv_header ul.sub-menu li:hover > a,
.sv100_sv_header ul.sub-menu li:focus > a {
	color: <?php echo $text_color_sub_hover; ?>;
	text-decoration: <?php echo $text_deco_sub_hover; ?>;
	background-color: <?php echo $text_bg_active_sub_hover ? $text_bg_color_sub_hover : 'transparent'; ?>
}