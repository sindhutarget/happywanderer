<?php
/*
Plugin Name: Data types for Adventure Tours theme
Version: 2.4.0
Description: Defines custom post types, taxonomies and shortcodes for Adventure Tours theme.
Author: Themedelight
Author URI: http://themeforest.net/user/themedelight/portfolio
Plugin URI: http://themeforest.net/user/themedelight/portfolio
Text Domain: adventure-tours-data-types
Domain Path: /languages
*/

/**
 * Plugin container class.
 * Singleton.
 */
class ATDTP
{
	/**
	 * Plugin version.
	 *
	 * @var string
	 */
	public $version = '2.4.0';

	/**
	 * Set of available services.
	 *
	 * @var assoc
	 */
	protected $services = array();

	/**
	 * @var ATDTP
	 */
	private static $instance;

	/**
	 * Returns instance of the container.
	 * @return ATDTP
	 */
	public static function instance() {
		if ( ! self::$instance ) {
			self::$instance = new self();
			self::$instance->init();
		}

		return self::$instance;
	}

	/**
	 * @return ATDTP_Shortcodes_Helper
	 */
	public function shortcodes_helper() {
		return $this->services['shortcodes_helper'];
	}

	/**
	 * @return ATDTP_Storage_Installer
	 */
	public function storage_installer() {
		if ( empty( $this->services['storage_installer'] ) ) {
			$this->require_file( '/classes/ATDTP_Storage_Installer.php' );
			$this->services['storage_installer'] = new ATDTP_Storage_Installer();
		}

		return $this->services['storage_installer'];
	}

	/**
	 * Requires plugin file by it relative path.
	 *
	 * @param  string $local_path
	 * @return void
	 */
	public function require_file( $local_path ) {
		$full_path = dirname( __FILE__ ) . $local_path;
		//if ( ! file_exists( $full_path ) ) return;
		require $full_path;
	}

	/**
	 * Loads and inits all related services.
	 *
	 * @return void
	 */
	protected function init() {
		$this->require_file( '/classes/ATDTP_Data_Types_Registrator.php' );
		$this->require_file( '/classes/ATDTP_Shortcodes_Helper.php' );
		$this->require_file( '/classes/ATDTP_Shortcodes_Visual_Composer.php' );

		$this->services['data_registrator'] = new ATDTP_Data_Types_Registrator();
		$this->services['shortcodes_helper'] = new ATDTP_Shortcodes_Helper();
		$this->services['visual_composer_shortcodes_helper'] = new ATDTP_Shortcodes_Visual_Composer();

		add_action( 'plugins_loaded', array( $this, 'load_textdomain') );

		register_activation_hook( __FILE__, array( $this, 'hook_plugin_activation' ) );
		register_deactivation_hook( __FILE__, array( $this, 'hook_plugin_deactivation' ) );

		add_action( 'wp_enqueue_scripts', array( $this, 'action_load_assets' ) );
	}

	/**
	 * Load plugin textdomain.
	 *
	 * @return void
	 */
	public function load_textdomain() {
		load_plugin_textdomain( 'adventure-tours-data-types', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' ); 
	}

	public function hook_plugin_activation() {
		if ( ! $this->check_rights_for_use_plugin() ) {
			return;
		}

		$this->storage_installer()->do_install();
	}

	public function hook_plugin_deactivation() {
		if ( ! $this->check_rights_for_use_plugin() ) {
			return;
		}
	}

	public function action_load_assets() {
		// If plugin used with main theme - default styles are not required.
		if ( function_exists( 'adventure_tours_init_theme_asserts' ) ) {
			return;
		}
		wp_enqueue_style( 'atdtp-plugin-shortcodes', $this->get_plugin_url() . 'assets/css/style.css', null, $this->version );
		wp_enqueue_style( 'atdtp-plugin-font-awesome', $this->get_plugin_url() . 'assets/css/font-awesome.min.css', null, $this->version );
	}

	public function get_plugin_url() {
		return plugin_dir_url( __FILE__ );
	}

	/**
	 * Constructor.
	 */
	protected function __construct() {
	}

	/**
	 * Clone if forbidden.
	 *
	 * @return void
	 */
	private function __clone() {
	}

	/**
	 * Unserialize if forbidden.
	 *
	 * @return void
	 */
	private function __wakeup() {
	}

	private function check_rights_for_use_plugin() {
		$result = false;
		if ( current_user_can( 'activate_plugins' ) ) {
			$result = true;
		}
		return $result;
	}
}

/**
 * @return ATDTP
 */
function ATDTP() {
	return ATDTP::instance();
}

define( 'ATDTP_PATH', dirname( __FILE__ ) );
ATDTP(); // To init plugin.
