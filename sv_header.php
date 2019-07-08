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
			$this->settings_draft_font()->settings_draft_background();
			
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