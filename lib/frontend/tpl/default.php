<?php

    $header_parts_content = array( 'branding'=>'', 'navigation'=>'', 'sidebar'=>'');
    ob_start();
    include( $this->get_path( 'lib/frontend/tpl/part_branding.php' ) );
    $header_parts_content['branding'] = ob_get_clean();
    ob_start();
    include( $this->get_path( 'lib/frontend/tpl/part_navigation.php' ) );
    $header_parts_content['navigation'] = ob_get_clean();
    ob_start();
    include( $this->get_path( 'lib/frontend/tpl/part_sidebar.php' ) );
    $header_parts_content['sidebar'] = ob_get_clean();

    $header_parts = array(
        'left'  => array(),
        'center'=> array(),
        'right' => array(),
    );

    $branding_alignment     = $script->get_parent()->get_setting( 'branding_alignment' )->run_type()->get_data();
    $navigation_alignment   = $script->get_parent()->get_setting( 'navigation_alignment' )->run_type()->get_data();
    $sidebar_alignment      = $script->get_parent()->get_setting( 'sidebar_alignment' )->run_type()->get_data();

    $header_parts[$branding_alignment][]    = $header_parts_content['branding'];
    $header_parts[$navigation_alignment][]  = $header_parts_content['navigation'];
    $header_parts[$sidebar_alignment][]     = $header_parts_content['sidebar'];

    if($branding_alignment === 'right'){ // give branding priority
        $header_parts[$branding_alignment] = array_reverse( $header_parts[$branding_alignment] ); // branding is first item, so just do a reverse
    }

?>
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
        <?php foreach($header_parts as $part){
            echo implode($part);
        } ?>
    </div>
</header>