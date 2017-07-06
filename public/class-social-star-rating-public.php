<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       http://shramee.me
 * @since      1.0.0
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Social_Star_Rating
 * @subpackage Social_Star_Rating/public
 * @author     Shramee <shramee.srivastav@gmail.com>
 */
class Social_Star_Rating_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Registers required shortcodes
	 *
	 * @since    1.0.0
	 */
	public function shortcodes() {

		add_shortcode( 'social-start-rating', [ $this, 'star_rating_shortcode' ] );
		add_shortcode( 'social-start-rating-feed', [ $this, 'feed_shortcode' ] );

	}

	/**
	 * Renders star rating shortcode
	 *
	 * @since    1.0.0
	 */
	public function star_rating_shortcode() {
		$url = admin_url( 'admin-ajax.php?action=social-star-review&s=rate' );
		?>
		<iframe style="min-height:500px;width:100%" src="<?php echo $url; ?>" frameborder="0"></iframe>
		<?php
	}

	/**
	 * Renders star rating shortcode
	 *
	 * @since    1.0.0
	 */
	public function feed_shortcode() {
		$url = admin_url( 'admin-ajax.php?action=social-star-review&s=feed' );
		?>
		<iframe style="min-height:700px;width:100%" src="<?php echo $url; ?>" frameborder="0"></iframe>
		<?php
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_style( $this->plugin_name, SSRATEURL . 'css/social-star-rating-public.css', array(), $this->version, 'all' );
		wp_enqueue_script( $this->plugin_name, SSRATEURL . 'js/social-star-rating-public.js', array( 'jquery' ), $this->version, false );

	}

}
