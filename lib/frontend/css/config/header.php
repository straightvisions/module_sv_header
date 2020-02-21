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

@media (min-width: 1350px) {
	.sv100_sv_header.open {
		position: <?php echo $position; ?>;
	}
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
button.sv100_sv_navigation_mobile_menu_toggle{
margin: 0; /* fix flex alignment */
}

.sv100_sv_header .sv100_sv_header_bar > *{
display: flex;
}
