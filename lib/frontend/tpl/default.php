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
        <?php
            /* manual order to fix order-first-child-css bug */
            $branding_order     = (int)$this->get_setting('branding_order')->run_type()->get_data();
            $navigation_order   = (int)$this->get_setting('navigation_order')->run_type()->get_data();
            $sidebar_order      = (int)$this->get_setting('sidebar_order')->run_type()->get_data();

            $arr_order          = array(
                $branding_order     => 'lib/frontend/tpl/part_branding.php',
                $navigation_order   => 'lib/frontend/tpl/part_navigation.php',
                $sidebar_order      => 'lib/frontend/tpl/part_sidebar.php',
            );
            ksort($arr_order);
            foreach($arr_order as $path){
                include( $this->get_path( $path ) );
            }
            ?>
    </div>
</header>