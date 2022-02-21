<?php
/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 * @package    Listing_Delete_Survery
 * @subpackage Listing_Delete_Survery/includes
 */
class Listing_Delete_Survery_Activator {

	/**
	 * Create A Database Table
	 *
	 * After activated the plugin create a database table to store
	 * listing deleted survey data that's submit the user.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {


    // Require parent plugin
    if ( ! is_plugin_active( 'classified-listing/classified-listing.php' ) and current_user_can( 'activate_plugins' ) ) {
        // Stop activation redirect and show error
        wp_die('Sorry, but this plugin requires the classified-listing to be installed and active. <br><a href="' . admin_url( 'plugins.php' ) . '">&laquo; Return to Plugins</a>');
    }
		
		global $wpdb;
		$table_name = $wpdb->prefix . "listing_delete_survey";
		
		$charset_collate = $wpdb->get_charset_collate();

		$sql = "CREATE TABLE $table_name (
		id mediumint(9) NOT NULL AUTO_INCREMENT,
		date datetime DEFAULT '0000-00-00 00:00:00' NOT NULL,
		user_id tinytext NOT NULL,
		title text NOT NULL,
		survey varchar(55) DEFAULT '' NOT NULL,
		PRIMARY KEY  (id)
		) $charset_collate;";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		dbDelta( $sql );
				
	}
	

}
