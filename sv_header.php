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
	public function __construct() {

	}

	public function init() {
		// Module Info
		$this->set_module_title( 'SV Header' );
		$this->set_module_desc( __( 'This module gives the ability to display the header via the "[sv_header]" shortcode.', $this->get_module_name() ) );

		// Shortcodes
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );
	}

	public function shortcode( $settings, $content = '' ) {
		$settings								= shortcode_atts(
			array(
				'inline'						=> false
			),
			$settings,
			$this->get_module_name()
		);

		// Load Styles
		static::$scripts->create( $this )
		                ->set_source( $this->get_file_url( 'lib/css/frontend.css' ), $this->get_file_path( 'lib/css/frontend.css' ) )
		                ->set_inline($settings['inline']);

		ob_start();
		include( $this->get_file_path( 'lib/tpl/frontend.php' ) );
		$output									= do_shortcode( ob_get_contents() );
		ob_end_clean();

		return $output;
	}
}