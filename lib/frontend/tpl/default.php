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
                <a href="<?php echo get_home_url(); ?>">
                    <img src="<?php echo $this->get_url( 'lib/frontend/img/logo.svg' ); ?>" alt="Logo"
                         class="<?php echo $this->get_prefix( 'branding' ); ?>">
                </a>
                <?php echo do_shortcode( '[sv_navigation location="' . $this->get_module_name() . '" show_images="1"]' ); ?>
                <aside class="<?php echo $this->get_prefix( 'sidebar' ); ?>">
                    <?php echo do_shortcode( '[sv_sidebar id="' . $this->get_module_name() . '"]' ); ?>
                </aside>
            </div>
        </header>