<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       http://shramee.me
 * @since      1.0.0
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/includes
 * @author     Shramee <shramee.srivastav@gmail.com>
 */
class Social_Star_Rating_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'social-star-rating',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
