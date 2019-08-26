<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php echo get_bloginfo( 'charset' ); ?>" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
	<?php wp_head(); ?>
</head>

<?php
	// Checks if slider has posts and is home
	$slider_support = $settings['template'] === 'slider' ? true : false;
?>

<body <?php body_class(); ?>>
<header class="<?php echo $this->get_prefix(); echo $slider_support ? ' ' . $this->get_prefix( 'slider' ) : ''; ?>">
    <div class="<?php echo $this->get_prefix( 'bar' ); ?>">
		<?php if ( $this->get_setting( 'branding' )->run_type()->get_data() ) { ?>
			<div class="<?php echo $this->get_prefix( 'branding' ); ?>">
				<?php
                    if ( get_header_image() ) {
                    	echo '<a href="' . get_home_url() . '">
                    		<img src="' . get_header_image() . '" alt="' . get_bloginfo( 'title' ) . '" />
                    		</a>';
					} elseif ( get_custom_logo() ) {
                        echo get_custom_logo();
                    } else {
                        $post_title = empty( $this->get_setting( 'branding_title' )->run_type()->get_data() )
                            ? get_bloginfo( 'name' )
                            : $this->get_setting( 'branding_title' )->run_type()->get_data();
                        echo '<a href="' . home_url() . '" class="' . $this->get_prefix( 'website_title' ) . '">
                                <h3>' . $post_title . '</h3>
                                </a>';
                    }
				?>
			</div>
			<?php
		}
		
		echo $this->get_root()->get_module( 'sv_navigation' )
			? $this->get_root()->get_module( 'sv_navigation' )->load( array(
				'location' 		=> $this->get_module_name() . '_primary',
				'show_images'	=> true,
			) )
			: '';
		
		if (
			$this->get_root()->get_module( 'sv_sidebar' )
			&& ! empty(
					$this->get_root()->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name(), ) )
				)
			) {
			
			?>
        <aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>">
			<?php
				echo $this->get_root()->get_module( 'sv_sidebar' )
									  ->load( array( 'id' => $this->get_module_name(), ) );
			?>
        </aside>
		<?php } ?>
    </div>
</header>