<?php
namespace CP_Ministries\Setup\Taxonomies;

use ChurchPlugins\Setup\Taxonomies\Taxonomy;

// Exit if accessed directly
if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * Setup for custom taxonomy: Type
 *
 * @author tanner moushey
 * @since 1.0
 */
class Type extends Taxonomy  {
	
	/**
	 * Child class constructor. Punts to the parent.
	 *
	 * @author costmo
	 */
	protected function __construct() {
		$this->taxonomy = "cp_type";

		$this->single_label = apply_filters( "{$this->taxonomy}_single_label", 'Type' );
		$this->plural_label = apply_filters( "{$this->taxonomy}_plural_label", 'Types' );
		
		parent::__construct();
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
		if ( ! $tax = get_taxonomy( $this->taxonomy ) ) {
			return false;
		}
		
		return $tax->rewrite['slug'];
	}
	
	/**
	 * Return the object types for this taxonomy
	 *
	 * @return array
	 * @since  1.0.0
	 *
	 * @author Tanner Moushey
	 */
	public function get_object_types() {
		return apply_filters( 'cp_type_taxonomy_types', [ cp_ministries()->setup->post_types->ministries->post_type ] );
	}

	public function get_args() {
		$args = parent::get_args();
		
		$args['show_ui'] = true;
		$args['hierarchical'] = true;
		$args['show_in_rest'] = true;
		return $args;
	}
	
	public function register_metaboxes() {
		return; // overwrite default meta
	}
	

	/**
	 * Get terms for this taxonomy
	 *
	 * @return mixed
	 * @since  1.0.0
	 *
	 * @author Tanner Moushey
	 */
	public function get_terms() { return; }

	/**
	 * Get term data for this taxonomy
	 *
	 * @return mixed
	 * @since  1.0.0
	 *
	 * @author Tanner Moushey
	 */
	public function get_term_data() { return; }
	
	
}
