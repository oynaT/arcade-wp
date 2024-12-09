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
 * Register the meta box for FAQ video (embed or URL).
 *
 * @return void
 */
function register_faq_video_meta_box() {
    add_meta_box(
        'faq_video',                 // Meta box ID
        'FAQ Video (Embed or URL)',  // Meta box title
        'faq_video_meta_box_callback', // Callback function for displaying the meta box
        'faqs',                       // Post type (CPT)
        'normal',                     // Position of the meta box
        'default',                    // Priority
        array(
            '__block_editor_compatible_meta_box' => true,
            '__back_compat_meta_box'             => false,
        )
    );
}
add_action( 'add_meta_boxes', 'register_faq_video_meta_box' );

/**
 * Callback function to display the FAQ video meta box.
 *
 * @param WP_Post $post The current post object.
 * @return void
 */
function faq_video_meta_box_callback( $post ) {
    // Adding a nonce for security
    wp_nonce_field( 'faq_video_nonce_action', 'faq_video_nonce_name' );
    
    // Get the value of the meta field
    $faq_video = get_post_meta( $post->ID, '_faq_video', true );

    // Display the input field for embed code or URL
    echo '<textarea name="faq_video" rows="3" style="width:100%;">' . esc_textarea( $faq_video ) . '</textarea>';
}

/**
 * Save the value of the FAQ video meta field.
 *
 * @param int $post_id The ID of the post being saved.
 * @return void
 */
function save_faq_video_meta( $post_id ) {
    // Check for nonce security
    if ( ! isset( $_POST['faq_video_nonce_name'] ) || 
        ! wp_verify_nonce( $_POST['faq_video_nonce_name'], 'faq_video_nonce_action' ) ) {
        return;
    }

    // Check if post is being autosaved
    if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return;

    // Check if the user has permission to edit the post
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    // Save the meta field value
    if ( isset( $_POST['faq_video'] ) ) {
        update_post_meta( $post_id, '_faq_video', sanitize_textarea_field( $_POST['faq_video'] ) );
    }
}
add_action( 'save_post', 'save_faq_video_meta' );
