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
	protected $template                         = '';

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

		$this->register_scripts()->register_sidebars();
	}

	protected function register_scripts() :sv_header {
		// Register Styles
		$this->scripts_queue['frontend_default']			= static::$scripts
			->create( $this )
			->set_ID( 'frontend_default' )
			->set_path( 'lib/css/frontend_default.css' )
			->set_inline( true );

		$this->scripts_queue['frontend_frontpage']			= static::$scripts
			->create( $this )
			->set_ID( 'frontend_frontpage' )
			->set_path( 'lib/css/frontend_frontpage.css' )
			->set_inline( true );

		return $this;
	}

	protected function register_sidebars() :sv_header {
		if ( isset( $this->get_root()->sv_sidebar ) ) {
			$this->get_root()
				 ->sv_sidebar
				 ->create( $this )
				 ->set_name( __( 'Header', $this->get_module_name() ) )
				 ->set_desc( __( 'Widgets in this area will be shown in the header, next to the navigation.', $this->get_module_name() ) )
				 ->set_css( 'sv_header/lib/css/widgets_default.css' )
				 ->load_sidebar();
		}

		return $this;
	}

	public function shortcode( $settings, $content = '' ) {
		$settings								= shortcode_atts(
			array(
				'inline'						=> true,
				'template'                      => false,
			),
			$settings,
			$this->get_module_name()
		);

		$this->template							= $settings[ 'template' ];

		ob_start();
		if ( $this->template && file_exists( $this->get_path( $this->template ) ) ) {
			include ( $this->get_path( $this->template ) );
		} else {
			include ( $this->get_path( 'lib/tpl/frontend_default.php' ) );
		}
		$output									= do_shortcode( ob_get_contents() );
		ob_end_clean();

		return $output;
	}
}