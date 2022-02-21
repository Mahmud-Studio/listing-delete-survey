<?php
/**
 * The public-facing functionality of the plugin.
 *
 * @package    Listing_Delete_Survery
 * @subpackage Listing_Delete_Survery/public
 */
class Listing_Delete_Survery_Public {

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
	 * Popup form for take a survey to listing delete action
	 *
	 * @since    1.0.0
	 */
	public function admin_popup_form_listing_delete_survey() {
		include(plugin_dir_path(__FILE__) .'/partials/listing-delete-survey-popup-form.php');
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/listing-delete-survey-public.js', array( 'jquery' ), $this->version, true );

		wp_localize_script( $this->plugin_name, 'ajax_object',
            array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

	}

}
