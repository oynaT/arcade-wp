
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


