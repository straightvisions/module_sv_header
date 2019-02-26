<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<header class="<?php echo $this->get_prefix(); ?>">
			<div class="<?php echo $this->get_prefix( 'bar' ); ?>">
				<div class="<?php echo $this->get_prefix( 'branding' ); ?>">
					<!-- <img src="https://media-straightvisions.com/2018/02/logo-x35.png" /> -->
				</div>
				<?php echo do_shortcode( '[sv_navigation_primary inline="true"]' ); ?>
				<div class="<?php echo $this->get_prefix( 'search' ); ?>">
					<!-- <input type="text" placeholder="Search.."> -->
				</div>
			</div>
		</header>