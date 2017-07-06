<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://shramee.me
 * @since             1.0.0
 * @package           Social_Star_Rating
 *
 * @wordpress-plugin
 * Plugin Name:       Social star rating
 * Plugin URI:        https://github.com/shramee/social-star-rating
 * Description:       Star Review and Rating WordPress plugin that integrates with Google Places, Facebook, Yelp and Healthy Hearing. Use shortcodes [social-start-rating] and [social-start-rating-feed] to show rating widget and feed respectively.
 * Version:           1.0.0
 * Author:            Shramee
 * Author URI:        http://shramee.me
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       social-star-rating
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'SSRATEURL', plugin_dir_url( __FILE__ ) );
define( 'SSRATEPATH', trailingslashit( dirname( __FILE__ ) ) );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-social-star-rating.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_social_star_rating() {

	$plugin = new Social_Star_Rating();
	$plugin->run();

}
run_social_star_rating();
