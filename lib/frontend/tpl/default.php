<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<?php wp_head(); ?>
</head>

<?php
	// Checks if slider has posts and is home
	if (
		$this->get_root()->sv_content->s['home_slider']->run_type()->get_data()
		&& isset( $this->get_root()->sv_posts )
		&& isset( $this->get_root()->sv_slick )
		&& is_home()
	) {
		$shortcode = do_shortcode( '[sv_posts slider="1" image="1" show_image="1"]' );
	}
?>

<body <?php body_class(); ?>>
<header class="<?php echo $this->get_prefix(); echo isset( $shortcode ) && ! empty( $shortcode ) ? ' ' . $this->get_prefix( 'home_slider' ) : ''; ?>">
    <div class="<?php echo $this->get_prefix( 'bar' ); ?>">
        <a href="<?php echo home_url(); ?>" class="<?php echo $this->get_prefix( 'branding' ); ?>">
			<?php
				if ( do_shortcode( '[sv_logo]' ) && do_shortcode( '[sv_logo]' ) !== '[sv_logo]' ) {
					echo do_shortcode( '[sv_logo]' );
				} else {
					echo '<h3 class="' . $this->get_prefix( 'website_name' ) .'">' . get_bloginfo( 'name' ) . '</h2>';
					
					if ( ! empty( get_bloginfo( 'description' ) ) ) {
						echo '<h6 class="' . $this->get_prefix( 'website_desc' ) .'">' . get_bloginfo( 'description' ) . '</h2>';
					}
				}
			?>
        </a>
		<?php echo do_shortcode( '[sv_navigation location="' . $this->get_module_name() . '" show_images="1"]' ); ?>
        <aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>">
			<?php echo do_shortcode( '[sv_sidebar id="' . $this->get_module_name() . '"]' ); ?>
        </aside>
    </div>
</header>