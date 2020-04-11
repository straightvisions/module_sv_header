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
				 ->register_navs()
				 ->register_sidebars()
				 ->set_section_title( __( 'Header', 'sv100' ) )
				 ->set_section_desc( $this->get_module_desc() )
				 ->set_section_type( 'settings' )
				 ->set_section_template_path( $this->get_path( 'lib/backend/tpl/settings.php' ) )
				 ->get_root()
				 ->add_section( $this );
		}
		
		protected function load_settings(): sv_header {
			// Header - Position & Alignment (Desktop)
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
			
			$this->get_setting('header_padding')
				 ->set_title(__('Padding (Desktop)', 'sv100'))
				 ->load_type('margin');
			
			// Header - Position & Alignment (Mobile)
			$this->get_setting( 'position_mobile' )
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
			
			$this->get_setting( 'box_content_alignment_mobile' )
				 ->set_title( __( 'Content Alignment', 'sv100' ) )
				 ->set_options( array(
					 'left'		=> __( 'Left', 'sv100' ),
					 'center'		=> __( 'Center', 'sv100' ),
					 'right'			=> __( 'Right', 'sv100' ),
					 'spread'		=> __( 'Spread', 'sv100' ),
				 ) )
				 ->set_default_value( 'center' )
				 ->load_type( 'select' );
			
			$this->get_setting('box_margin_top_mobile')
				 ->set_title( __( 'Top Margin', 'sv100' ) )
				 ->set_description( __( 'Top Margin in Pixel for Headerbox.', 'sv100' ) )
				 ->set_default_value( 0 )
				 ->load_type( 'number' );
			
			$this->get_setting('box_margin_bottom_mobile')
				 ->set_title( __( 'Bottom Margin', 'sv100' ) )
				 ->set_description( __( 'Bottom Margin in Pixel for Headerbox.', 'sv100' ) )
				 ->set_default_value( 0 )
				 ->load_type( 'number' );
			
			$this->get_setting('header_padding_mobile')
				 ->set_title(__('Padding (Mobile)', 'sv100'))
				 ->load_type('margin');

			// Header - Fonts & Colors
			$this->get_setting( 'font_family' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'highlight_color' )
				 ->set_title( __( 'Highlight Color', 'sv100' ) )
				 ->set_description( __( 'This color is used for highlighting elements, like links on hover/focus.', 'sv100' ) )
				 ->set_default_value( '#328ce6' )
				 ->load_type( 'color' );
			
			// Header - Background
			$this->get_setting( 'bg_color' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			// Header - Box Shadow
			$this->get_setting('box_shadow_color')
				->set_title( __( 'Box Shadow Color', 'sv100' ) )
				->set_description( __( 'Color of the box shadow.', 'sv100' ) )
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

			$this->get_setting( 'bg_color_menu' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image_menu' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size_menu' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'medium_large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position_menu' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size_menu' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit_menu' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat_menu' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment_menu' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

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
			$this->get_setting( 'font_family_menu' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size_menu' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_menu' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color_menu' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_color' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			// Menu (Desktop) - Items - Fonts & Colors (Hover/Focus)
			$this->get_setting( 'text_deco_menu_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_color_menu_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_bg_color_menu_hover' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			// Submenu (Desktop) - Background
			$this->get_setting( 'border_radius_sub' )
				->set_title( __( 'Border Radius', 'sv100' ) )
				->set_description( __( 'Border Radius in pixel.', 'sv100' ) )
				->set_min( '0' )
				->set_default_value( '0' )
				->load_type( 'number' );

			$this->get_setting( 'bg_color_sub' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image_sub' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size_sub' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'medium_large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position_sub' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size_sub' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit_sub' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat_sub' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment_sub' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

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
			$this->get_setting( 'font_family_sub' )
				 ->set_title( __( 'Font Family', 'sv100' ) )
				 ->set_description( __( 'Choose a font for your text.', 'sv100' ) )
				 ->set_options( $this->get_module( 'sv_webfontloader' )->get_font_options() )
				 ->load_type( 'select' );

			$this->get_setting( 'font_size_sub' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_sub' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color_sub' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_sub' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_sub' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			// Submenu (Desktop) - Items - Fonts & Colors (Hover/Focus)
			$this->get_setting( 'text_color_sub_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_sub_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_sub_hover' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

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

			$this->get_setting( 'bg_color_menu_mobile' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image_menu_mobile' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size_menu_mobile' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'medium_large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position_menu_mobile' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size_menu_mobile' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit_menu_mobile' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat_menu_mobile' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment_menu_mobile' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			// Menu (Mobile) - Items - Spacing
			$this->get_setting('menu_item_margin_mobile')
				->set_title(__('Margin', 'sv100'))
				->load_type('margin');
			$this->get_setting('menu_item_padding_mobile')
				->set_title(__('Padding', 'sv100'))
				->load_type('margin');

			// Menu (Mobile) - Items - Fonts & Colors
			$this->get_setting( 'font_size_menu_mobile' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_menu_mobile' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color_menu_mobile' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_menu_mobile' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'none' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_menu_mobile' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			// Menu (Mobile) - Items - Fonts & Colors (Hover/Focus)
			$this->get_setting( 'text_deco_menu_mobile_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_menu_mobile_hover' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_color_menu_mobile_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

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

			$this->get_setting( 'bg_color_sub_mobile' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			$this->get_setting( 'bg_image_sub_mobile' )
				 ->set_title( __( 'Background Image', 'sv100' ) )
				 ->load_type( 'upload' );

			$this->get_setting( 'bg_media_size_sub_mobile' )
				 ->set_title( __( 'Background Media Size', 'sv100' ) )
				 ->set_default_value( 'medium_large' )
				 ->set_options( array_combine( get_intermediate_image_sizes(), get_intermediate_image_sizes() ) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_position_sub_mobile' )
				 ->set_title( __( 'Background Position', 'sv100' ) )
				 ->set_default_value( 'center top' )
				 ->set_placeholder( 'center top' )
				 ->load_type( 'text' );

			$this->get_setting( 'bg_size_sub_mobile' )
				 ->set_title( __( 'Background Size', 'sv100' ) )
				 ->set_description( '<p>' . __( 'Background Size in Pixel', 'sv100' ) . '<br>
				 ' . __( 'If disabled Background Fit will take effect.', 'sv100' ) . '</p>
				 <p><strong>' . __( '0 = Disabled', 'sv100' ) . '</strong></p>' )
				 ->set_default_value( 0 )
				 ->set_placeholder( '0 ' )
				 ->set_min( 0 )
				 ->load_type( 'number' );

			$this->get_setting( 'bg_fit_sub_mobile' )
				 ->set_title( __( 'Background Fit', 'sv100' ) )
				 ->set_description( __( 'Defines how the background image aspect ratio behaves.', 'sv100' ) )
				 ->set_default_value( 'cover' )
				 ->set_options( array(
					'cover' 	=> __( 'Cover', 'sv100' ),
					'contain' 	=> __( 'Contain', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_repeat_sub_mobile' )
				 ->set_title( __( 'Background Repeat', 'sv100' ) )
				 ->set_default_value( 'no-repeat' )
				 ->set_options( array(
					'no-repeat' => __( 'No Repeat', 'sv100' ),
					'repeat' 	=> __( 'Repeat', 'sv100' ),
					'repeat-x' 	=> __( 'Repeat Horizontally', 'sv100' ),
					'repeat-y' 	=> __( 'Repeat Vertically', 'sv100' ),
					'space' 	=> __( 'Space', 'sv100' ),
					'round' 	=> __( 'Round', 'sv100' ),
					'initial' 	=> __( 'Initial', 'sv100' ),
					'inherit' 	=> __( 'Inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

			$this->get_setting( 'bg_attachment_sub_mobile' )
				 ->set_title( __( 'Background Attachment', 'sv100' ) )
				 ->set_default_value( 'fixed' )
				 ->set_options( array(
					'fixed' 	=> __( 'fixed', 'sv100' ),
					'scroll' 	=> __( 'scroll', 'sv100' ),
					'local' 	=> __( 'local', 'sv100' ),
					'initial' 	=> __( 'initial', 'sv100' ),
					'inherit' 	=> __( 'inherit', 'sv100' )
				) )
				 ->load_type( 'select' );

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
			$this->get_setting( 'font_size_sub_mobile' )
				 ->set_title( __( 'Font Size', 'sv100' ) )
				 ->set_description( __( 'Font Size in pixel.', 'sv100' ) )
				 ->set_default_value( 16 )
				 ->load_type( 'number' );

			$this->get_setting( 'line_height_sub_mobile' )
				 ->set_title( __( 'Line Height', 'sv100' ) )
				 ->set_description( __( 'Set line height as multiplier or with a unit.', 'sv100' ) )
				 ->set_default_value( 1 )
				 ->load_type( 'text' );

			$this->get_setting( 'text_color_sub_mobile' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_sub_mobile' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'none' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_sub_mobile' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );

			// Submenu (Mobile) - Items - Fonts & Colors (Hover/Focus)
			$this->get_setting( 'text_color_sub_mobile_hover' )
				 ->set_title( __( 'Text Color', 'sv100' ) )
				 ->set_default_value( '#1e1e1e' )
				 ->load_type( 'color' );

			$this->get_setting( 'text_deco_sub_mobile_hover' )
				 ->set_title( __( 'Text Decoration', 'sv100' ) )
				 ->set_default_value( 'underline' )
				 ->set_options( array(
					'none'			=> __( 'None', 'sv100' ),
					'underline'		=> __( 'Underline', 'sv100' ),
					'line-through'	=> __( 'Line Through', 'sv100' ),
					'overline'		=> __( 'Overline', 'sv100' ),
				 ) )
				 ->load_type( 'select' );

			$this->get_setting( 'text_bg_color_sub_mobile_hover' )
				 ->set_title( __( 'Background Color', 'sv100' ) )
				 ->set_default_value( '#ffffff' )
				 ->load_type( 'color' );
			
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
							'name'      => 'default',
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

			return boolval( $this->get_module( 'sv_common' )->get_setting( 'mobile_zoom' )->get_data() );
		}
	}