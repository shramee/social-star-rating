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
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
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

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-social-star-rating-activator.php
 */
function activate_social_star_rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-star-rating-activator.php';
	Social_Star_Rating_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-social-star-rating-deactivator.php
 */
function deactivate_social_star_rating() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-social-star-rating-deactivator.php';
	Social_Star_Rating_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_social_star_rating' );
register_deactivation_hook( __FILE__, 'deactivate_social_star_rating' );

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