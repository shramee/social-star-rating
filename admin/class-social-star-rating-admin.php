<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       http://shramee.me
 * @since      1.0.0
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/admin
 * @author     Shramee <shramee.srivastav@gmail.com>
 */
class Social_Star_Rating_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Handles ajax requests and renders pop ups
	 * @since    1.0.0
	 */
	public function admin_ajax() {
		if ( isset( $_GET['s'] ) ) {
			$file = dirname( __FILE__ ) . "/partials/ajax-$_GET[s].php";
			if ( file_exists( $file ) ) {
				include $file;
			}
		}
		die();
	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_style( $this->plugin_name, SSRATEURL . 'css/social-star-rating-admin.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, SSRATEURL . 'js/social-star-rating-admin.js', array( 'jquery' ), $this->version, false );

	}

}
