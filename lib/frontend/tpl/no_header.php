<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
		<?php
			if ( $this->get_mobile_zoom() ) {
				echo '<meta content="width=device-width, initial-scale=1.0" name="viewport" />';
			} else {
				echo '<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">';
			}
			
			wp_head();
		?>
	</head>
	<body <?php body_class(); ?>>