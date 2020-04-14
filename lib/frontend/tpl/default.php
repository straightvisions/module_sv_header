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
<?php if($this->get_setting('template') != 'no_header'){ ?>
<header class="<?php echo $this->get_prefix(); ?>">
    <div class="<?php echo $this->get_prefix( 'bar' ); ?>">
        <?php
            /* manual order to fix order-first-child-css bug */
            $branding_order     = (int)$this->get_setting('branding_order')->get_data();
            $navigation_order   = (int)$this->get_setting('navigation_order')->get_data();
            $sidebar_order      = (int)$this->get_setting('sidebar_order')->get_data();

            echo $this->get_module('sv_branding')->load();
			echo $this->get_module('sv_header_menu')->load();

            // @todo: load modules instead of file include
            $arr_order          = array(
                //$branding_order     => '',
                //$navigation_order   => '',
                $sidebar_order      => 'lib/frontend/tpl/part_sidebar.php',
            );
            ksort($arr_order);
            foreach($arr_order as $path){
                include( $this->get_path( $path ) );
            }
            ?>
    </div>
</header>
<?php } ?>