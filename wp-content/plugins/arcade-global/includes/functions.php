
<?php
/**
 * Shortcode show current yaer
 *
 * @return string current yaer.
 */

function display_current_year() {
    return date( 'Y' );
}
add_shortcode( 'current_year', 'display_current_year' );

//display current yaer using [current_year] in post

/**
 * Shortcode to display the title of a post from CPT FAQs and category
 *
 * @param array $atts
 * @return string HTML content with the FAQ title and category.
 */
function display_faqs_info( $atts ) {
    // Default settings
    $atts = shortcode_atts( array(
        'id' => '', // ID of the FAQ post
    ), $atts, 'faq_info' );

    // Check if the ID of the post is set
    if ( empty( $atts['id'] ) ) {
        return '<p>Please provide the ID of the FAQ post.</p>';
    }

    // Get the FAQ post by ID
    $faq_post = get_post( $atts['id'] );

    // If the post does not exist or is not of type 'faqs'
    if ( ! $faq_post || 'faqs' !== get_post_type( $faq_post ) ) {
        return '<p>The post was not found or is not of type "FAQ".</p>';
    }

    // Get the categories for the FAQ
    $terms = get_the_terms( $faq_post->ID, 'faqs-category' );
    
    // If there are no categories
    if ( ! $terms || is_wp_error( $terms ) ) {
        return '<p>No categories found for this FAQ post.</p>';
    }

    // Collect the category names
    $categories = array();
    foreach ( $terms as $term ) {
        $categories[] = $term->name;
    }

    // Assemble HTML to display the FAQ title and category
    $content = '<div class="faq-info">';
    $content .= '<h3>' . esc_html( $faq_post->post_title ) . '</h3>';
    $content .= '<p>Category: ' . implode( ', ', $categories ) . '</p>';
    $content .= '</div>';

    return $content;
}
add_shortcode( 'faq_info', 'display_faqs_info' );


/**
 * Enqueues scripts and localizes AJAX settings for the plugin.
 *
 * This function is responsible for loading the JavaScript assets needed for the plugin's functionality
 * and passing the AJAX URL to the script, enabling AJAX requests to the WordPress admin interface.
 *
 * @return void
 */

function arcade_plugin_enqueue_assets() {
    wp_enqueue_script(
        'ajax-script',
        plugins_url( '../assets/scripts/scripts.js', __FILE__ ),
        array('jquery'),
        '1.0',
        true
    );

    wp_localize_script(
        'ajax-script',
        'my_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'wp_enqueue_scripts', 'arcade_plugin_enqueue_assets' );


/**
 * Fucntion mark as important and update in post meta table
 */

function arcade_mark_faq_important() {
    // check is ID is send
    if ( ! isset( $_POST['faq_id'] ) ) {
        wp_send_json_error();
    }

    $faq_id = intval( $_POST['faq_id'] );

    // Save "mark important" in post_meta
    update_post_meta( $faq_id, '_faq_important', 1 );

    wp_send_json_success();
}

add_action( 'wp_ajax_nopriv_arcade_mark_faq_important', 'arcade_mark_faq_important' );
add_action( 'wp_ajax_arcade_mark_faq_important', 'arcade_mark_faq_important' );
