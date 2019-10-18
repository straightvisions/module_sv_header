<?php
	// Header Settings
	$position					= $script->get_parent()->get_setting( 'position' )->run_type()->get_data();
	$box_margin_top				= $script->get_parent()->get_setting( 'box_margin_top' )->run_type()->get_data();

	$box_shadow_opacity			= ($script->get_parent()->get_setting( 'box_shadow_opacity' )->run_type()->get_data() / 100);

	$box_content_alignment		= $script->get_parent()->get_setting( 'box_content_alignment' )->run_type()->get_data();

	// Header Text Settings
	$font_family				= $script->get_parent()->get_setting( 'font_family' )->run_type()->get_data();
	
	if ( $font_family ) {
		$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
	} else {
		$font                   = false;
	}
	
	$font_size					= $script->get_parent()->get_setting( 'font_size' )->run_type()->get_data();
	$text_color					= $script->get_parent()->get_setting( 'text_color' )->run_type()->get_data();
	$highlight_color			= $script->get_parent()->get_setting( 'highlight_color' )->run_type()->get_data();
	
	// Header Background Settings
	$bg_color					= $script->get_parent()->get_setting( 'bg_color' )->run_type()->get_data();
	$bg_color_opacity			= $script->get_parent()->get_setting( 'bg_color_opacity' )->run_type()->get_data();
	// Value is a hex color
	list( $r, $g, $b )			= sscanf( $bg_color, "#%02x%02x%02x" );
	$bg_color_rgb				= $r . ',' . $g . ',' . $b;
	$bg_color_rgba				= $bg_color_rgb . ',' . $bg_color_opacity / 100;

	$bg_image					= $script->get_parent()->get_setting( 'bg_image' )->run_type()->get_data();
	$bg_media_size				= $script->get_parent()->get_setting( 'bg_media_size' )->run_type()->get_data();
	$bg_position				= $script->get_parent()->get_setting( 'bg_position' )->run_type()->get_data();
	$bg_size					= $script->get_parent()->get_setting( 'bg_size' )->run_type()->get_data();
	$bg_fit						= $script->get_parent()->get_setting( 'bg_fit' )->run_type()->get_data();
	$bg_repeat					= $script->get_parent()->get_setting( 'bg_repeat' )->run_type()->get_data();
	$bg_attachment				= $script->get_parent()->get_setting( 'bg_attachment' )->run_type()->get_data();

    // Menu Item Settings
    $text_deco_menu				= $script->get_parent()->get_setting( 'text_deco_menu' )->run_type()->get_data();
    $text_color_menu			= $script->get_parent()->get_setting( 'text_color_menu' )->run_type()->get_data();

    // Menu Item Settings (Hover/Focus)
    $text_deco_menu_hover		= $script->get_parent()->get_setting( 'text_deco_menu_hover' )->run_type()->get_data();
    $text_color_menu_hover	    = $script->get_parent()->get_setting( 'text_color_menu_hover' )->run_type()->get_data();

	// Submenu Item Settings
	$font_size_sub				= $script->get_parent()->get_setting( 'font_size_sub' )->run_type()->get_data();
	$text_deco_sub				= $script->get_parent()->get_setting( 'text_deco_sub' )->run_type()->get_data();
	$text_color_sub				= $script->get_parent()->get_setting( 'text_color_sub' )->run_type()->get_data();
	$text_bg_active_sub			= $script->get_parent()->get_setting( 'text_bg_active_sub' )->run_type()->get_data();
	$text_bg_color_sub			= $script->get_parent()->get_setting( 'text_bg_color_sub' )->run_type()->get_data();
	
	// Submenu Background Settings
	$bg_color_sub				= sscanf( $script->get_parent()->get_setting( 'bg_color_sub' )->run_type()->get_data(), "#%02x%02x%02x" );
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
	
	// Mobile Settings
	$bg_opacity_mobile			= $script->get_parent()->get_setting( 'bg_opacity_mobile' )->run_type()->get_data() / 100;
	$menu_icon_closed			= $script->get_parent()->menu_icon_closed;
	$menu_icon_closed_color		= $script->get_parent()->get_setting( 'menu_icon_closed_color' )->run_type()->get_data();
	$menu_icon_open				= $script->get_parent()->menu_icon_open;
	$menu_icon_open_color		= $script->get_parent()->get_setting( 'menu_icon_open_color' )->run_type()->get_data();
	
	// Branding Logo
	$logo_width					= $script->get_parent()->get_setting( 'branding_logo_width' )->run_type()->get_data();
	$logo_height				= $script->get_parent()->get_setting( 'branding_logo_height' )->run_type()->get_data();
	$logo_width_mobile			= $script->get_parent()->get_setting( 'branding_logo_width_mobile' )->run_type()->get_data();
	$logo_height_mobile			= $script->get_parent()->get_setting( 'branding_logo_height_mobile' )->run_type()->get_data();
	
	$has_navigation				= ( $script->get_parent()->get_module( 'sv_navigation' )
								   && $script->get_parent()
											 ->get_module( 'sv_navigation' )
											 ->has_items( $script->get_parent()->get_module_name() . '_primary' ) )
									? true : false;
	$has_sidebar				= ( $script->get_parent()->get_module( 'sv_sidebar' )
								  && ! empty( $script->get_parent()
													 ->get_module( 'sv_sidebar' )
													 ->load( array( 'id' => $script->get_parent()->get_module_name(), ) ) ) )
									? true : false;
	$has_branding				= $script->get_parent()->get_setting( 'branding' )->run_type()->get_data();
?>

/* Header */
.sv100_sv_header {
	position: <?php echo $position; ?>;
	<?php echo ($box_margin_top > 0) ? 'margin-top: '.$box_margin_top.'px;' : ''; ?>
	<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: <?php echo $text_color; ?>;
	background-color: rgba(<?php echo $bg_color_rgba; ?>);
	box-shadow: 0 1px 10px rgba( 0, 0, 0, <?php echo $box_shadow_opacity; ?> );
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

<?php if ( $position === 'fixed' || $position === 'sticky' || $position === 'absolute' ) { ?>
body.admin-bar .sv100_sv_header {
	<?php echo $position === 'fixed' ? 'position: sticky;' : ''; ?>
	top: 0;
}


@media ( min-width: 601px ) {
	body.admin-bar .sv100_sv_header {
		<?php echo $position === 'fixed' ? 'position: fixed;' : ''; ?>
		top: 46px;
	}
}

@media ( min-width: 783px ) {
	body.admin-bar .sv100_sv_header {
		top: 32px;
	}
}
<?php } ?>

/* Header Bar */
/* Header Branding */
.sv100_sv_header .sv100_sv_header_website_title {
	color: <?php echo $text_color; ?>;
}

.sv100_sv_header .sv100_sv_header_website_title:hover,
.sv100_sv_header .sv100_sv_header_website_title:focus {
	color: <?php echo $highlight_color; ?>;
}

<?php $logo_height_mobile = $logo_height_mobile > 0 ? $logo_height_mobile + 20 : 0; ?>

<?php if($logo_height_mobile){ ?>
.sv100_sv_header .sv100_sv_header_bar {
    max-height: <?php echo $logo_height_mobile + 20; ?>px;
}
<?php } ?>

<?php if($box_content_alignment == 'left'){ ?>
	.sv100_sv_header .sv100_sv_header_bar {
		justify-content: start;
	}
	.sv100_sv_header .sv100_sv_header_bar > *:only-child{
		margin-right:auto;
	}
<?php }elseif($box_content_alignment == 'right'){ ?>
	.sv100_sv_header .sv100_sv_header_bar {
		justify-content: end;
	}
	.sv100_sv_header .sv100_sv_header_bar > *:only-child{
		margin-left:auto;
	}
<?php }else{ ?>
	.sv100_sv_header .sv100_sv_header_bar {
		justify-content: center;
	}
<?php } ?>

.sv100_sv_header .sv100_sv_header_branding a {
    height: <?php echo $logo_height_mobile < 1 ? 'auto' : $logo_height_mobile . 'px'; ?>;
}

@media ( min-width: 1350px ) {
    .sv100_sv_header .sv100_sv_header_branding a {
        height: <?php echo $logo_height < 1 ? 'auto' : $logo_height . 'px'; ?>;
    }
}

.sv100_sv_header .sv100_sv_header_branding img {
	width: <?php echo $logo_width_mobile < 1 ? '100%' : $logo_width_mobile . 'px'; ?>;
	height: <?php echo $logo_height_mobile < 1 ? '100%' : $logo_height_mobile . 'px'; ?>;
	max-height: <?php echo $logo_height_mobile < 1 ? '60px' : $logo_height_mobile . 'px'; ?>;
}

@media ( min-width: 1350px ) {
	.sv100_sv_header .sv100_sv_header_branding img {
		width: <?php echo $logo_width < 1 ? '100%' : $logo_width . 'px'; ?>;
		height: <?php echo $logo_height < 1 ? '100%' : $logo_height . 'px'; ?>;
		max-height: <?php echo $logo_height < 1 ? '100px' : $logo_height . 'px'; ?>;
	}
}

/* Menu */
.sv100_sv_navigation_sv_header_primary {
	background-color: rgba( <?php echo $bg_color_sub[0] . ',' . $bg_color_sub[1] . ',' . $bg_color_sub[2], ',' . $bg_opacity_mobile; ?> );
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

.sv100_sv_navigation_sv_header_primary {
    height: calc( 100vh - <?php echo $logo_height_mobile; ?>px );
}

@media ( min-width: 601px ) {
    body.admin-bar .sv100_sv_navigation_sv_header_primary {
        height: calc( 100vh - <?php echo $logo_height_mobile; ?>px - 46px );
    }
}

@media ( min-width: 783px ) {
    body.admin-bar .sv100_sv_navigation_sv_header_primary {
        height: calc( 100vh - <?php echo $logo_height_mobile; ?>px - 32px );
    }
}

@media ( min-width: 1350px ) {
    body.admin-bar .sv100_sv_navigation_sv_header_primary,
    .sv100_sv_navigation_sv_header_primary {
		background: transparent;
        height: 100%;
	}
}

.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul li > a {
	<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
}

.sv100_sv_header ul.menu li > a,
.sv100_sv_header ul.menu li:hover > a,
.sv100_sv_header ul.menu li:focus > a {
	color: <?php echo $text_color; ?>;
}

.sv100_sv_navigation_sv_header_primary ul.menu > li > a::after {
	background: <?php echo $highlight_color; ?>;
}

/* Menu Icon */
.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle::before {
	-webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_closed; ?>' );
	background-color: <?php echo $menu_icon_closed_color; ?>;
}

.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before {
	-webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_open; ?>' );
	background-color: <?php echo $menu_icon_open_color; ?>;
}

/* Submenu */
@media ( min-width: 850px ) {
	.sv100_sv_header ul.sub-menu {
		background-color: rgb( <?php echo $bg_color_sub[0] . ',' . $bg_color_sub[1] . ',' . $bg_color_sub[2]; ?> );
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
}

/* Main Menu Items */
.sv100_sv_navigation_sv_header_primary .menu > li > a > .item-title {
    color: <?php echo $text_color_menu; ?>;
}

.sv100_sv_navigation_sv_header_primary .menu > li:hover > a > .item-title,
.sv100_sv_navigation_sv_header_primary .menu > li:focus > a > .item-title {
    color: <?php echo $text_color_menu_hover; ?>;
}

.sv100_sv_navigation_sv_header_primary .menu > li > a {
    text-decoration: <?php echo $text_deco_menu === 'underline' ? 'none' : $text_deco_menu ?>;
}

@media ( min-width: 1350px ) {
    <?php if ( $text_deco_menu === 'underline' ) { ?>
    .sv100_sv_navigation_sv_header_primary .menu > li > a::after {
        width: 100%;
    }
    <?php
    }
    if ($text_deco_menu === 'none' ) {
    ?>
    .sv100_sv_navigation_sv_header_primary .menu > li > a::after {
        width: 0;
    }
    <?php
    }

    if ( $text_deco_menu_hover === 'underline' ) {
    ?>
    .sv100_sv_navigation_sv_header_primary .menu > li:hover > a::after,
    .sv100_sv_navigation_sv_header_primary .menu > li:focus > a::after {
        width: 100%;
    }
    <?php
    }

    if ( $text_deco_menu_hover === 'none' ) {
    ?>
    .sv100_sv_navigation_sv_header_primary .menu > li:hover > a::after,
    .sv100_sv_navigation_sv_header_primary .menu > li:focus > a::after {
        width: 0;
    }
    <?php } ?>
}

/* Submenu Items */
.sv100_sv_header ul.sub-menu li > a > .item-title {
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size_sub; ?>px;
	color: <?php echo $text_color_sub; ?>;
	text-decoration: <?php echo $text_deco_sub; ?>;
	background-color: <?php echo $text_bg_active_sub ? $text_bg_color_sub : 'transparent'; ?>
}

.sv100_sv_header ul.sub-menu li:hover > a > .item-title,
.sv100_sv_header ul.sub-menu li:focus > a > .item-title {
	color: <?php echo $text_color_sub_hover; ?>;
	text-decoration: <?php echo $text_deco_sub_hover; ?>;
	background-color: <?php echo $text_bg_active_sub_hover ? $text_bg_color_sub_hover : 'transparent'; ?>
}

/* Widgets */
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul > li {
	color: <?php echo $text_color; ?>;
}

.sv100_sv_header_sidebar .sv100_sv_sidebar .widget a:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:focus > a {
	color: <?php echo $highlight_color; ?>;
}

.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li {
	color: <?php echo $text_color_sub; ?>;
	background-color: <?php echo $text_bg_active_sub ? $text_bg_color_sub : 'transparent'; ?>
}

.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:focus,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:focus,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:focus,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:focus,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:focus,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:hover,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:focus {
	background-color: <?php echo $text_bg_active_sub_hover ? $text_bg_color_sub_hover : 'transparent'; ?>;
}

.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li:focus > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:hover > a,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li:focus > a {
	color: <?php echo $text_color_sub_hover; ?>;
}

.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive select,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories select,
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input[type="search"],
.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input::placeholder {
	color: <?php echo $text_color_sub; ?>;
	border-bottom-color: <?php echo $text_color_sub; ?>;
}

/* Sidebar - Alignment */
<?php
if ( count( $script->get_parent()->get_module( 'sv_sidebar' )->get_sidebars( $script->get_parent() ) ) > 0 ) {
	foreach ( $script->get_parent()->get_module( 'sv_sidebar' )->get_sidebars( $script->get_parent() ) as $sidebar ) {
		$value = $script->get_parent()->get_setting( $sidebar['id'] )->run_type()->get_data();
		
		switch ( $value ) {
			case 'left':
				$value = 'flex-start';
				break;
			case 'right':
				$value = 'flex-end';
				break;
		}
		
		echo '.' . $sidebar['id'] . '{';
		echo 'align-items: ' . $value . ';';
		echo '}';
	}
}
?>