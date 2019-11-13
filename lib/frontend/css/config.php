<?php
// Fetches all settings and creates new variables with the setting ID as name and setting data as value.
// This reduces the lines of code for the needed setting values.
foreach ( $script->get_parent()->get_settings() as $setting ) {
	${ $setting->get_ID() } = $setting->run_type()->get_data();

	// If setting is color, it gets the value in the RGB-Format
	if ( $setting->get_type() === 'setting_color' ) {
		${ $setting->get_ID() } = $setting->get_rgb( ${ $setting->get_ID() } );
	}
}


// Header Text Settings
if ( $font_family ) {
	$font					= $script->get_parent()->get_module( 'sv_webfontloader' )->get_font_by_label( $font_family );
} else {
	$font                   = false;
}

// Mobile Settings
$menu_icon_closed			= $script->get_parent()->menu_icon_closed;
$menu_icon_open				= $script->get_parent()->menu_icon_open;

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
?>

	/* Header */
	.sv100_sv_header {
	position: <?php echo $position; ?>;
<?php echo ($box_margin_top > 0) ? 'margin-top: '.$box_margin_top.'px;' : ''; ?>
<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
	font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
	font-size: <?php echo $font_size; ?>px;
	color: rgba(<?php echo $text_color; ?>);
	background-color: rgba(<?php echo $bg_color; ?>);
	box-shadow: 0 1px 10px rgba(<?php echo $box_shadow_color; ?>);
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
	color: rgba(<?php echo $text_color; ?>);
	}

	.sv100_sv_header .sv100_sv_header_website_title:hover,
	.sv100_sv_header .sv100_sv_header_website_title:focus {
	color: rgba(<?php echo $highlight_color; ?>);
	}

<?php $branding_logo_height = $branding_logo_height > 0 ? $branding_logo_height + 20 : 0; ?>

<?php if($branding_logo_height){ ?>
	.sv100_sv_header .sv100_sv_header_bar {
	max-height: <?php echo $branding_logo_height + 20; ?>px;
	}
<?php } ?>

<?php
// ALIGNMENT SETTINGS --------------------------------------------------------------
?>
    button.sv100_sv_navigation_mobile_menu_toggle{
        margin: 0; /* fix flex alignment */
    }

    .sv100_sv_header .sv100_sv_header_bar > *{
        display: flex;
    }

    <?php

        $columns_count = 0;
        $columns_count += $script->get_parent()->get_setting( 'branding' )->run_type()->get_data() ? 1 : 0;
        $columns_count += $script->get_parent()->get_setting( 'navigation_active' )->run_type()->get_data() ? 1 : 0;
        $columns_count += $script->get_parent()->get_setting( 'sidebar_active' )->run_type()->get_data() == 1
        && $script->get_parent()->get_root()->get_module( 'sv_sidebar' )
        && empty(
        $script->get_parent()->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $script->get_parent()->get_module_name().'_sidebar', ) )
        ) === false ? 1 : 0;

        if($columns_count > 0 && $columns_count <= 3){ // 3 test to prevent error
            include( $script->get_parent()->get_path( 'lib/frontend/css/config_columns_'.$columns_count.'.php' ) );
        }



    ?>

<?php
// ORDER SETTINGS --------------------------------------------------------------
?>
    .sv100_sv_header .sv100_sv_header_branding{
        order: <?php echo $branding_order; ?>;
    }
    .sv100_sv_header .sv100_sv_navigation_container{
        order: <?php echo $navigation_order; ?>;
    }
    .sv100_sv_header .sv100_sv_header_sidebar{
        order: <?php echo $sidebar_order; ?>;
    }
<?php
// -----------------------------------------------
?>
	.sv100_sv_header .sv100_sv_header_branding a {
	height: <?php echo $branding_logo_height < 1 ? 'auto' : $branding_logo_height . 'px'; ?>;
	}

	@media ( min-width: 1350px ) {
	.sv100_sv_header .sv100_sv_header_branding a {
	height: <?php echo $branding_logo_height < 1 ? 'auto' : $branding_logo_height . 'px'; ?>;
	}
	}

	.sv100_sv_header .sv100_sv_header_branding img {
	width: <?php echo $branding_logo_width_mobile < 1 ? 'auto' : $branding_logo_width_mobile . 'px'; ?>;
	height: <?php echo $branding_logo_height < 1 ? '100%' : $branding_logo_height . 'px'; ?>;
	max-height: <?php echo $branding_logo_height < 1 ? '60px' : $branding_logo_height . 'px'; ?>;
	}

	@media ( min-width: 1350px ) {
	.sv100_sv_header .sv100_sv_header_branding img {
	width: <?php echo $branding_logo_width < 1 ? 'auto' : $branding_logo_width . 'px'; ?>;
	height: <?php echo $branding_logo_height < 1 ? '100%' : $branding_logo_height . 'px'; ?>;
	max-height: <?php echo $branding_logo_height < 1 ? '100px' : $branding_logo_height . 'px'; ?>;
	}
	}

	/* Menu */
	.sv100_sv_navigation_sv_header_primary {
	background-color: rgba(<?php echo $bg_color_sub; ?>);
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
	height: calc( 100vh - <?php echo $branding_logo_height; ?>px );
	}

	@media ( min-width: 601px ) {
	body.admin-bar .sv100_sv_navigation_sv_header_primary {
	height: calc( 100vh - <?php echo $branding_logo_height; ?>px - 46px );
	}
	}

	@media ( min-width: 783px ) {
	body.admin-bar .sv100_sv_navigation_sv_header_primary {
	height: calc( 100vh - <?php echo $branding_logo_height; ?>px - 32px );
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
	color: rgba(<?php echo $text_color; ?>);
	}

	.sv100_sv_navigation_sv_header_primary ul.menu > li > a::after {
	background: rgba(<?php echo $highlight_color; ?>);
	}

	/* Menu Icon */
	.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle::before {
	-webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_closed; ?>' );
	background-color: rgba(<?php echo $menu_icon_closed_color; ?>);
	}

	.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before {
	-webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_open; ?>' );
	background-color: rgba(<?php echo $menu_icon_open_color; ?>);
	}

	/* Submenu */
	@media ( min-width: 850px ) {
	.sv100_sv_header ul.sub-menu {
	background-color: rgba(<?php echo $bg_color_sub; ?>);
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
	color: rgba(<?php echo $text_color_menu; ?>);
	}

	.sv100_sv_navigation_sv_header_primary .menu > li:hover > a > .item-title,
	.sv100_sv_navigation_sv_header_primary .menu > li:focus > a > .item-title {
	color: rgba(<?php echo $text_color_menu_hover; ?>);
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
	color: rgba(<?php echo $text_color_sub; ?>);
	text-decoration: <?php echo $text_deco_sub; ?>;
	background-color: <?php echo $text_bg_active_sub ? 'rgba(' . $text_bg_color_sub . ')' : 'transparent'; ?>
	}

	.sv100_sv_header ul.sub-menu li:hover > a > .item-title,
	.sv100_sv_header ul.sub-menu li:focus > a > .item-title {
	color: rgba(<?php echo $text_color_sub_hover; ?>);
	text-decoration: <?php echo $text_deco_sub_hover; ?>;
	background-color: <?php echo $text_bg_active_sub_hover ? 'rgba(' . $text_bg_color_sub_hover . ')' : 'transparent'; ?>
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
	color: rgba(<?php echo $text_color; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget a:hover,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li.menu-item-has-children:focus > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:hover > a,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.sub-menu > li:focus > a {
	color: rgba(<?php echo $highlight_color; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_meta li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_recent_entries li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_pages li,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_nav_menu ul.menu > li {
	color: rgba(<?php echo $text_color_sub; ?>);
	background-color: <?php echo $text_bg_active_sub ? 'rgba(' . $text_bg_color_sub . ')' : 'transparent'; ?>
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
	background-color: <?php echo $text_bg_active_sub_hover ? 'rgba(' . $text_bg_color_sub_hover . ')' : 'transparent'; ?>;
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
	color: rgba(<?php echo $text_color_sub_hover; ?>);
	}

	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_archive select,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_categories select,
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input[type="search"],
	.sv100_sv_header_sidebar .sv100_sv_sidebar .widget_search input::placeholder {
	color: rgba(<?php echo $text_color_sub; ?>);
	border-bottom-color: rgba(<?php echo $text_color_sub; ?>);
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