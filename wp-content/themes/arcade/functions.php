<?php

if ( ! defined( 'ARCADE_THEME_VER' ) ) {
	define( 'ARCADE_THEME_VER', '1.0.5' );
}

add_theme_support('menus');
add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails');
add_post_type_support( 'excerpt', array() );

function arcade_enqueue_assets() {
	wp_enqueue_style( 'arcade-main-style', get_stylesheet_directory_uri() . '/css/style.css', array(), ARCADE_THEME_VER );
	wp_enqueue_script( 'script', get_stylesheet_directory_uri() . '/js/script.js', array( 'jquery' ), ARCADE_THEME_VER, array( 'in_footer' => true ) );
	//wp_enqueue_script( 'plugins-js', get_stylesheet_directory_uri() . '/js/plugins.js', array( 'jquery' ), ARCADE_THEME_VER, array( 'in_footer' => true ) );

	wp_enqueue_script('bootstrap-js', 'https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js', [], null, true);
}
add_action( 'wp_enqueue_scripts', 'arcade_enqueue_assets' );



/**
 * Display popular post number.
  */
function display_popular_posts( $number_of_posts = 3 ) {

    $template_path = locate_template('partials/popular-posts.php');
    if ( ! $template_path ) {
        echo '<p>Template file not found.</p>';
        return;
    }
    // Get the template
    include $template_path;
}
/**
 * Display posts by category name Business or Culture.
  */
function display_posts_by_category_name ( $categories = ['Uncategorized'] ) {

    $template_path = locate_template('partials/sections-culture-business-posts.php');
    if ( ! $template_path ) {
        echo '<p>Template file not found.</p>';
        return;
    }

    // Get the tempate
    include $template_path;
   //include 'sections-culture-business-posts.php';
}


/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 */
function custom_excerpt_length( $length ) {
    return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


/**
 * This is the main function to register navigation menus
 *
 * @return void
 */

function arcade_register_nav_menus() {
	register_nav_menus(
		array(
			'primary_menu'      => __( 'Primary Menu', 'arcade' ),
			'secondary_menu'   	=> __( 'Secondary Menu', 'arcade' ),
			'mobile_menu' 		=> __( 'Mobile Menu', 'arcade' ),
			'footer_menu' 		=> __( 'Footer Menu', 'arcade' ),
		)
	);
    //register_nav_menu( 'primary', 'Primary Menu' );
}
add_action( 'after_setup_theme', 'arcade_register_nav_menus', 0 );

/**
 * Display category in sidebar
 */

 function display_categories_in_sidebar() {
    $categories = get_categories( array(
        'orderby' => 'name',
        'order'   => 'ASC',
    ) );

    echo '<ul class="categories">';
    foreach ( $categories as $category ) {
        echo '<li>
		      <a href="' . get_category_link( $category->term_id ) . '">' . $category->name . ' <span>(' . $category->count . ')</span></a> </li>';
    }
    echo '</ul>';
}

/**
 * Display FAQS category in sidebar
 */

function display_faq_categories_in_sidebar() {
    $faq_categories = get_terms( array(
        'taxonomy'   => 'faqs-category',
        'orderby'    => 'name',
        'order'      => 'ASC',
        'hide_empty' => true,
    ) );

    if ( ! empty( $faq_categories ) && ! is_wp_error( $faq_categories ) ) {
        echo '<ul class="categories">';
        foreach ( $faq_categories as $faq_category ) {
            echo '<li>
                <a href="' . esc_url( get_term_link( $faq_category ) ) . '">' 
                . esc_html( $faq_category->name ) . 
                ' <span>(' . $faq_category->count . ')</span>
                </a>
            </li>';
        }
        echo '</ul>';
    } else {
        echo '<p>No FAQ categories found.</p>';
    }
}

function include_faqs_in_category_archives( $query ) {
    if ( !is_admin() && $query->is_main_query() && is_category() ) {
        // Include both 'post' and 'faqs' in the query
        $query->set( 'post_type', array( 'post', 'faqs' ) );
    }
}
add_action( 'pre_get_posts', 'include_faqs_in_category_archives' );


/**
 * Register sidebar widget
 */
function main_register_sidebars() {
	register_sidebar(
		array(
			'id'            => 'footer-1',
			'name'          => __( 'Footer Sidebar 1' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
    register_sidebar(
		array(
			'id'            => 'footer-2',
			'name'          => __( 'Footer Sidebar 2' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);
    register_sidebar(
		array(
			'id'            => 'first-sidebar',
			'name'          => __( 'Page Sidebar 1' ),
			'description'   => __( 'A short description of the sidebar.' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		)
	);

}
add_action( 'widgets_init', 'main_register_sidebars' );