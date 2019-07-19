<?php
	namespace sv100;
	
	/**
	 * @version         4.000
	 * @author			straightvisions GmbH
	 * @package			sv100
	 * @copyright		2019 straightvisions GmbH
	 * @link			https://straightvisions.com
	 * @since			1.000
	 * @license			See license.txt or https://straightvisions.com
	 */
	
	class sv_header extends init {
		public function init() {
			$this->set_module_title( 'SV Header' )
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
			// Header Settings
			$this->get_settings_component( 'position','position' );
			
			$branding_options = array(
				'disabled' => __( 'No branding', 'sv100' ),
				'title'    => __( 'Title', 'sv100' ),
			);
			
			if ( get_custom_logo() ) {
				$branding_options['logo'] = 'Logo';
			}
			
			// Header Branding Settings
			$this->get_setting( 'branding' )
				 ->set_title( __( 'Branding', 'sv100' ) )
				 ->set_description( '<p>
					' . __( 'Decide in which way you wanna display your brand/website in the header.', 'sv100' ) . '<br>
					' . __( 'If you uploaded a logo in the Customizer, the option', 'sv100' ) .
					' <strong>Logo</strong> ' . __( 'will be available.', 'sv100' ) . '
					</p>'
				 )
				 ->set_default_value( 'title' )
				 ->load_type( 'select' )
				 ->set_options( $branding_options );
			
			$this->get_setting( 'branding_title' )
				 ->set_title( __( 'Title', 'sv100' ) )
				 ->set_description( __( 'On default the title will be your website title, but you can change the title that will be displayed in your header.', 'sv100' ) )
				 ->set_default_value( get_bloginfo( 'name' ) )
				 ->load_type( 'text' );
			
			// Header Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'text_color','text_color', '#1e1e1e' );
			$this->get_settings_component( 'highlight_color','highlight_color', '#328ce6' );
			
			// Header Background Settings
			$this->get_settings_component( 'bg_color','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size', 'large' );
			$this->get_settings_component( 'bg_position','background_position', 'center top' );
			$this->get_settings_component( 'bg_size','background_size', 0 );
			$this->get_settings_component( 'bg_fit','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment', 'fixed' );
			
			// Submenu Item Settings
			$this->get_settings_component( 'text_deco_sub','text_decoration', 'none' );
			$this->get_settings_component( 'font_size_sub','font_size', 14 );
			$this->get_settings_component( 'text_color_sub','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub','background_color', '#ffffff' );
			
			$this->get_setting( 'text_bg_active_sub' )
				 ->set_title( __( 'Activate background color', 'sv100' ) )
				 ->set_default_value( 0 )
				 ->load_type( 'checkbox' );
			
			// Submenu Background Settings
			$this->get_settings_component( 'bg_color_sub','background_color', '#ffffff' );
			$this->get_settings_component( 'bg_image_sub','background_image' );
			$this->get_settings_component( 'bg_media_size_sub','background_media_size', 'medium_large' );
			$this->get_settings_component( 'bg_position_sub','background_position', 'center top' );
			$this->get_settings_component( 'bg_size_sub','background_size', 0 );
			$this->get_settings_component( 'bg_fit_sub','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat_sub','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment_sub','background_attachment', 'fixed' );
			
			// Submenu Item Settings (Hover/Focus)
			$this->get_settings_component( 'text_deco_sub_hover','text_decoration', 'none' );
			$this->get_settings_component( 'text_color_sub_hover','text_color', '#328ce6' );
			$this->get_settings_component( 'text_bg_color_sub_hover','background_color', '#dcf0fa' );
			
			$this->get_setting( 'text_bg_active_sub_hover' )
				 ->set_title( __( 'Activate background color', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'checkbox' );
			
			$this->get_setting( 'menu_icon_closed' )
				 ->set_title( __( 'Menu icon (closed)', 'sv100' ) )
				 ->set_description(
				 	'<p>' . __( 'The menu icon for the mobile menu, when it\'s open.', 'sv100' ) . '<br>'
					. __( 'Please post your SVG embed code below.', 'sv100' ) . '</p>'
				 )
				 ->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>' )
				 ->load_type( 'textarea' );
			
			$this->get_setting( 'menu_icon_closed_color' )
				 ->set_title( __( 'Menu icon (closed) color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'menu_icon_open' )
				 ->set_title( __( 'Menu icon (open)', 'sv100' ) )
				 ->set_description(
				 	'<p>' . __( 'The menu icon for the mobile menu, when it\'s open.', 'sv100' ) . '<br>'
					. __( 'Please post your SVG embed code below.', 'sv100' ) . '</p>'
				 )
				 ->set_default_value( '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>' )
				 ->load_type( 'textarea' );
			
			$this->get_setting( 'menu_icon_open_color' )
				 ->set_title( __( 'Menu icon (open) color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_header {
			// Register Styles
			$this->get_script( 'default' )
				->set_path( 'lib/frontend/css/default.css' )
				->set_inline( true );
	
			$this->get_script( 'slider' )
				->set_path( 'lib/frontend/css/slider.css' )
				->set_inline( true );
	
			$this->get_script( 'navigation_default' )
				->set_path( 'lib/frontend/css/navigation_default.css' )
				->set_inline( true );
	
			$this->get_script( 'navigation_slider' )
				->set_path( 'lib/frontend/css/navigation_slider.css' )
				->set_inline( true );
	
			$this->get_script( 'sidebar_default' )
				->set_path( 'lib/frontend/css/sidebar_default.css' )
				->set_inline( true );
	
			$this->get_script( 'sidebar_slider' )
				->set_path( 'lib/frontend/css/sidebar_slider.css' )
				->set_inline( true );
	
			// Register Scripts
			$this->get_script( 'navigation_mobile' )
				->set_path( 'lib/frontend/js/navigation_mobile.js' )
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
					 ->set_title( __( 'Header', 'sv100' ) )
					 ->set_desc( __( 'Widgets in this sidebar will be shown in the header, next to the navigation.', 'sv100' ) )
					 ->load_sidebar();
			}
	
			return $this;
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
					case 'slider':
						$template = array(
							'name'      => 'slider',
							'scripts'   => array(
								$this->get_script(' default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'slider' )->set_inline( $settings['inline'] ),
								$this->get_script( 'navigation_default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'navigation_slider' )->set_inline( $settings['inline'] ),
								$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'sidebar_slider' )->set_inline( $settings['inline'] ),
								$this->get_script( 'navigation_mobile' ),
							),
						);
						break;
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
								$this->get_script( 'navigation_mobile' ),
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
						$this->get_script( 'navigation_mobile' ),
					),
				);
			}
	
			return $this->load_template( $template, $settings );
		}
		
		// Loads the templates
		protected function load_template( array $template, array $settings ): string {
			ob_start();
			foreach ( $template['scripts'] as $script_name =>  $script ) {
				if (
					( $script->get_ID() == 'navigation_default' || $script->get_ID() == 'navigation_mobile' )
					&& $this->get_module( 'sv_navigation' )
					&& ! $this->get_module( 'sv_navigation' )->has_items( $this->get_module_name() . '_primary' )
				) {
					continue;
				}
				
				$script->set_is_enqueued();
			}
			
			$this->get_script( 'inline_config' )->set_is_enqueued();
			
			// Loads the template
			include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );
			$output							        = ob_get_contents();
			ob_end_clean();
	
			return $output;
		}
	}