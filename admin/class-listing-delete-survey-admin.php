<?php
/**
 * The admin-specific functionality of the plugin.
 *
 *
 * @package    Listing_Delete_Survey
 * @subpackage Listing_Delete_Survey/admin
 */
class Listing_Delete_Survey_Admin {

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
	 * Register the admin menu page for the showing listing deleted data.
	 *
	 * @since    1.0.0
	 */
	public function admin_menus() {
	
		add_submenu_page(
			'edit.php?post_type=rtcl_listing',
			'Listing Delete Survey',
			'Listing Delete Survey',
			'manage_options',
			'listing-delete-survey',
			array($this, 'listing_delete_survey_submenu_page_callback') );

	}

	/**
	 * admin_menus hook callback function for  submenu page view.
	 *
	 * @since    1.0.0
	 */
	public function listing_delete_survey_submenu_page_callback()
	{
		include_once(plugin_dir_path(__FILE__). 'partials/listing-delete-survey-admin-display.php');
	}

	/**
	 * AJAX Hook accept survey data.
	 *
	 * @since    1.0.0
	 */
	public function listing_survey_data() {
		global $wpdb;

		if(get_current_user_id()){
			
			$post_id = intval( $_POST['post_id'] );
			$survey = strval( $_POST['survey_data'] );

			$date = date('Y-m-d H:i:s');
			$user_id = get_current_user_id();
			$title = get_the_title($post_id);
			

			$data = array(
				'date' => $date,
				'user_id' => $user_id,
				'title' => $title,
				'survey' => $survey
			);
			$tablename = $wpdb->prefix.'listing_delete_survey';
   
		   $wpdb->insert( $tablename, 
		   array(
			   'date' => $date, 
			   'user_id' => $user_id,
			   'title' => $title,
			   'survey' => $survey
		   ),
			array( '%s', '%d', '%s', '%s', ) 
		   );
	
		}

		wp_die();
	}

	/**
	 * Footer Cradit Text
	 */
	public function listing_delete_cradit_text($text) {
		$my_text = ' Developed by <a href="https://dreamdeveloper.org/">Dream Developer</a>';
		return $text . $my_text;
	}

	public function listing_delete_survey_settings_page($array) {
		$settings = "<a href='" .admin_url( 'edit.php?post_type=rtcl_listing&page=listing-delete-survey' ) ."'>Settings</a>";
		array_push($array, $settings);
		return $array;
	}



}
