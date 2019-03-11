<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="<?php echo $this->get_prefix(); ?>">
			<div class="<?php echo $this->get_prefix( 'bar' ); ?> sv_common_container">
				<?php echo do_shortcode( '[sv_navigation_primary inline="true"]' ); ?>
			</div>
		</header>