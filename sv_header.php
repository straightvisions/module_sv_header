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
	protected $favicon							= 0;
	
	public function __construct() {

	}

	public function init() {
		// Translates the module
		load_theme_textdomain( $this->get_module_name(), $this->get_path( 'languages' ) );

		// Module Info
		$this->set_module_title( 'SV Header' );
		$this->set_module_desc( __( 'This module gives the ability to display the header via the "[sv_header]" shortcode.', $this->get_module_name() ) );

		// Shortcodes
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );
		
		$this->register_scripts()->register_navs()->register_sidebars();
		
		// Action Hooks & Filter
		add_action( 'init', array( $this, 'set_favicon' ) );
	}
	
	protected function is_first_load(): bool {
		if ( get_option( $this->get_prefix( 'first_load' ) ) ) {
			return false;
		} else {
			add_option( $this->get_prefix( 'first_load' ), true );
			
			return true;
		}
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

	protected function register_navs() :sv_header {
		if ( isset( $this->get_root()->sv_navigation ) ) {
			$this->get_root()
				->sv_navigation
				->create( $this )
				->set_desc( __( 'Primary Menu', $this->get_module_name() ) )
				->load_nav();
		}

		return $this;
	}

	protected function register_sidebars() :sv_header {
		if ( isset( $this->get_root()->sv_sidebar ) ) {
			$this->get_root()
				 ->sv_sidebar
				 ->create( $this )
				 ->set_title( __( 'Header', $this->get_module_name() ) )
				 ->set_desc( __( 'Widgets in this area will be shown in the header, next to the navigation.', $this->get_module_name() ) )
				 ->load_sidebar();
		}
		
		if ( $this->is_first_load() ) {
			$widgets 											= get_option( 'sidebars_widgets' );
			$widgets['sv_100_sv_sidebar_sv_header'] 			= array( 'search-1' );
			
			update_option( 'sidebars_widgets', $widgets );
		}

		return $this;
	}

	public function shortcode( $settings, $content = '' ) :string {
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
	protected function router( array $settings ) :string {
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
	protected function load_template( array $template, array $settings ) :string {
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
	
	public function set_favicon(){
		if ( isset( $this->get_root()->sv_icon ) && ! is_array( $this->get_root()->sv_icon->s['favicon']->run_type()->get_data() ) ) {
			$this->favicon						= intval( $this->get_root()->sv_icon->s['favicon']->run_type()->get_data() );
			
			remove_action ( 'wp_head', 'wp_site_icon', 99 );
		}
	}
	
	protected function get_favicon(): int {
		return $this->favicon;
	}
}