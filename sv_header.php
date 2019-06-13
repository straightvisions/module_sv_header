<?php
namespace sv_100;

/**
 * @version         1.00
 * @author			straightvisions GmbH
 * @package			sv_100
 * @copyright		2017 straightvisions GmbH
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */

class sv_header extends init {
	public function init() {
		// Module Info
		$this->set_module_title( 'SV Header' );
		$this->set_module_desc( __( 'This module gives the ability to display the header via the "[sv_header]" shortcode.', 'sv_100' ) );
		
		$this->register_scripts()->register_navs()->register_sidebars();
		
		if ( $this->is_first_load() ) {
			add_action( 'wp_loaded', array( $this, 'add_widgets' ) );
			$this->first_load();
		}
	}
	
	protected function first_load(): sv_header {
		$this->get_root()
			->sv_navigation
			->create_menu( $this )
			->set_menu_name( __( 'Main Menu', 'sv_100' ) )
			->set_menu_item( array(
			   'menu-item-title'	=> 'Home',
			   'menu-item-type'		=> 'custom',
			   'menu-item-url'		=> $_SERVER['REQUEST_URI'],
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
			->clear_sidebar( 'sv_100_sv_sidebar_sv_header' )
			->add_widget_to_sidebar( 'search', 'sv_100_sv_sidebar_sv_header' );
	}

	protected function register_scripts() :sv_header {
		// Register Styles
		$this->scripts_queue['default']			= static::$scripts
			->create( $this )
			->set_ID( 'default' )
			->set_path( 'lib/frontend/css/default.css' )
			->set_inline( true );

		$this->scripts_queue['home']			= static::$scripts
			->create( $this )
			->set_ID( 'home' )
			->set_path( 'lib/frontend/css/home.css' )
			->set_inline( true );

		$this->scripts_queue['navigation_default']			= static::$scripts
			->create( $this )
			->set_ID( 'navigation_default' )
			->set_path( 'lib/frontend/css/navigation_default.css' )
			->set_inline( true );

		$this->scripts_queue['navigation_home']		= static::$scripts
			->create( $this )
			->set_ID( 'navigation_home' )
			->set_path( 'lib/frontend/css/navigation_home.css' )
			->set_inline( true );

		$this->scripts_queue['sidebar_default']			    = static::$scripts
			->create( $this )
			->set_ID( 'sidebar_default' )
			->set_path( 'lib/frontend/css/sidebar_default.css' )
			->set_inline( true );

		$this->scripts_queue['sidebar_home']			= static::$scripts
			->create( $this )
			->set_ID( 'sidebar_home' )
			->set_path( 'lib/frontend/css/sidebar_home.css' )
			->set_inline( true );

		// Register Scripts
		$this->scripts_queue['navigation_mobile']			= static::$scripts
			->create( $this )
			->set_ID( 'navigation_mobile' )
			->set_path( 'lib/frontend/js/navigation_mobile.js' )
			->set_type( 'js' );

		return $this;
	}

	protected function register_navs(): sv_header {
		if ( isset( $this->get_root()->sv_navigation ) ) {
			$this->get_root()
				->sv_navigation
				->create( $this )
				->set_desc( __( 'Primary Menu', 'sv_100' ) )
				->load_nav();
		}

		return $this;
	}

	protected function register_sidebars(): sv_header {
		if ( isset( $this->get_root()->sv_sidebar ) ) {
			$this->get_root()
				 ->sv_sidebar
				 ->create( $this )
				 ->set_title( __( 'Header', 'sv_100' ) )
				 ->set_desc( __( 'Widgets in this area will be shown in the header, next to the navigation.', 'sv_100' ) )
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
				case 'home':
					$template = array(
						'name'      => 'home',
						'scripts'   => array(
							$this->scripts_queue[ 'default' ]->set_inline( $settings['inline'] ),
							$this->scripts_queue[ 'home' ]->set_inline( $settings['inline'] ),
							$this->scripts_queue[ 'navigation_default' ]->set_inline( $settings['inline'] ),
							$this->scripts_queue[ 'navigation_home' ]->set_inline( $settings['inline'] ),
							$this->scripts_queue[ 'sidebar_default' ]->set_inline( $settings['inline'] ),
							$this->scripts_queue[ 'sidebar_home' ]->set_inline( $settings['inline'] ),
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

		return $this->load_template( $template, $settings );
	}

	// Loads the templates
	protected function load_template( array $template, array $settings ): string {
		ob_start();
		foreach ( $template['scripts'] as $script ) {
			$script->set_is_enqueued();
		}

		// Loads the template
		include ( $this->get_path('lib/frontend/tpl/' . $template['name'] . '.php' ) );
		$output							        = ob_get_contents();
		ob_end_clean();

		return $output;
	}
}