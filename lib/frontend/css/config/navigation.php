<?php
$has_navigation				= ( $script->get_parent()->get_module( 'sv_navigation' )
								   && $script->get_parent()
											 ->get_module( 'sv_navigation' )
											 ->has_items( $script->get_parent()->get_module_name() . '_primary' ) )
	? true : false;

if($has_navigation){
	// Mobile Settings
	$menu_icon_closed			= $script->get_parent()->menu_icon_closed;
	$menu_icon_open				= $script->get_parent()->menu_icon_open;
?>

/* Menu */
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

	<?php if(isset($menu_item_margin['top'])){ ?>
	.sv100_sv_header ul.sub-menu li{
		margin:<?php
		echo
			$menu_item_margin['top'].' '.
			$menu_item_margin['right'].' '.
			$menu_item_margin['bottom'].' '.
			$menu_item_margin['left']
	?>;
	}
	<?php } ?>
	<?php if(isset($menu_item_padding['top'])){ ?>
		.sv100_sv_header ul.sub-menu li > a{
		padding:<?php
		echo
			$menu_item_padding['top'].' '.
			$menu_item_padding['right'].' '.
			$menu_item_padding['bottom'].' '.
			$menu_item_padding['left']
		?>;
		}
	<?php } ?>
<?php } ?>