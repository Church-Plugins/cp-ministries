<?php
namespace CP_Ministries\Setup\PostTypes;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

use CP_Ministries\Admin\Settings;

use ChurchPlugins\Setup\PostTypes\PostType;

/**
 * Setup for custom post type: Ministries
 *
 * @since 1.0
 */
class Ministries extends PostType {
	
	/**
	 * Child class constructor. Punts to the parent.
	 *
	 * @author costmo
	 */
	protected function __construct() {
		$this->post_type = "cp_ministries";

		$this->single_label = apply_filters( "cp_min_single_{$this->post_type}_label", Settings::get( 'singular_label', 'Ministry' ) );
		$this->plural_label = apply_filters( "cp_min_plural_{$this->post_type}_label", Settings::get( 'plural_label', 'Ministries' ) );

		parent::__construct();
	}

	public function add_actions() {
		add_filter( 'enter_title_here', [ $this, 'add_title' ], 10, 2 );
		add_filter( 'cp_location_taxonomy_types', [ $this, 'location_tax' ] );
		parent::add_actions();
	}

	/**
	 * Update title placeholder in edit page 
	 * 
	 * @param $title
	 * @param $post
	 *
	 * @return string|void
	 * @since  1.0.0
	 * 
	 * @author Tanner Moushey
	 */
	public function add_title( $title, $post ) {
		if ( get_post_type( $post ) != $this->post_type ) {
			return $title;
		}
		
		return __( 'Add ministry name', 'cp-ministries' );
	}

	/**
	 * Add Ministries to locations taxonomy if it exists
	 * 
	 * @param $types
	 *
	 * @return mixed
	 * @since  1.0.0
	 *
	 * @author Tanner Moushey
	 */
	public function location_tax( $types ) {
		$types[] = $this->post_type;
		return $types;
	}

	/**
	 * Get the slug for this taxonomy
	 * 
	 * @return false|mixed
	 * @since  1.0.0
	 *
	 * @author Tanner Moushey
	 */
	public function get_slug() {
		if ( ! $type = get_post_type_object( $this->post_type ) ) {
			return false;
		}
		
		return $type->rewrite['slug'];
	}	
	
	/**
	 * Setup arguments for this CPT
	 *
	 * @return array
	 * @author costmo
	 */
	public function get_args() {
		$args               = parent::get_args();
		$args['menu_icon']  = apply_filters( "{$this->post_type}_icon", 'dashicons-feedback' );
		$args['has_archive'] = false;
		$args['supports'][] = 'page-attributes';
		$args['supports'][] = 'excerpt';
		$args['supports'][] = 'revisions';
		return $args;
	}
	
	public function register_metaboxes() {
		$this->meta_details();
	}

	protected function meta_details() {
		$cmb = new_cmb2_box( [
			'id' => 'ministries_meta',
			'title' => $this->single_label . ' ' . __( 'Details', 'cp-ministries' ),
			'object_types' => [ $this->post_type ],
			'context' => 'normal',
			'priority' => 'high',
			'show_names' => true,
		] );

		$cmb->add_field( [
			'name' => __( 'Contact Action', 'cp-ministries' ),
			'desc' => __( 'The email or url to use for the contact action.', 'cp-ministries' ),
			'id'   => 'contact_action',
			'type' => 'text',
		] );

	}
	
}
