<?php
	namespace sv100;

	class sv_header extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header', 'sv100' ) )
				->set_module_desc( __( 'Manages the header.', 'sv100' ) )
				->set_css_cache_active()
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_type( 'settings' )
				->set_section_template_path()
				->set_section_order(2100)
				->load_settings()
				->register_scripts()
				->register_sidebars()
				->get_root()
				->add_section( $this );
		}
		
		protected function load_settings(): sv_header {
			// Position & Alignment
			// Max Width
			$this->get_setting( 'max_width_wrapper' )
				->set_title( __( 'Max Width Wrapper', 'sv100' ) )
				->set_description( __( 'Set the max width of the header wrapper.', 'sv100' ) )
				->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'max_width' )
				->set_title( __( 'Max Width Inner', 'sv100' ) )
				->set_description( __( 'Set the max width of the header.', 'sv100' ) )
				->set_options( $this->get_module('sv_common') ? $this->get_module('sv_common')->get_max_width_options() : array('' => __('Please activate module SV Common for this Feature.', 'sv100')) )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'select' );

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
					'flex-start'		=> __( 'Left', 'sv100' ),
					'center'			=> __( 'Center', 'sv100' ),
					'flex-end'			=> __( 'Right', 'sv100' ),
					'space-between'		=> __( 'Space Between', 'sv100' ),
				) )
				->set_default_value( 'center' )
				->set_description( __( 'On desktop, spread is the same as center.', 'sv100' ) )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting('margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->set_default_value(array(
					'top'		=> '0',
					'right'		=> 'auto',
					'bottom'	=> '0',
					'left'		=> 'auto'
				))
				->load_type('margin');

			$this->get_setting('padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->set_default_value( array(
					'top' => '15px',
					'right' => '15px',
					'bottom' => '15px',
					'left' => '15px',
				) )
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
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'branding_alignment' )
				->set_title( __( 'Branding Alignment', 'sv100' ) )
				->set_options( array(
					'flex-start'	=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'flex-end'		=> __( 'Right', 'sv100' )
				) )
				->set_default_value( 'left' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navigation_order' )
				->set_title( __( 'Menu Order Position', 'sv100' ) )
				->set_options( array(
					'1'		=> __( '1', 'sv100' ),
					'2'	=> __( '2', 'sv100' ),
					'3'	=> __( '3', 'sv100' )
				) )
				->set_default_value( '2' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'navigation_alignment' )
				->set_title( __( 'Menu Alignment', 'sv100' ) )
				->set_options( array(
					'flex-start'	=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'flex-end'		=> __( 'Right', 'sv100' )
				) )
				->set_default_value( 'flex-end' )
				->set_is_responsive(true)
				->load_type( 'select' );
			
			// sidebar order settings
            $this->get_setting( 'sidebar_active' )
                ->set_title( __( 'Show Header Sidebar', 'sv100' ) )
                ->set_options( array(
                    '1'	=> __( 'Yes', 'sv100' ),
                    '0'	=> __( 'No', 'sv100' ),
                ) )
                ->set_default_value( '1' )
				->set_is_responsive(true)
                ->load_type( 'select' );

            $this->get_setting( 'sidebar_order' )
                ->set_title( __( 'Sidebar Order Position', 'sv100' ) )
                ->set_options( array(
                    '1'		=> __( '1', 'sv100' ),
                    '2'	=> __( '2', 'sv100' ),
                    '3'	=> __( '3', 'sv100' )
                ) )
                ->set_default_value( '3' )
				->set_is_responsive(true)
                ->load_type( 'select' );

			$this->get_setting( 'sidebar_alignment' )
				->set_title( __( 'Sidebar Alignment', 'sv100' ) )
				->set_options( array(
					'flex-start'	=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'flex-end'		=> __( 'Right', 'sv100' )
				) )
				->set_default_value( 'right' )
				->set_is_responsive(true)
				->load_type( 'select' );

			$this->get_setting( 'sidebar_max_width' )
				->set_title( __( 'Max Width Sidebar', 'sv100' ) )
				->set_description( __( 'Set the max width of the header sidebar.', 'sv100' ) )
				->set_default_value( '100%' )
				->set_is_responsive(true)
				->load_type( 'text' );

			$this->get_setting('sidebar_margin')
				->set_title(__('Margin', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');

			$this->get_setting('sidebar_padding')
				->set_title(__('Padding', 'sv100'))
				->set_is_responsive(true)
				->load_type('margin');
			
			return $this;
		}
	
		protected function register_scripts(): sv_header {
			parent::register_scripts();

			// Register Styles
			$this->get_script( 'sidebar_default' )
				->set_path( 'lib/css/common/sidebar.css' )
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

		public function enqueue_scripts(): sv_header {
			if ( $this->has_sidebar_content() ) {
				foreach($this->get_scripts() as $script){
					$script->set_inline(true)->set_is_enqueued();
				}
			}else{
				$this->get_script( 'common' )->set_inline(true)->set_is_enqueued();
				$this->get_script( 'config' )->set_inline(true)->set_is_enqueued();
			}

			return $this;
		}

		public function load( $settings = array() ): string {
			$this->enqueue_scripts();

			ob_start();
			require ( $this->get_path('lib/tpl/frontend/default.php' ) );
			$output							= ob_get_clean();

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