<?php

if ( ! class_exists( 'Arcade_Faqs' ) ) :
class Arcade_Faqs {

	// Constructor
	public function __construct() {
		add_action( 'init', array( $this, 'arcade_register_faqs_cpt' ) );
	}

	/**
	 * Register a custom post type called "faqs".
	 *
	 * @see get_post_type_labels() for label keys.
	 */
	public function arcade_register_faqs_cpt() {
		$labels = array(
			'name'                  => _x( 'Faqs', 'Post type general name', 'arcade' ),
			'singular_name'         => _x( 'Faq', 'Post type singular name', 'arcade' ),
			'menu_name'             => _x( 'Faqs', 'Admin Menu text', 'arcade' ),
			'name_admin_bar'        => _x( 'Faq', 'Add New on Toolbar', 'arcade' ),
			'add_new'               => __( 'Add New', 'arcade' ),
			'add_new_item'          => __( 'Add New Faq', 'arcade' ),
			'new_item'              => __( 'New Faq', 'arcade' ),
			'edit_item'             => __( 'Edit Faq', 'arcade' ),
			'view_item'             => __( 'View Faq', 'arcade' ),
			'all_items'             => __( 'All Faqs', 'arcade' ),
			'search_items'          => __( 'Search Faqs', 'arcade' ),
			'parent_item_colon'     => __( 'Parent Faqs:', 'arcade' ),
			'not_found'             => __( 'No Faqs found.', 'arcade' ),
			'not_found_in_trash'    => __( 'No Faqs found in Trash.', 'arcade' ),
			'featured_image'        => _x( 'Faq Cover Image', 'Overrides the “Featured Image” phrase for this post type. Added in 4.3', 'arcade' ),
			'set_featured_image'    => _x( 'Set cover image', 'Overrides the “Set featured image” phrase for this post type. Added in 4.3', 'arcade' ),
			'remove_featured_image' => _x( 'Remove cover image', 'Overrides the “Remove featured image” phrase for this post type. Added in 4.3', 'arcade' ),
			'use_featured_image'    => _x( 'Use as cover image', 'Overrides the “Use as featured image” phrase for this post type. Added in 4.3', 'arcade' ),
			'archives'              => _x( 'Faq archives', 'The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4', 'arcade' ),
			'insert_into_item'      => _x( 'Insert into Faqs', 'Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4', 'arcade' ),
			'uploaded_to_this_item' => _x( 'Uploaded to this Faqs', 'Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4', 'arcade' ),
			'filter_items_list'     => _x( 'Filter Faqs list', 'Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4', 'arcade' ),
			'items_list_navigation' => _x( 'Faqs list navigation', 'Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4', 'arcade' ),
			'items_list'            => _x( 'Faqs list', 'Screen reader text for the list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4', 'arcade' ),
		);

		$args = array(
			'labels'             => $labels,
			'public'             => true,
			'publicly_queryable' => true,
			'show_ui'            => true,
			'show_in_menu'       => true,
			'query_var'          => true,
			'rewrite'            => array( 'slug' => 'faqs' ),
			'capability_type'    => 'post',
			'has_archive'        => true,
			'hierarchical'       => false,
			'menu_position'      => null,
			'show_in_rest'       => true, //Активира гутенберг редактора... 
			'supports'           => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'comments' ), //, 'custom-fields', 'post-formats'
			
		);

		register_post_type( 'faqs', $args );
	}
}

endif;
$arcade_faqs = new arcade_Faqs();