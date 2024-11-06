<?php
/**
 * Plugin Name: Church Plugins - Ministries
 * Plugin URL: https://churchplugins.com
 * Description: Church Ministries plugin for managing ministries
 * Version: 1.0.2
 * Author: Church Plugins
 * Author URI: https://churchplugins.com
 * Text Domain: cp-ministries
 * Domain Path: languages
 */

require_once( dirname( __FILE__ ) . "/includes/Constants.php" );

require_once( CP_MINISTRIES_PLUGIN_DIR . "/includes/ChurchPlugins/init.php" );
require_once( CP_MINISTRIES_PLUGIN_DIR . 'vendor/autoload.php' );


use CP_Ministries\Init as Init;

/**
 * @var CP_Ministries\Init
 */
global $cp_ministries;
$cp_ministries = cp_ministries();

/**
 * @return CP_Ministries\Init
 */
function cp_ministries() {
	return Init::get_instance();
}

/**
 * Load plugin text domain for translations.
 *
 * @return void
 */
function cp_ministries_load_textdomain() {

	// Traditional WordPress plugin locale filter
	$get_locale = get_user_locale();

	/**
	 * Defines the plugin language locale used in RCP.
	 *
	 * @var string $get_locale The locale to use. Uses get_user_locale()` in WordPress 4.7 or greater,
	 *                  otherwise uses `get_locale()`.
	 */
	$locale        = apply_filters( 'plugin_locale',  $get_locale, 'cp-ministries' );
	$mofile        = sprintf( '%1$s-%2$s.mo', 'cp-ministries', $locale );

	// Setup paths to current locale file
	$mofile_global = WP_LANG_DIR . '/cp-ministries/' . $mofile;

	if ( file_exists( $mofile_global ) ) {
		// Look in global /wp-content/languages/cp-ministries folder
		load_textdomain( 'cp-ministries', $mofile_global );
	}

}
add_action( 'init', 'cp_ministries_load_textdomain' );
