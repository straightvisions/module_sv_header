<?php
	namespace sv100;
	
	/**
	 * @version         4.160
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_header extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header', 'sv100' ) )
				 ->set_module_desc( __( 'Manages the header.', 'sv100' ) )
				 ->load_settings()
				 ->register_scripts()
				 ->register_navs()
				 ->register_sidebars()
				 ->set_section_title( __( 'Header', 'sv100' ) )
				 ->set_section_desc( __( 'Text, Color & Branding settings.', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
		}
		
		protected function load_settings(): sv_header {
			// Header - Position & Alignment
			$this->get_setting( 'position' )
				 ->set_title( __( 'Position', 'sv100' ) )
				->set_description( __( 'The header bar behavior when scrolling down the page.', 'sv100' ) )
				 ->set_options( array(
				 	'relative'		=> __( 'Static', 'sv100' ),
					 'absolute'		=> __( 'Absolute', 'sv100' ),
					'fixed'			=> __( 'Fixed', 'sv100' ),
					'sticky'		=> __( 'Sticky', 'sv100' )
				 ) )
				 ->set_default_value( 'relative' )
				 ->load_type( 'select' );

			$this->get_setting( 'box_content_alignment' )
				->set_title( __( 'Content Alignment', 'sv100' ) )
				->set_options( array(
					'left'		=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'right'			=> __( 'Right', 'sv100' ),
					'spread'		=> __( 'Spread', 'sv100' ),
				) )
				->set_default_value( 'center' )
				->load_type( 'select' );

			$this->get_setting('box_margin_top')
				->set_title( __( 'Top Margin', 'sv100' ) )
				->set_description( __( 'Top Margin in Pixel for Headerbox.', 'sv100' ) )
				->set_default_value( 0 )
				->load_type( 'number' );

			$this->get_setting('box_margin_bottom')
				->set_title( __( 'Bottom Margin', 'sv100' ) )
				->set_description( __( 'Bottom Margin in Pixel for Headerbox.', 'sv100' ) )
				->set_default_value( 0 )
				->load_type( 'number' );
			
			// Header (Desktop) - Padding
			$this->get_setting('header_padding')
				 ->set_title(__('Padding (Desktop)', 'sv100'))
				 ->load_type('margin');
			
			// Header (Mobile) - Padding
			$this->get_setting('header_padding_mobile')
				 ->set_title(__('Padding (Mobile)', 'sv100'))
				 ->load_type('margin');

			// Header - Fonts & Colors
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'line_height','line_height', 1 );
			$this->get_settings_component( 'text_color','text_color', '#1e1e1e' );
			$this->get_settings_component( 'highlight_color','highlight_color', '#328ce6' );
			
			// Header - Background
			$this->get_settings_component( 'bg_color','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size', 'large' );
			$this->get_settings_component( 'bg_position','background_position', 'center top' );
			$this->get_settings_component( 'bg_size','background_size', 0 );
			$this->get_settings_component( 'bg_fit','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment', 'fixed' );

			// Header - Box Shadow
			$this->get_setting('box_shadow_color')
				->set_title( __( 'Box Shadow Color', 'sv100' ) )
				->set_description( __( 'Color of the box shadow.', 'sv100' ) )
				->load_type( 'color' );

			// Branding
			$this->get_setting( 'branding' )
				->set_title( __( 'Branding', 'sv100' ) )
				->set_description( __( 'Activate or deactivate branding in the header.', 'sv100' ) )
				->set_default_value( 1 )
				->load_type( 'checkbox' );

			$this->get_setting( 'branding_title' )
				->set_title( __( 'Title', 'sv100' ) )
				->set_description(
					__(
						'On default the title will be your website title,
				 	but you can change the title that will be displayed in your header.',
						'sv100'
					)
				)
				->set_default_value( get_bloginfo( 'name' ) )
				->load_type( 'text' );

			$this->get_setting( 'branding_order' )
				->set_title( __( 'Order Position', 'sv100' ) )
				->set_options( array(
					'1'		=> __( '1', 'sv100' ),
					'2'	=> __( '2', 'sv100' ),
					'3'	=> __( '3', 'sv100' )
				) )
				->set_default_value( '1' )
				->load_type( 'select' );

			$this->get_setting( 'branding_logo_width' )
				->set_title( __( 'Logo width', 'sv100' ) )
				->set_description( __( 'Width in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'branding_logo_height' )
				->set_title( __( 'Logo height', 'sv100' ) )
				->set_description( __( 'Height in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'branding_logo_width_mobile' )
				->set_title( __( 'Logo width (mobile)', 'sv100' ) )
				->set_description( __( 'Width in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

			$this->get_setting( 'branding_logo_height_mobile' )
				->set_title( __( 'Logo height (mobile)', 'sv100' ) )
				->set_description( __( 'Height in pixel. 0 = auto', 'sv100' ) )
				->set_default_value( 0 )
				->set_min( 0 )
				->load_type( 'number' );

            // Menu (Desktop)
			$this->get_setting( 'navigation_active' )
				->set_title( __( 'Show Navigation', 'sv100' ) )
				->set_options( array(
					'1'	=> __( 'Yes', 'sv100' ),
					'0'	=> __( 'No', 'sv100' ),
				) )
				->set_default_value( '1' )
				->load_type( 'select' );

            $this->get_setting( 'navigation_order' )
                ->set_title( __( 'Order Position', 'sv100' ) )
                ->set_options( array(
                    '1'		=> __( '1', 'sv100' ),
                    '2'	=> __( '2', 'sv100' ),
                    '3'	=> __( '3', 'sv100' )
                ) )
                ->set_default_value( '2' )
                ->load_type( 'select' );

            // Menu (Desktop) - Background
			$this->get_setting( 'border_radius_menu' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );
			$this->get_settings_component( 'bg_color_menu','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image_menu','background_image' );
			$this->get_settings_component( 'bg_media_size_menu','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position_menu','background_position', 'center top' );
			$this->get_settings_component( 'bg_size_menu','background_size', 0 );
			$this->get_settings_component( 'bg_fit_menu','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat_menu','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment_menu','background_attachment', 'fixed' );

			// Menu (Desktop) - Padding
			$this->get_setting('menu_padding')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Menu (Desktop) - Items - Spacing
			$this->get_setting('menu_item_margin')
				->set_title(__('Margin', 'sv100'))
				->load_type('margin');
			$this->get_setting('menu_item_padding')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Menu (Desktop) - Items - Fonts & Colors
			$this->get_settings_component( 'font_family_menu','font_family' );
			$this->get_settings_component( 'font_size_menu','font_size', 16 );
			$this->get_settings_component( 'line_height_menu','line_height', 1 );
			$this->get_settings_component( 'text_deco_menu','text_decoration', 'none' );
			$this->get_settings_component( 'text_color_menu','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_menu','background_color', '#ffffff' );
			$this->get_setting( 'border_radius_menu_item' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );

			// Menu (Desktop) - Items - Fonts & Colors (Hover/Focus)
			$this->get_settings_component( 'text_deco_menu_hover','text_decoration', 'underline' );
			$this->get_settings_component( 'text_color_menu_hover','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_menu_hover','background_color', '#ffffff' );

			// Submenu (Desktop) - Background
			$this->get_setting( 'border_radius_sub' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );
			$this->get_settings_component( 'bg_color_sub','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image_sub','background_image' );
			$this->get_settings_component( 'bg_media_size_sub','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position_sub','background_position', 'center top' );
			$this->get_settings_component( 'bg_size_sub','background_size', 0 );
			$this->get_settings_component( 'bg_fit_sub','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat_sub','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment_sub','background_attachment', 'fixed' );

			// Submenu (Desktop) - Padding
			$this->get_setting('sub_padding')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Submenu (Desktop) - Items - Spacing
			$this->get_setting('sub_item_margin')
				->set_title(__('Margin', 'sv100'))
				->load_type('margin');
			$this->get_setting('sub_item_padding')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Submenu (Desktop) - Items - Thumbnail
			$this->get_setting( 'show_thumbnail_sub' )
				->set_title( __( 'Show Thubmnail', 'sv100' ) )
				->set_default_value( 0 )
				->load_type( 'checkbox' );

			// Submenu (Desktop) - Items - Fonts & Colors
			$this->get_settings_component( 'font_family_sub','font_family' );
			$this->get_settings_component( 'font_size_sub','font_size', 16 );
			$this->get_settings_component( 'line_height_sub','line_height', 1 );
			$this->get_settings_component( 'text_color_sub','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub','background_color', '#ffffff' );
			$this->get_settings_component( 'text_deco_sub','text_decoration', 'none' );
			$this->get_setting( 'border_radius_sub_item' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );

			// Submenu (Desktop) - Items - Fonts & Colors (Hover/Focus)
			$this->get_settings_component( 'text_color_sub_hover','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub_hover','background_color', '#ffffff' );
			$this->get_settings_component( 'text_deco_sub_hover','text_decoration', 'underline' );

			// Menu (Mobile) - Icon
			$this->get_setting( 'menu_icon_size' )
				->set_title( __( 'Menu Icon Size', 'sv100_companion' ) )
				->set_description( __( 'Size in pixel.', 'sv100_companion' ) )
				->set_min( '0' )
				->set_default_value( '18' )
				->load_type( 'number' );

			$this->get_setting( 'menu_icon_closed' )
				->set_title( __( 'Menu Icon (Closed)', 'sv100_companion' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100_companion' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>' )
				->load_type( 'textarea' );

			$this->get_setting( 'menu_icon_open' )
				->set_title( __( 'Menu Icon (Open)', 'sv100_companion' ) )
				->set_description( __( 'Here you can post the SVG embed code.', 'sv100_companion' ) )
				->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>' )
				->load_type( 'textarea' );

			$this->get_setting( 'menu_icon_closed_color' )
				->set_title( __( 'Menu Icon Color (Closed)', 'sv100' ) )
				->set_default_value( '#1e1e1e' )
				->load_type( 'color' );

			$this->get_setting( 'menu_icon_open_color' )
				->set_title( __( 'Menu Icon Color (Open)', 'sv100' ) )
				->set_default_value( '#1e1e1e' )
				->load_type( 'color' );

			// Menu (Mobile) - Padding
			$this->get_setting('menu_padding_mobile')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Menu (Mobile) - Background
			$this->get_setting( 'border_radius_menu_mobile' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );
			$this->get_settings_component( 'bg_color_menu_mobile','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image_menu_mobile','background_image' );
			$this->get_settings_component( 'bg_media_size_menu_mobile','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position_menu_mobile','background_position', 'center top' );
			$this->get_settings_component( 'bg_size_menu_mobile','background_size', 0 );
			$this->get_settings_component( 'bg_fit_menu_mobile','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat_menu_mobile','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment_menu_mobile','background_attachment', 'fixed' );
			$this->get_setting( 'border_radius_menu_item_mobile' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );

			// Menu (Mobile) - Items - Spacing
			$this->get_setting('menu_item_margin_mobile')
				->set_title(__('Margin', 'sv100'))
				->load_type('margin');
			$this->get_setting('menu_item_padding_mobile')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Menu (Mobile) - Items - Fonts & Colors
			$this->get_settings_component( 'font_size_menu_mobile','font_size', 16 );
			$this->get_settings_component( 'line_height_menu_mobile','line_height', 1 );
			$this->get_settings_component( 'text_deco_menu_mobile','text_decoration', 'none' );
			$this->get_settings_component( 'text_color_menu_mobile','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_menu_mobile','background_color', '#ffffff' );

			// Menu (Mobile) - Items - Fonts & Colors (Hover/Focus)
			$this->get_settings_component( 'text_deco_menu_mobile_hover','text_decoration', 'underline' );
			$this->get_settings_component( 'text_color_menu_mobile_hover','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_menu_mobile_hover','background_color', '#ffffff' );

			// Submenu (Mobile) - Padding
			$this->get_setting('sub_padding_mobile')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Submenu (Mobile) - Background
			$this->get_setting( 'border_radius_sub_mobile' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );
			$this->get_settings_component( 'bg_color_sub_mobile','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image_sub_mobile','background_image' );
			$this->get_settings_component( 'bg_media_size_sub_mobile','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position_sub_mobile','background_position', 'center top' );
			$this->get_settings_component( 'bg_size_sub_mobile','background_size', 0 );
			$this->get_settings_component( 'bg_fit_sub_mobile','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat_sub_mobile','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment_sub_mobile','background_attachment', 'fixed' );

			// Submenu (Mobile) - Items - Spacing
			$this->get_setting('sub_item_margin_mobile')
				->set_title(__('Margin', 'sv100'))
				->load_type('margin');
			$this->get_setting('sub_item_padding_mobile')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Submenu (Mobile) - Items - Thumbnail
			$this->get_setting( 'show_thumbnail_sub_mobile' )
				->set_title( __( 'Show Thubmnail', 'sv100' ) )
				->set_default_value( 0 )
				->load_type( 'checkbox' );

			// Submenu (Mobile) - Items - Fonts & Colors
			$this->get_settings_component( 'font_size_sub_mobile','font_size', 16 );
			$this->get_settings_component( 'line_height_sub_mobile','line_height', 1 );
			$this->get_settings_component( 'text_color_sub_mobile','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub_mobile','background_color', '#ffffff' );
			$this->get_settings_component( 'text_deco_sub_mobile','text_decoration', 'none' );
			$this->get_setting( 'border_radius_sub_item_mobile' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );

			// Submenu (Mobile) - Items - Fonts & Colors (Hover/Focus)
			$this->get_settings_component( 'text_color_sub_mobile_hover','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub_mobile_hover','background_color', '#ffffff' );
			$this->get_settings_component( 'text_deco_sub_mobile_hover','text_decoration', 'underline' );
			
			// sidebar order settings
            $this->get_setting( 'sidebar_active' )
                ->set_title( __( 'Show Header Sidebar', 'sv100' ) )
                ->set_options( array(
                    '1'	=> __( 'Yes', 'sv100' ),
                    '0'	=> __( 'No', 'sv100' ),
                ) )
                ->set_default_value( '1' )
                ->load_type( 'select' );

            $this->get_setting( 'sidebar_order' )
                ->set_title( __( 'Order Position', 'sv100' ) )
                ->set_options( array(
                    '1'		=> __( '1', 'sv100' ),
                    '2'	=> __( '2', 'sv100' ),
                    '3'	=> __( '3', 'sv100' )
                ) )
                ->set_default_value( '3' )
                ->load_type( 'select' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_header {
			// Register Styles
			$this->get_script( 'default' )
				->set_path( 'lib/frontend/css/default.css' )
				->set_inline( true );
	
			$this->get_script( 'navigation_default' )
				->set_path( 'lib/frontend/css/navigation_default.css' )
				->set_inline( true );
	
			$this->get_script( 'sidebar_default' )
				->set_path( 'lib/frontend/css/sidebar_default.css' )
				->set_inline( true );
	
			// Register Scripts
			$this->get_script( 'navigation_js' )
				->set_path( 'lib/frontend/js/navigation.js' )
				->set_type( 'js' )
				->set_deps( array(  'jquery' ) );
			
			// Inline Config
			$this->get_script( 'inline_config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true );
	
			return $this;
		}
	
		protected function register_navs(): sv_header {
			if ( $this->get_module( 'sv_navigation' ) ) {
				$this->get_module( 'sv_navigation' )
					->create( $this )
					->set_desc( __( 'Primary menu', 'sv100' ) )
					->set_location( 'primary' )
					->load_nav();
			}
	
			return $this;
		}
	
		protected function register_sidebars(): sv_header {
			if ( $this->get_module( 'sv_sidebar' ) ) {
				$this->get_module( 'sv_sidebar' )
					->create( $this )
					->set_ID( 'sidebar' )
					->set_title( __( 'Header', 'sv100' ) )
					->set_desc( __( 'Widgets in this sidebar will be shown in the header, next to the navigation.', 'sv100' ) )
					->load_sidebar();
			}
	
			return $this;
		}
		
		public function has_sidebar_content(): bool{
			if(!$this->get_module( 'sv_sidebar' )){
				return false;
			}
			
			$i = false;
			
			if($this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name() . '_sidebar' ) ) ){
				$i = true;
			}
			return $i;
		}
	
		public function load( $settings = array() ): string {
			$settings								= shortcode_atts(
				array(
					'inline'						=> true,
					'template'                      => false,
				),
				$settings,
				$this->get_module_name()
			);
	
			return $this->router( $settings );
		}
	
		// Handles the routing of the templates
		protected function router( array $settings ): string {
			if ( $settings['template'] ) {
				switch ( $settings['template'] ) {
					case 'no_header':
						$template = array(
							'name'      => 'no_header',
							'scripts'   => array(),
						);
						break;
					default:
						$template = array(
							'name'      => 'default',
							'scripts'   => array(
								$this->get_script( 'default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'navigation_default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'navigation_js' ),
							),
						);
						break;
				}
			} else {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->get_script( 'default' )->set_inline( $settings['inline'] ),
						$this->get_script( 'navigation_default' )->set_inline( $settings['inline'] ),
						$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] ),
						$this->get_script( 'navigation_js' ),
					),
				);
			}
			
			// @filter: sv100_sv_header_template
			return $this->load_template(
				apply_filters(
					$this->get_prefix( 'template' ),
					$template, $settings, $this
				), $settings
			);
		}
		
		// Loads the templates
		protected function load_template( array $template, array $settings ): string {
			ob_start();

			foreach ( $template['scripts'] as $script_name =>  $script ) {
				if (
					$script->get_ID() === 'navigation_default' &&
					$this->get_module( 'sv_navigation' )
					&& ! $this->get_module( 'sv_navigation' )->has_items( $this->get_module_name() . '_primary' )
				) {
					continue;
				}

				if (
				$script->get_ID() === 'sidebar_default'
				&& $this->has_sidebar_content()
				) {
					continue;
				}

				$script->set_is_enqueued();
			}

			$this->get_script( 'inline_config' )->set_is_enqueued();
			
			// Loads the template
			$path = isset($template['custom_path'])
				? $template['custom_path']
				: $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' );
			
			require ( $path );
			$output							        = ob_get_contents();
			ob_end_clean();
	
			return $output;
		}
		
		// Returns the settings value "mobile_zoom" from sv_common
		public function get_mobile_zoom(): bool {
			if (
				! $this->get_module( 'sv_common' )
				||
				! $this->get_module( 'sv_common' )->get_settings()['mobile_zoom']
			) return true;

			return boolval( $this->get_module( 'sv_common' )->get_setting( 'mobile_zoom' )->run_type()->get_data() );
		}
	}