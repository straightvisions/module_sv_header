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
			// Module Info
			$this->set_module_title( 'SV Header' );
			$this->set_module_desc( __( 'The header for your website.', 'sv100' ) );
			
			// Section Info
			$this->set_section_title( __( 'Header', 'sv100' ) )
				 ->set_section_desc( __( 'The header for your website.', 'sv100' ) )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) );
			
			$this->get_root()->add_section( $this );
			
			$this->load_settings()->register_scripts()->register_navs()->register_sidebars();
			
			// @todo: make this optional and move it to companion plugins -> demo content is plugin territory!
			/*if ( $this->is_first_load() ) {
				add_action( 'wp_loaded', array( $this, 'add_widgets' ) );
				$this->first_load();
			}*/
		}
		
		protected function first_load(): sv_header {
			$this->get_module( 'sv_navigation' )
				->create_menu( $this, 'primary' )
				->set_menu_name( __( 'Main Menu', 'sv100' ) )
				->set_menu_item( array(
				   'menu-item-title'	=> 'Home',
				   'menu-item-type'		=> 'custom',
				   'menu-item-url'		=> get_home_url(),
				   'menu-item-status'	=> 'publish',
				) )
				->set_menu_item( array(
				   'menu-item-title'	=> 'Theme by straightvisions',
				   'menu-item-type'		=> 'custom',
				   'menu-item-url'		=> 'https://straightvisions.com',
				   'menu-item-target'	=> '_blank',
				   'menu-item-status'	=> 'publish',
				) )
				->load_menu();
			
			return $this;
		}
		
		public function add_widgets() {
			$this->get_root()->sv_sidebar
				->clear_sidebar( 'sv100_sv_sidebar_sv_header' )
				->add_widget_to_sidebar( 'search', 'sv100_sv_sidebar_sv_header' );
		}
		
		protected function load_settings(): sv_header {
			// Header Settings
			$this->get_settings_component( 'position','position' );
			
			$branding_options = array(
				'disabled' => __( 'No Branding', 'sv100' ),
				'title'    => __( 'Title', 'sv100' ),
			);
			
			if ( get_custom_logo() ) {
				$branding_options['logo'] = 'Logo';
			}
			
			// Header Branding Settings
			$this->s['branding'] =
				$this->get_setting()
					 ->set_ID( 'branding' )
					 ->set_title( __( 'Branding', 'sv100' ) )
					 ->set_description( '<p>
					' . __( 'Decide in which way you wanna display your brand/website in the header.', 'sv100' ) . '<br>
					' . __( 'If you uploaded a logo in the Customizer, the option', 'sv100' )
					. ' <strong>Logo</strong> ' . __( 'will be available.', 'sv100' ) . '
					</p>' )
					 ->set_default_value( 'title' )
					 ->load_type( 'select' )
					 ->set_options( $branding_options );
			
			$this->s['branding_title'] =
				$this->get_setting()
					 ->set_ID( 'branding_title' )
					 ->set_title( __( 'Title Text', 'sv100' ) )
					 ->set_description( __( 'On default the title will be your Website title, but you can change the title that will be displayed in your header.', 'sv100' ) )
					 ->set_default_value( get_bloginfo( 'name' ) )
					 ->load_type( 'text' );
			
			// Header Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'text_color','text_color', '#1e1f22' );
			
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
			$this->get_settings_component( 'text_color_sub','text_color', '#1e1f22' );
			$this->s['text_bg_active_sub'] =
				$this->get_setting()
					 ->set_ID( 'text_bg_active_sub' )
					 ->set_title( __( 'Activate Background Color', 'sv100' ) )
					 ->set_default_value( 0 )
					 ->load_type( 'checkbox' );
			$this->get_settings_component( 'text_bg_color_sub','background_color', '#ffffff' );
			
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
			$this->get_settings_component( 'text_color_sub_hover','text_color', '#358ae9' );
			$this->s['text_bg_active_sub_hover'] =
				$this->get_setting()
					 ->set_ID( 'text_bg_active_sub_hover' )
					 ->set_title( __( 'Activate Background Color', 'sv100' ) )
					 ->set_default_value( 1 )
					 ->load_type( 'checkbox' );
			$this->get_settings_component( 'text_bg_color_sub_hover','background_color', '#eaf3fd' );
			
			return $this;
		}
	
		protected function register_scripts(): sv_header {
			// Register Styles
			$this->scripts_queue['default']					= static::$scripts
				->create( $this )
				->set_ID( 'default' )
				->set_path( 'lib/frontend/css/default.css' )
				->set_inline( true );
	
			$this->scripts_queue['slider']					= static::$scripts
				->create( $this )
				->set_ID( 'slider' )
				->set_path( 'lib/frontend/css/slider.css' )
				->set_inline( true );
	
			$this->scripts_queue['navigation_default']		= static::$scripts
				->create( $this )
				->set_ID( 'navigation_default' )
				->set_path( 'lib/frontend/css/navigation_default.css' )
				->set_inline( true );
	
			$this->scripts_queue['navigation_slider']		= static::$scripts
				->create( $this )
				->set_ID( 'navigation_slider' )
				->set_path( 'lib/frontend/css/navigation_slider.css' )
				->set_inline( true );
	
			$this->scripts_queue['sidebar_default']			= static::$scripts
				->create( $this )
				->set_ID( 'sidebar_default' )
				->set_path( 'lib/frontend/css/sidebar_default.css' )
				->set_inline( true );
	
			$this->scripts_queue['sidebar_slider']			= static::$scripts
				->create( $this )
				->set_ID( 'sidebar_slider' )
				->set_path( 'lib/frontend/css/sidebar_slider.css' )
				->set_inline( true );
	
			// Register Scripts
			$this->scripts_queue['navigation_mobile']		= static::$scripts
				->create( $this )
				->set_ID( 'navigation_mobile' )
				->set_path( 'lib/frontend/js/navigation_mobile.js' )
				->set_type( 'js' )
				->set_deps( array(  'jquery' ) );
	
			return $this;
		}
	
		protected function register_navs(): sv_header {
			if ( $this->get_module( 'sv_navigation' ) ) {
				$this->get_module( 'sv_navigation' )
					->create( $this )
					->set_desc( __( 'Primary Menu', 'sv100' ) )
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
					 ->set_desc( __( 'Widgets in this area will be shown in the header, next to the navigation.', 'sv100' ) )
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
								$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'slider' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'navigation_default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'navigation_slider' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'sidebar_slider' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'navigation_mobile' ],
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
								$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'navigation_default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
								$this->scripts_queue[ 'navigation_mobile' ],
							),
						);
						break;
				}
			} else {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
						$this->scripts_queue[ 'navigation_default' ]->set_inline( $settings['inline'] ),
						$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
						$this->scripts_queue[ 'navigation_mobile' ],
					),
				);
			}
			
			$this->scripts_queue[ 'inline_config' ] = static::$scripts->create( $this )
																	  ->set_ID('inline_config')
																	  ->set_path( 'lib/frontend/css/config.php' )
																	  ->set_inline(true)
																	  ->set_is_enqueued();
	
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
			
			// Loads the template
			include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );
			$output							        = ob_get_contents();
			ob_end_clean();
	
			return $output;
		}
	}