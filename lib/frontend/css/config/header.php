/* Header - Mobile */
.sv100_sv_header {
position: <?php echo $position_mobile; ?>;
<?php echo ($box_margin_top_mobile > 0) ? 'margin-top: '.$box_margin_top_mobile.'px;' : ''; ?>
<?php echo ($box_margin_bottom_mobile > 0) ? 'margin-bottom: '.$box_margin_bottom_mobile.'px;' : ''; ?>
<?php echo ( $font ? 'font-family: "' . $font['family'] . '", sans-serif;' : '' ); ?>
font-weight: <?php echo ( $font ? $font['weight'] : '400' ); ?>;
font-size: <?php echo $font_size; ?>px;
line-height: <?php echo $line_height; ?>;
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


<?php if ( $position_mobile !== 'static' ) { ?>
	body.admin-bar .sv100_sv_header {
		<?php echo $position_mobile === 'fixed' ? 'position: sticky;' : ''; ?>
		top: 0;
	}


	@media ( min-width: 601px ) {
		body.admin-bar .sv100_sv_header {
			<?php echo $position_mobile === 'fixed' ? 'position: fixed;' : ''; ?>
			top: 46px;
		}
	}

	@media ( min-width: 783px ) {
		body.admin-bar .sv100_sv_header {
			top: 32px;
		}
	}
<?php } ?>

/* Header - Desktop */
@media (min-width: 1350px) {
	.sv100_sv_header,
	.sv100_sv_header.open {
		position: <?php echo $position; ?>;
		<?php echo ($box_margin_top > 0) ? 'margin-top: '.$box_margin_top.'px;' : ''; ?>
		<?php echo ($box_margin_bottom > 0) ? 'margin-bottom: '.$box_margin_bottom.'px;' : ''; ?>
	}
}


.sv100_sv_header > .sv100_sv_header_bar {
	padding-top: <?php echo $header_padding_mobile['top'] ? $header_padding_mobile['top'] : '0'; ?>;
	padding-right: <?php echo $header_padding_mobile['right'] ? $header_padding_mobile['right'] : '0'; ?>;
	padding-bottom: <?php echo $header_padding_mobile['bottom'] ? $header_padding_mobile['bottom'] : '0'; ?>;
	padding-left: <?php echo $header_padding_mobile['left'] ? $header_padding_mobile['left'] : '0'; ?>;
}

@media (min-width: 1350px) {
	.sv100_sv_header > .sv100_sv_header_bar {
		padding-top: <?php echo $header_padding['top'] ? $header_padding['top'] : '0'; ?>;
		padding-right: <?php echo $header_padding['right'] ? $header_padding['right'] : '0'; ?>;
		padding-bottom: <?php echo $header_padding['bottom'] ? $header_padding['bottom'] : '0'; ?>;
		padding-left: <?php echo $header_padding['left'] ? $header_padding['left'] : '0'; ?>;
	}
}

