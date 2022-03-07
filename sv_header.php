<?php
	namespace sv100;

	class sv_header extends init {
		public function init() {
			$this->set_module_title( __( 'SV Header', 'sv100' ) )
				->set_module_desc( __( 'Manages the header.', 'sv100' ) )
				//->set_css_cache_active() // CSS cache deactivated due to use of metaboxes in this module
				->set_section_title( $this->get_module_title() )
				->set_section_desc( $this->get_module_desc() )
				->set_section_template_path()
				->set_section_order(2100)
				->set_section_icon('<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M6 6h-6v-6h6v6zm9-6h-6v6h6v-6zm9 0h-6v6h6v-6zm0 8h-24v16h24v-16z"/></svg>')
				->load_settings()
				->register_scripts()
				->add_metaboxes()
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

			$this->get_setting( 'direction' )
				->set_title( __( 'Direction', 'sv100' ) )
				->set_options( array(
					'column'			=> __( 'column', 'sv100' ),
					'row'			=> __( 'row', 'sv100' ),
					'column-reverse'			=> __( 'column-reverse', 'sv100' ),
					'row-reverse'		=> __( 'row-reverse', 'sv100' ),
				) )
				->set_default_value( 'row' )
				->set_description( __( 'Set the direction of the areas', 'sv100' ) )
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

			$this->get_setting( 'sidebar' )
				->set_title( __( 'Sidebar', 'sv100' ) )
				->set_description( __( 'Select Sidebar.', 'sv100' ) )
				->set_options( $this->get_module('sv_sidebar') ? $this->get_module('sv_sidebar')->get_sidebars_for_settings_options() : array('' => __('Please activate module SV Sidebar for this Feature.', 'sv100')) )
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
			$this->get_script('config')
				->set_path('lib/css/config/init.php')
				->set_inline(true)
				->set_is_enqueued();

			$this->get_script('common')
				->set_path('lib/css/common/common.css')
				->set_inline(true)
				->set_is_enqueued();

			$this->get_script( 'sidebar' )
				->set_path( 'lib/css/common/sidebar.css' )
				->set_inline(true);

			return $this;
		}

		public function has_sidebar_content(): bool{
			if ( !$this->get_module( 'sv_sidebar' ) ) {
				return false;
			}

			if( $this->get_module( 'sv_sidebar' )->load( $this->get_setting('sidebar')->get_data() ) ) {
				return true;
			}

			return false;
		}

		public function enqueue_scripts(): sv_header {
			foreach($this->get_scripts() as $script){
				$script->set_is_enqueued();
			}

			if(!$this->has_sidebar_content()){
				$this->get_script( 'sidebar' )->set_is_enqueued(false);
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
		private function add_metaboxes(): sv_header{
			$this->metaboxes = $this->get_root()->get_module('sv_metabox');

			$this->metaboxes->get_setting($this->get_prefix('invert_logo'))
				->set_title(__('Invert Logo', 'sv100'))
				->set_description(__('Invert Logo Colors', 'sv100'))
				->load_type('select')
				->set_options(array(
					'' => __('Default', 'sv100'),
					'1' => __('Invert', 'sv100')
				));

			return $this;
		}
		public function invert_logo(): bool {
			global $post;

			if(!$post){
				return false;
			}

			$setting = $this->metaboxes->get_data( $post->ID, $this->get_prefix('invert_logo'), $this->get_setting( 'invert_logo' )->get_data() );

			return $setting;
		}
	}