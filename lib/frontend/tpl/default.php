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