<?php

namespace ChurchPlugins\Setup\Tables;

/**
 * SourceType DB Class
 *
 * @since       1.0
 */

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * SourceType Class
 *
 * @since 1.0.0
 */
class SourceType extends Table  {

	/**
	 * Get things started
	 *
	 * @since  1.0.0
	*/
	public function __construct() {
		parent::__construct();

		$this->table_name = $this->prefix . 'cp_source_type';
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
			`parent_id` bigint,
			`published` datetime NOT NULL,
			`updated` datetime NOT NULL,
			PRIMARY KEY  (`id`),
			FULLTEXT INDEX `idx_title` (`title`),
			KEY `idx_parent_id` (`parent_id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci;";

	}

}
