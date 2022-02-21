<?php

/**
 * @link              https://github.com/Mahmud-Studio/listing-delete-survey
 * @since             1.0.0
 * @package           Listing_Delete_Survey
 *
 * @wordpress-plugin
 * Plugin Name:       Listing Delete Survey
 * Plugin URI:        https://github.com/mahmud-studio/listing-delete-survey/
 * Description:       Get the survey when user try to delete classified post.
 * Version:           1.0.0
 * Author:            Dream Developer
 * Author URI:        https://dreamdeveloper.org/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       listing-delete-survey
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 */
define( 'LISTING_DELETE_SURVEY_VERSION', '1.0.0' );
define( 'LISTING_DELETE_SURVEY_FILE', plugin_basename(__FILE__));
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-listing-delete-survey-activator.php
 */
function activate_listing_delete_survery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-listing-delete-survey-activator.php';
	Listing_Delete_Survery_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-listing-delete-survey-deactivator.php
 */
function deactivate_listing_delete_survery() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-listing-delete-survey-deactivator.php';
	Listing_Delete_Survery_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_listing_delete_survery' );
register_deactivation_hook( __FILE__, 'deactivate_listing_delete_survery' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-listing-delete-survey.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_listing_delete_survery() {

	$plugin = new Listing_Delete_Survery();
	$plugin->run();

}
run_listing_delete_survery();
