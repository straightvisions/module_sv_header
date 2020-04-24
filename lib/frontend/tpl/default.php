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
		    echo $this->get_module('sv_branding')->load();
		    echo $this->get_module('sv_header_menu')->load();
		    include($this->get_path('lib/frontend/tpl/part_sidebar.php'));
            ?>
    </div>
</header>
<?php } ?>