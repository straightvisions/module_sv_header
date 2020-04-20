<?php
	namespace sv100;
	
	/**
	 * @version         4.162
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
				->register_sidebars()
				->set_section_title( __( 'Header', 'sv100' ) )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				->set_section_order(20)
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_header {
			// Position & Alignment
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
				->set_is_responsive(true)
				 ->load_type( 'select' );

			$this->get_setting( 'alignment' )
				->set_title( __( 'Content Alignment', 'sv100' ) )
				->set_options( array(
					'left'		=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'right'			=> __( 'Right', 'sv100' ),
					'spread'		=> __( 'Spread', 'sv100' ),
				) )
				->set_default_value( 'center' )
				->load_type( 'select' );

			$this->get_setting('margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			// Background
			$this->get_setting( 'bg_color' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '255,255,255,1' )
				->set_is_responsive(true)
				 ->load_type( 'color' );

			// Box Shadow
			$this->get_setting('box_shadow_color')
				->set_title( __( 'Box Shadow Color', 'sv100' ) )
				->set_description( __( 'Color of the box shadow.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'color' );

			$this->get_setting( 'branding_order' )
				->set_title( __( 'Branding Order Position', 'sv100' ) )
				->set_options( array(
					'1'		=> __( '1', 'sv100' ),
					'2'	=> __( '2', 'sv100' ),
					'3'	=> __( '3', 'sv100' )
				) )
				->set_default_value( '1' )
				->load_type( 'select' );

			$this->get_setting( 'navigation_order' )
				->set_title( __( 'Menu Order Position', 'sv100' ) )
				->set_options( array(
					'1'		=> __( '1', 'sv100' ),
					'2'	=> __( '2', 'sv100' ),
					'3'	=> __( '3', 'sv100' )
				) )
				->set_default_value( '2' )
				->load_type( 'select' );
			
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

			$this->get_script( 'sidebar_default' )
				->set_path( 'lib/frontend/css/sidebar_default.css' )
				->set_inline( true );

			// Inline Config
			$this->get_script( 'inline_config' )
				 ->set_path( 'lib/frontend/css/config.php' )
				 ->set_inline( true );
	
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
							'name'      => 'default',
							'scripts'   => array(),
						);
						break;
					default:
						$template = array(
							'name'      => 'default',
							'scripts'   => array(
								$this->get_script( 'default' )->set_inline( $settings['inline'] ),
								$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] )
							),
						);
						break;
				}
			} else {
				$template = array(
					'name'      => 'default',
					'scripts'   => array(
						$this->get_script( 'default' )->set_inline( $settings['inline'] ),
						$this->get_script( 'sidebar_default' )->set_inline( $settings['inline'] )
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

			return boolval( $this->get_module( 'sv_common' )->get_setting( 'mobile_zoom' )->get_data() );
		}
	}