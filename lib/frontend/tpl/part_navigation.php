<?php

    if( $this->get_setting( 'navigation_active' )->get_data() == 1 ){
        echo $this->get_root()->get_module( 'sv_navigation' )
            ? $this->get_root()->get_module( 'sv_navigation' )->load( array(
                'location' 		=> $this->get_module_name() . '_primary',
                'show_images'	=> isset($template['show_images']) ? $template['show_images'] : false,
            ) )
            : '';
    }
