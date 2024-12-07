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


/**
 * Register our custom taxonomy category
 *
 * @return void
 */
function register_faqs_category_taxonomy() {

    $labels = array(
		'name'              => _x( 'Categories', 'taxonomy general name', 'arcade' ),
		'singular_name'     => _x( 'Category', 'taxonomy singular name', 'arcade' ),
		'search_items'      => __( 'Search Categories', 'arcade' ),
		'all_items'         => __( 'All Categories', 'arcade' ),
		'parent_item'       => __( 'Parent Category', 'arcade' ),
		'parent_item_colon' => __( 'Parent Category:', 'arcade' ),
		'edit_item'         => __( 'Edit Category', 'arcade' ),
		'update_item'       => __( 'Update Category', 'arcade' ),
		'add_new_item'      => __( 'Add New Category', 'arcade' ),
		'new_item_name'     => __( 'New Category Name', 'arcade' ),
		'menu_name'         => __( 'Category', 'arcade' ),
	);

	$args = array(
		'hierarchical'      => true,
		'labels'            => $labels,
		'show_ui'           => true,
		'show_admin_column' => true,
		'query_var'         => true,
        'show_in_rest'      => true,
		'rewrite'           => array( 'slug' => 'faqs-category' ),
	);

    register_taxonomy( 'faqs-category', 'faqs', $args );

}

add_action( 'init', 'register_faqs_category_taxonomy' );


/**
 * Portfolio Metabox main function where we'll register metaboxes
 *
 * @return void
 */
// function portfolio_details_metabox() {
//     add_meta_box(
//         'portfolio_details_metabox_id',       	// Unique ID for the metabox
//         'Portfolio Details',                  	// Title of the metabox
//         'portfolio_details_metabox_callback', 	// Callback function that renders the metabox
//         'portfolio',        					// Post type where it will appear
//         'side',                         		// Context: where on the screen (side, normal, or advanced)
//         'default',                       		// Priority: default, high, low
// 		array(
// 			'__block_editor_compatible_meta_box' => true,
// 			'__back_compat_meta_box'             => false,
// 		)
//     );
// }
// add_action( 'add_meta_boxes', 'portfolio_details_metabox' );


// function portfolio_details_metabox_callback( $post ) {
//     // Add a nonce field for security
//     wp_nonce_field( 'portfolio_details_metabox_nonce_action', 'portfolio_details_metabox_nonce' );

//     $portfolio_address = get_post_meta( $post->ID, 'portfolio_address', true );

//     echo '<label for="portfolio_address">Address: </label>';
//     echo '<input type="text" id="portfolio_address" name="portfolio_address" value="' . esc_attr( $portfolio_address ) . '" style="width: 100%;" />';
// }


// function your_custom_save_metabox( $post_id ) {
//     // Check for nonce security
//     if ( ! isset( $_POST['portfolio_details_metabox_nonce'] ) ||
//          ! wp_verify_nonce( $_POST['portfolio_details_metabox_nonce'], 'portfolio_details_metabox_nonce_action' ) ) {
//         return;
//     }

//     // Check for autosave or bulk edit
//     if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
//         return;
//     }

//     // Check user permissions
//     if ( ! current_user_can( 'edit_post', $post_id ) ) {
//         return;
//     }

// 	if ( isset( $_POST['_inline_edit'] ) ) {
// 		return;
// 	}

//     if ( isset( $_POST['portfolio_address'] ) ) {
//         update_post_meta( $post_id, 'portfolio_address', sanitize_text_field( $_POST['portfolio_address'] ) );
//     }
// }
// add_action( 'save_post', 'your_custom_save_metabox' );