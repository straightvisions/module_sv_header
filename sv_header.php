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
		public $menu_icon_closed = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 6h-24v-4h24v4zm0 4h-24v4h24v-4zm0 8h-24v4h24v-4z"/></svg>';
		public $menu_icon_open   = '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M24 20.188l-8.315-8.209 8.2-8.282-3.697-3.697-8.212 8.318-8.31-8.203-3.666 3.666 8.321 8.24-8.206 8.313 3.666 3.666 8.237-8.318 8.285 8.203z"/></svg>';

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
			// Header Settings
			$this->get_setting( 'position' )
				 ->set_title( __( 'Position', 'sv100' ) )
				 ->set_options( array(
				 	'relative'		=> __( 'Static', 'sv100' ),
					 'absolute'		=> __( 'Absolute', 'sv100' ),
					'fixed'			=> __( 'Fixed', 'sv100' ),
					'sticky'		=> __( 'Sticky', 'sv100' )
				 ) )
				 ->set_default_value( 'relative' )
				 ->load_type( 'select' );

			$this->get_setting('box_margin_top')
				->set_title( __( 'Top Margin', 'sv100' ) )
				->set_description( __( 'Top Margin in Pixel for Headerbox.', 'sv100' ) )
				->set_default_value( 0 )
				->load_type( 'number' );

			$this->get_setting('box_shadow_opacity')
				->set_title( __( 'Box Shadow Opacity', 'sv100' ) )
				->set_description( __( 'Box Shadow Opacity in percent.', 'sv100' ) )
				->set_default_value( 10 )
				->set_min( 0 )
				->set_max( 100 )
				->load_type( 'number' );

			$this->get_setting( 'box_content_alignment' )
				->set_title( __( 'Content Alignment', 'sv100' ) )
				->set_options( array(
					'left'		=> __( 'Left', 'sv100' ),
					'center'		=> __( 'Center', 'sv100' ),
					'right'			=> __( 'Right', 'sv100' )
				) )
				->set_default_value( 'center' )
				->load_type( 'select' );
			
			// Header Branding Settings
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

            // branding alignment
            $this->get_setting( 'branding_alignment' )
                ->set_title( __( 'Alignment', 'sv100' ) )
                ->set_options( array(
                    'left'		=> __( 'Left', 'sv100' ),
                    'center'	=> __( 'Center', 'sv100' ),
                    'right'	=> __( 'Right', 'sv100' )
                ) )
                ->set_default_value( 'left' )
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
			
			// Header Text Settings
			$this->get_settings_component( 'font_family','font_family' );
			$this->get_settings_component( 'font_size','font_size', 16 );
			$this->get_settings_component( 'text_color','text_color', '#1e1e1e' );
			$this->get_settings_component( 'highlight_color','highlight_color', '#328ce6' );
			
			// Header Background Settings
			$this->get_settings_component( 'bg_color','background_color', '#ffffff' );

			$this->get_setting('bg_color_opacity')
				->set_title( __( 'Background Color Opacity', 'sv100' ) )
				->set_description( __( 'Background Color Opacity in percent.', 'sv100' ) )
				->set_default_value( 30 )
				->set_min( 0 )
				->set_max( 100 )
				->load_type( 'number' );

			$this->get_settings_component( 'bg_image','background_image' );
			$this->get_settings_component( 'bg_media_size','background_media_size', 'large' );
			$this->get_settings_component( 'bg_position','background_position', 'center top' );
			$this->get_settings_component( 'bg_size','background_size', 0 );
			$this->get_settings_component( 'bg_fit','background_fit', 'cover' );
			$this->get_settings_component( 'bg_repeat','background_repeat', 'no-repeat' );
			$this->get_settings_component( 'bg_attachment','background_attachment', 'fixed' );

            // menu alignment
            $this->get_setting( 'navigation_alignment' )
                ->set_title( __( 'Alignment', 'sv100' ) )
                ->set_options( array(
                    'left'		=> __( 'Left', 'sv100' ),
                    'center'	=> __( 'Center', 'sv100' ),
                    'right'	=> __( 'Right', 'sv100' )
                ) )
                ->set_default_value( 'left' )
                ->load_type( 'select' );

			// Menu Item Settings
			$this->get_settings_component( 'text_deco_menu','text_decoration', 'none' );
			$this->get_settings_component( 'text_color_menu','text_color', '#1e1e1e' );

			// Menu Item Settings (Hover/Focus)
			$this->get_settings_component( 'text_deco_menu_hover','text_decoration', 'underline' );
			$this->get_settings_component( 'text_color_menu_hover','text_color', '#1e1e1e' );

			// Submenu Item Settings
			$this->get_settings_component( 'text_deco_sub','text_decoration', 'none' );
			$this->get_settings_component( 'font_size_sub','font_size', 14 );
			$this->get_settings_component( 'text_color_sub','text_color', '#1e1e1e' );
			$this->get_settings_component( 'text_bg_color_sub','background_color', '#ffffff' );
			
			$this->get_setting( 'text_bg_active_sub' )
				 ->set_title( __( 'Activate background color', 'sv100' ) )
				 ->set_default_value( 0 )
				 ->load_type( 'checkbox' );
			
			$this->get_setting( 'show_thumbnail_sub' )
				 ->set_title( __( 'Show Thubmnail', 'sv100' ) )
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
			
			// Mobile Settings
			$this->get_setting( 'menu_icon_closed_color' )
				 ->set_title( __( 'Menu icon (closed) color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'menu_icon_open_color' )
				 ->set_title( __( 'Menu icon (open) color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );
			
			$this->get_setting( 'bg_opacity_mobile' )
				 ->set_title( __( 'Menu background opacity', 'sv100' ) )
				 ->set_description( __( 'Define the background opacity of the mobile menu, in percent.', 'sv100' ) )
				 ->set_default_value( 100 )
				 ->set_max( 100 )
				 ->set_min( 0 )
				 ->load_type( 'number' );

            // sidebar alignment settings
            $this->get_setting( 'sidebar_alignment' )
                ->set_title( __( 'Sidebar', 'sv100' ) )
                ->set_description( __( 'Sidebar alignment within the header.', 'sv100' ) )
                ->set_options( array(
                    'left'		=> __( 'Left', 'sv100' ),
                    'center'	=> __( 'Center', 'sv100' ),
                    'right'	=> __( 'Right', 'sv100' )
                ) )
                ->set_default_value( 'left' )
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
				&& $this->get_module( 'sv_sidebar' )
				&& empty( $this->get_module( 'sv_sidebar' )->load( array( 'id' => $this->get_module_name(), ) ) )
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
			
			include ( $path );
			$output							        = ob_get_contents();
			ob_end_clean();
	
			return $output;
		}
	}