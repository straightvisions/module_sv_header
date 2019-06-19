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
		$settings['template'] === 'slider'
		&& isset( $this->get_root()->sv_posts )
		&& isset( $this->get_root()->sv_slick )
	) {
		if ( is_home() && $this->get_root()->sv_content->get_setting( 'home_slider' )->run_type()->get_data() !== '1' ) {
			$shortcode = do_shortcode( '[sv_posts slider="1" image="1" show_image="1"]' );
		} else {
			$shortcode = do_shortcode( '[sv_posts slider="1" image="1" show_image="1"]' );
		}
	}
?>

<body <?php body_class(); ?>>
<header class="<?php echo $this->get_prefix(); echo isset( $shortcode ) && ! empty( $shortcode ) ? ' ' . $this->get_prefix( 'slider' ) : ''; ?>">
    <div class="<?php echo $this->get_prefix( 'bar' ); ?>">
        <a href="<?php echo home_url(); ?>" class="<?php echo $this->get_prefix( 'branding' ); ?>">
			<?php
				if ( $this->get_module('sv_logo')) {
					echo $this->get_module('sv_logo')->load();
				} else {
					echo '<h3 class="' . $this->get_prefix( 'website_name' ) .'">' . get_bloginfo( 'name' ) . '</h2>';
					
					if ( ! empty( get_bloginfo( 'description' ) ) ) {
						echo '<h6 class="' . $this->get_prefix( 'website_desc' ) .'">' . get_bloginfo( 'description' ) . '</h2>';
					}
				}
			?>
        </a>
		<?php
			echo $this->get_root()->get_module( 'sv_navigation' )
				? $this->get_root()->get_module( 'sv_navigation' )->load( array(
					'location' 		=> $this->get_module_name(),
					'show_images'	=> true,
				) )
				: '';
			
			?>
        <aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>">
			<?php
				echo $this->get_root()->get_module( 'sv_sidebar' )
					? $this->get_root()->get_module( 'sv_sidebar' )->load( array(
						'id' 			=> $this->get_module_name(),
					) )
					: '';
			?>
        </aside>
    </div>
</header>