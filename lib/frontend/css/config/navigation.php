<?php
$has_navigation	= (
        $script->get_parent()->get_module( 'sv_navigation' )
        && $script->get_parent()->get_module( 'sv_navigation' )
                                ->has_items( $script->get_parent()->get_module_name() . '_primary' )
    ) ? true : false;

if( $has_navigation ) {
?>

/* Menu (Mobile) - Icon */
button.sv100_sv_navigation_mobile_menu_toggle {
    height: <?php echo $menu_icon_size; ?>px;
    width: <?php echo $menu_icon_size; ?>px;
}

.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle::before {
    -webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_closed; ?>' );
    background-color: rgba(<?php echo $menu_icon_closed_color; ?>);
}

.sv100_sv_header button.sv100_sv_navigation_mobile_menu_toggle.open::before {
    -webkit-mask-image: url( 'data:image/svg+xml;utf8,<?php echo $menu_icon_open; ?>' );
    background-color: rgba(<?php echo $menu_icon_open_color; ?>);
}

/* Menu (Mobile) */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary {
    padding-top: <?php echo $menu_padding_mobile['top'] ? $menu_padding_mobile['top'] : '0'; ?>;
    padding-right: <?php echo $menu_padding_mobile['right'] ? $menu_padding_mobile['right'] : '0'; ?>;
    padding-bottom: <?php echo $menu_padding_mobile['bottom'] ? $menu_padding_mobile['bottom'] : '0'; ?>;
    padding-left: <?php echo $menu_padding_mobile['left'] ? $menu_padding_mobile['left'] : '0'; ?>;
    border-radius: <?php echo $border_radius_menu_mobile; ?>px;
    background-color: rgba(<?php echo $bg_color_menu_mobile; ?>);
	<?php
	if ( $bg_image_menu_mobile ) {
		$bg_size_menu_mobile = $bg_size_menu_mobile > 0 ? $bg_size_menu_mobile . 'px' : $bg_fit_menu_mobile;
		?>
        background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image_menu_mobile, $bg_media_size_menu_mobile )[0]; ?>' );
        background-position:<?php echo $bg_position_menu_mobile; ?>;
        background-size:<?php echo $bg_size_menu_mobile; ?>;
        background-repeat:<?php echo $bg_repeat_menu_mobile; ?>;
        background-attachment:<?php echo $bg_attachment_menu_mobile; ?>;
	<?php } ?>
}

/* Menu (Mobile) - Items - Spacing */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary li {
    margin-top: <?php echo $menu_item_margin_mobile['top'] ? $menu_item_margin_mobile['top'] : '0'; ?>;
    margin-right: <?php echo $menu_item_margin_mobile['right'] ? $menu_item_margin_mobile['right'] : '0'; ?>;
    margin-bottom: <?php echo $menu_item_margin_mobile['bottom'] ? $menu_item_margin_mobile['bottom'] : '0'; ?>;
    margin-left: <?php echo $menu_item_margin_mobile['left'] ? $menu_item_margin_mobile['left'] : '0'; ?>;
}

.sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
    padding-top: <?php echo $menu_item_padding_mobile['top'] ? $menu_item_padding_mobile['top'] : '0'; ?>;
    padding-right: <?php echo $menu_item_padding_mobile['right'] ? $menu_item_padding_mobile['right'] : '0'; ?>;
    padding-bottom: <?php echo $menu_item_padding_mobile['bottom'] ? $menu_item_padding_mobile['bottom'] : '0'; ?>;
    padding-left: <?php echo $menu_item_padding_mobile['left'] ? $menu_item_padding_mobile['left'] : '0'; ?>;
}

/* Menu (Mobile) - Items - Fonts & Colors */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary,
.sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
    <?php echo ( $font_menu ? 'font-family: "' . $font_menu['family'] . '", sans-serif;' : '' ); ?>
    font-weight: <?php echo ( $font_menu ? $font_menu['weight'] : '400' ); ?>;
    font-size: <?php echo $font_size_menu_mobile; ?>px;
    line-height: <?php echo $line_height_menu_mobile; ?>;
    color: rgba(<?php echo $text_color_menu_mobile; ?>);
}

.sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
    border-radius: <?php echo $border_radius_menu_item_mobile; ?>px;
    background-color: rgba(<?php echo $text_bg_color_menu_mobile; ?>);
    text-decoration: <?php
	echo $tex_deco_menu_mobile && $tex_deco_menu_mobile !== 'undefined'
		? $tex_deco_menu_mobile
		: 'none';
	?>
}

.sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a::after {
    background: rgba(<?php echo $highlight_color; ?>);
    width: <?php echo $text_deco_menu_mobile === 'underline' ? '100%' : '0'; ?>;
}

/* Menu (Mobile) - Items - Fonts & Colors (Hover/Focus) */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary a:hover,
.sv100_sv_header .sv100_sv_navigation_sv_header_primary a:focus {
    color: rgba(<?php echo $text_color_menu_mobile_hover; ?>);
    background-color: rgba(<?php echo $text_bg_color_menu_mobile_hover; ?>);
    text-decoration: <?php
	echo $tex_deco_menu_mobile_hover && $tex_deco_menu_mobile_hover !== 'undefined'
		? $tex_deco_menu_mobile_hover
		: 'none';
	?>
}

.sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a:hover > .item-title::after,
.sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a:focus > .item-title::after,
.sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a > .item-title:hover::after,
.sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a > .item-title:focus::after {
    width: <?php echo $text_deco_menu_mobile_hover === 'underline' ? '100%' : '0'; ?>;
}

/* Submenu (Mobile) */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu {
    padding-top: <?php echo $sub_padding_mobile['top'] ? $sub_padding_mobile['top'] : '0'; ?>;
    padding-right: <?php echo $sub_padding_mobile['right'] ? $sub_padding_mobile['right'] : '0'; ?>;
    padding-bottom: <?php echo $sub_padding_mobile['bottom'] ? $sub_padding_mobile['bottom'] : '0'; ?>;
    padding-left: <?php echo $sub_padding_mobile['left'] ? $sub_padding_mobile['left'] : '0'; ?>;
    border-radius: <?php echo $border_radius_sub_mobile; ?>px;
    background-color: rgba(<?php echo $bg_color_sub_mobile; ?>);
	<?php
	if ( $bg_image_sub_mobile ) {
		$bg_size_sub_mobile = $bg_size_sub_mobile > 0 ? $bg_size_sub_mobile . 'px' : $bg_fit_sub_mobile;
		?>
        background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image_sub_mobile, $bg_media_size_sub_mobile )[0]; ?>' );
        background-position:<?php echo $bg_position_sub_mobile; ?>;
        background-size:<?php echo $bg_size_sub_mobile; ?>;
        background-repeat:<?php echo $bg_repeat_sub_mobile; ?>;
        background-attachment:<?php echo $bg_attachment_sub_mobile; ?>;
	<?php } ?>
}

/* Submenu (Mobile) - Items - Spacing */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li {
    margin-top: <?php echo $sub_item_margin_mobile['top'] ? $sub_item_margin_mobile['top'] : '0'; ?>;
    margin-right: <?php echo $sub_item_margin_mobile['right'] ? $sub_item_margin_mobile['right'] : '0'; ?>;
    margin-bottom: <?php echo $sub_item_margin_mobile['bottom'] ? $sub_item_margin_mobile['bottom'] : '0'; ?>;
    margin-left: <?php echo $sub_item_margin_mobile['left'] ? $sub_item_margin_mobile['left'] : '0'; ?>;
}

.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a {
    padding-top: <?php echo $sub_item_padding_mobile['top'] ? $sub_item_padding_mobile['top'] : ''; ?>;
    padding-right: <?php echo $sub_item_padding_mobile['right'] ? $sub_item_padding_mobile['right'] : ''; ?>;
    padding-bottom: <?php echo $sub_item_padding_mobile['bottom'] ? $sub_item_padding_mobile['bottom'] : ''; ?>;
    padding-left: <?php echo $sub_item_padding_mobile['left'] ? $sub_item_padding_mobile['left'] : ''; ?>;
}

/* Submenu (Mobile) - Items - Fonts & Colors */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a {
	<?php echo ( $font_sub ? 'font-family: "' . $font_sub['family'] . '", sans-serif;' : '' ); ?>
    font-weight: <?php echo ( $font_sub ? $font_sub['weight'] : '400' ); ?>;
    font-size: <?php echo $font_size_sub_mobile; ?>px;
    line-height: <?php echo $line_height_sub_mobile; ?>;
    color: rgba(<?php echo $text_color_sub_mobile; ?>);
    border-radius: <?php echo $border_radius_sub_item_mobile; ?>px;
    background-color: rgba(<?php echo $text_bg_color_sub_mobile; ?>);
    text-decoration: <?php
	echo $tex_deco_sub_mobile && $tex_deco_sub_mobile !== 'undefined'
		? $tex_deco_sub_mobile
		: 'none';
	?>
}

/* Submenu (Mobile) - Items - Fonts & Colors (Hover/Focus) */
.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a:hover,
.sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a:focus {
    color: rgba(<?php echo $text_color_sub_mobile_hover; ?>);
    background-color: rgba(<?php echo $text_bg_color_sub_mobile_hover; ?>);
    text-decoration: <?php
	echo $tex_deco_sub_mobile_hover && $tex_deco_sub_mobile_hover !== 'undefined'
		? $tex_deco_sub_mobile_hover
		: 'none';
	?>
}

@media (min-width: 1350px) {
    /* Menu (Desktop) */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary {
        padding-top: <?php echo $menu_padding['top'] ? $menu_padding['top'] : '0'; ?>;
        padding-right: <?php echo $menu_padding['right'] ? $menu_padding['right'] : '0'; ?>;
        padding-bottom: <?php echo $menu_padding['bottom'] ? $menu_padding['bottom'] : '0'; ?>;
        padding-left: <?php echo $menu_padding['left'] ? $menu_padding['left'] : '0'; ?>;
        border-radius: <?php echo $border_radius_menu; ?>px;
        background-color: rgba(<?php echo $bg_color_menu; ?>);
        <?php
        if ( $bg_image_menu ) {
            $bg_size_menu = $bg_size_menu > 0 ? $bg_size_menu . 'px' : $bg_fit_menu;
            ?>
            background-image: url( '<?php echo wp_get_attachment_image_src( $bg_image_menu, $bg_media_size_menu )[0]; ?>' );
            background-position:<?php echo $bg_position_menu; ?>;
            background-size:<?php echo $bg_size_menu; ?>;
            background-repeat:<?php echo $bg_repeat_menu; ?>;
            background-attachment:<?php echo $bg_attachment_menu; ?>;
        <?php } ?>
    }

    /* Menu (Desktop) - Items - Spacing */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary li {
        margin-top: <?php echo $menu_item_margin['top'] ? $menu_item_margin['top'] : '0'; ?>;
        margin-right: <?php echo $menu_item_margin['right'] ? $menu_item_margin['right'] : '0'; ?>;
        margin-bottom: <?php echo $menu_item_margin['bottom'] ? $menu_item_margin['bottom'] : '0'; ?>;
        margin-left: <?php echo $menu_item_margin['left'] ? $menu_item_margin['left'] : '0'; ?>;
    }

    .sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
        padding-top: <?php echo $menu_item_padding['top'] ? $menu_item_padding['top'] : '0'; ?>;
        padding-right: <?php echo $menu_item_padding['right'] ? $menu_item_padding['right'] : '0'; ?>;
        padding-bottom: <?php echo $menu_item_padding['bottom'] ? $menu_item_padding['bottom'] : '0'; ?>;
        padding-left: <?php echo $menu_item_padding['left'] ? $menu_item_padding['left'] : '0'; ?>;
    }

    /* Menu (Desktop) - Items - Fonts & Colors */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary,
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
        font-size: <?php echo $font_size_menu; ?>px;
        line-height: <?php echo $line_height_menu; ?>;
        color: rgba(<?php echo $text_color_menu; ?>);
    }

    .sv100_sv_header .sv100_sv_navigation_sv_header_primary a {
        border-radius: <?php echo $border_radius_menu_item; ?>px;
        background-color: rgba(<?php echo $text_bg_color_menu; ?>);
        text-decoration: <?php echo $tex_deco_menu; ?>;
    }

    .sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a > .item-title::after {
        background: rgba(<?php echo $highlight_color; ?>);
        width: <?php echo $text_deco_menu === 'underline' ? '100%' : '0'; ?>;
    }

    /* Menu (Desktop) - Items - Fonts & Colors (Hover/Focus) */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary a:hover,
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary a:focus {
        color: rgba(<?php echo $text_color_menu_hover; ?>);
        background-color: rgba(<?php echo $text_bg_color_menu_hover; ?>);
        text-decoration: <?php echo $tex_deco_menu_hover; ?>;
    }

    .sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a:hover > .item-title::after,
    .sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a:focus > .item-title::after,
    .sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a > .item-title:hover::after,
    .sv100_sv_navigation_sv_header_primary ul.menu > li:not(.dropdown) > a > .item-title:focus::after {
        width: <?php echo $text_deco_menu_hover === 'underline' ? '100%' : '0'; ?>;
    }

    /* Submenu (Desktop) */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu {
        padding-top: <?php echo $sub_padding['top'] ? $sub_padding['top'] : '0'; ?>;
        padding-right: <?php echo $sub_padding['right'] ? $sub_padding['right'] : '0'; ?>;
        padding-bottom: <?php echo $sub_padding['bottom'] ? $sub_padding['bottom'] : '0'; ?>;
        padding-left: <?php echo $sub_padding['left'] ? $sub_padding['left'] : '0'; ?>;
        border-radius: <?php echo $border_radius_sub; ?>px;
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

    /* Submenu (Desktop) - Items - Spacing */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li {
        margin-top: <?php echo $sub_item_margin['top'] ? $sub_item_margin['top'] : '0'; ?>;
        margin-right: <?php echo $sub_item_margin['right'] ? $sub_item_margin['right'] : '0'; ?>;
        margin-bottom: <?php echo $sub_item_margin['bottom'] ? $sub_item_margin['bottom'] : '0'; ?>;
        margin-left: <?php echo $sub_item_margin['left'] ? $sub_item_margin['left'] : '0'; ?>;
    }

    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a {
        padding-top: <?php echo $sub_item_padding['top'] ? $sub_item_padding['top'] : '0'; ?>;
        padding-right: <?php echo $sub_item_padding['right'] ? $sub_item_padding['right'] : '0'; ?>;
        padding-bottom: <?php echo $sub_item_padding['bottom'] ? $sub_item_padding['bottom'] : '0'; ?>;
        padding-left: <?php echo $sub_item_padding['left'] ? $sub_item_padding['left'] : '0'; ?>;
    }

    /* Submenu (Desktop) - Items - Fonts & Colors */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a {
        font-size: <?php echo $font_size_sub; ?>px;
        line-height: <?php echo $line_height_sub; ?>;
        color: rgba(<?php echo $text_color_sub; ?>);
        border-radius: <?php echo $border_radius_sub_item; ?>px;
        background-color: rgba(<?php echo $text_bg_color_sub; ?>);
        text-decoration: <?php echo $tex_deco_sub; ?>;
    }

    /* Submenu (Desktop) - Items - Fonts & Colors (Hover/Focus) */
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a:hover,
    .sv100_sv_header .sv100_sv_navigation_sv_header_primary ul.sub-menu > li > a:focus {
        color: rgba(<?php echo $text_color_sub_hover; ?>);
        background-color: rgba(<?php echo $text_bg_color_sub_hover; ?>);
        text-decoration: <?php echo $tex_deco_sub_hover; ?>;
    }
}
<?php } ?>