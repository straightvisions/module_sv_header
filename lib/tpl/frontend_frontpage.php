<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
		<meta content="width=device-width, initial-scale=1.0" name="viewport" />

		<?php
		wp_head();

		// Load Styles
		$this->scripts_queue['frontend_frontpage']->set_inline($settings['inline'])->set_is_enqueued();
		?>
	</head>
	<body <?php body_class(); ?>>
		<header class="<?php echo $this->get_prefix(); ?>">
			<div class="<?php echo $this->get_prefix( 'bar' ); ?> sv_common_container">
				<?php echo do_shortcode( '[sv_navigation_primary inline="true" template="lib/tpl/frontend_frontpage.php"]' ); ?>
				<aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>">
					<?php
					$this->get_root()->sv_sidebar
						 ->set_css( 'sv_header/lib/css/widgets_frontpage.css', $this->get_module_name() );

					echo do_shortcode( '[sv_sidebar template="' . $this->get_module_name() .'"]' );
					?>
				</aside>
			</div>
		</header>