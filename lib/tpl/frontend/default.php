<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
	<?php
		if ( $this->get_mobile_zoom() ) {
			echo '<meta content="width=device-width, initial-scale=1" name="viewport" />';
		} else {
			echo '<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">';
		}
		
		wp_head();

		/* Prevent Browsers from looking for Favicon in Domainroot, when no Site Icon is set */
		if( get_option( 'site_icon', false ) == false ) {
			echo '<link rel="icon" href="data:,">';
		}
	?>
</head>
<body <?php body_class(); ?>>
<?php
	if($this->get_setting('template') != 'no_header'){
		echo $this->get_module( 'sv_header_bar' ) ? $this->get_module( 'sv_header_bar' )->load() : '';
?>
<div class="<?php echo $this->get_prefix('wrapper'); ?>">
	<header class="<?php echo $this->get_prefix(); ?>">
		<div class="<?php echo $this->get_prefix( 'bar' ); ?>">
			<?php
				echo $this->get_module('sv_branding') ? $this->get_module('sv_branding')->load() : '';
				echo $this->get_module('sv_header_menu') ? $this->get_module('sv_header_menu')->load() : '';
				include($this->get_path('lib/tpl/frontend/part_sidebar.php'));
				?>
		</div>
	</header>
</div>
<?php } ?>