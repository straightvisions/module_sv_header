<?php
namespace sv_100;

/**
 * @author			Matthias Reuter
 * @package			sv_100
 * @copyright		2017 Matthias Reuter
 * @link			https://straightvisions.com
 * @since			1.0
 * @license			See license.txt or https://straightvisions.com
 */
class sv_header extends init {
	static $scripts_loaded						= false;

	public function __construct() {
	}

	public function init(){
		add_shortcode( $this->get_module_name(), array( $this, 'shortcode' ) );
	}
	public function shortcode( $settings, $content='' ) {
		$settings								= shortcode_atts(
			array(
				'inline'						=> false
			),
			$settings,
			$this->get_module_name()
		);

		$this->module_enqueue_scripts( true );

		ob_start();
		include( $this->get_file_path( 'lib/tpl/frontend.php' ) );
		$output									= do_shortcode( ob_get_contents() );
		ob_end_clean();

		return $output;
	}
}