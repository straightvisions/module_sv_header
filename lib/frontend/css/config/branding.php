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
height: <?php echo $branding_logo_height_mobile < 1 ? '100%' : $branding_logo_height_mobile . 'px'; ?>;
max-height: <?php echo $branding_logo_height_mobile < 1 ? '60px' : $branding_logo_height_mobile . 'px'; ?>;
}

@media ( min-width: 1350px ) {
	.sv100_sv_header .sv100_sv_header_branding img {
	width: <?php echo $branding_logo_width < 1 ? 'auto' : $branding_logo_width . 'px'; ?>;
	height: <?php echo $branding_logo_height < 1 ? '100%' : $branding_logo_height . 'px'; ?>;
	max-height: <?php echo $branding_logo_height < 1 ? '100px' : $branding_logo_height . 'px'; ?>;
	}
}