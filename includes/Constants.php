<?php
/**
 * Plugin constants
 */

/**
 * Setup/config constants
 */
if( !defined( 'CP_MINISTRIES_PLUGIN_FILE' ) ) {
	 define ( 'CP_MINISTRIES_PLUGIN_FILE',
	 	dirname( dirname( __FILE__ ) ) . "/cp-ministries.php"
	);
}
if( !defined( 'CP_MINISTRIES_PLUGIN_DIR' ) ) {
	 define ( 'CP_MINISTRIES_PLUGIN_DIR',
	 	plugin_dir_path( CP_MINISTRIES_PLUGIN_FILE )
	);
}
if( !defined( 'CP_MINISTRIES_PLUGIN_URL' ) ) {
	 define ( 'CP_MINISTRIES_PLUGIN_URL',
	 	plugin_dir_url( CP_MINISTRIES_PLUGIN_FILE )
	);
}
if( !defined( 'CP_MINISTRIES_PLUGIN_VERSION' ) ) {
	 define ( 'CP_MINISTRIES_PLUGIN_VERSION',
	 	'1.0.0'
	);
}
if( !defined( 'CP_MINISTRIES_INCLUDES' ) ) {
	 define ( 'CP_MINISTRIES_INCLUDES',
	 	plugin_dir_path( dirname( __FILE__ ) ) . 'includes'
	);
}
if( !defined( 'CP_MINISTRIES_PREFIX' ) ) {
	define ( 'CP_MINISTRIES_PREFIX',
		'cps'
   );
}
if( !defined( 'CP_MINISTRIES_TEXT_DOMAIN' ) ) {
	 define ( 'CP_MINISTRIES_TEXT_DOMAIN',
		'CP_MINISTRIES'
   );
}
if( !defined( 'CP_MINISTRIES_DIST' ) ) {
	 define ( 'CP_MINISTRIES_DIST',
		CP_MINISTRIES_PLUGIN_URL . "/dist/"
   );
}

/**
 * Licensing constants
 */
if( !defined( 'CP_MINISTRIES_STORE_URL' ) ) {
	 define ( 'CP_MINISTRIES_STORE_URL',
	 	'https://churchplugins.com'
	);
}
if( !defined( 'CP_MINISTRIES_ITEM_NAME' ) ) {
	 define ( 'CP_MINISTRIES_ITEM_NAME',
	 	'Church Plugins - Ministries'
	);
}

/**
 * App constants
 */
if( !defined( 'CP_MINISTRIES_APP_PATH' ) ) {
	 define ( 'CP_MINISTRIES_APP_PATH',
	 	plugin_dir_path( dirname( __FILE__ ) ) . 'app'
	);
}
if( !defined( 'CP_MINISTRIES_ASSET_MANIFEST' ) ) {
	 define ( 'CP_MINISTRIES_ASSET_MANIFEST',
	 	plugin_dir_path( dirname( __FILE__ ) ) . 'app/build/asset-manifest.json'
	);
}
