<?php

namespace ChurchPlugins\Setup\Tables;

/**
 * Source DB Class
 *
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Source Class
 *
 * @since 1.0.0
 */
class Source extends Table  {

	/**
	 * Get things started
	 *
	 * @since  1.0.0
	*/
	public function __construct() {
		parent::__construct();

		$this->table_name = $this->prefix . 'cp_source';
		$this->version    = '1.0';
	}

	/**
	 * Create the table
	 *
	 * @since   1.0.0
	*/
	public function get_sql() {

		return "CREATE TABLE " . $this->table_name . " (
			`id` bigint NOT NULL AUTO_INCREMENT,
			`origin_id` bigint,
			`title` varchar(255),
			`status` ENUM( 'draft', 'publish', 'scheduled' ),
			`published` datetime NOT NULL,
			`updated` datetime NOT NULL,
			PRIMARY KEY  (`id`),
			KEY `idx_origin_id` (`origin_id`),
			KEY `idx_status` (`status`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";


	}

}
