<?php

add_theme_support( 'title-tag' );
add_theme_support( 'post-thumbnails'); 
add_post_type_support( 'excerpt', array() );

// add_action( 'wp_enqueue_scripts', 'grand_sunrise_enqueue_styles' );

// function grand_sunrise_enqueue_styles() {
// 	wp_enqueue_style( 
// 		'grand-sunrise-style', 
// 		get_stylesheet_uri()
// 	);
// }


// add_action( 'wp_enqueue_scripts', 'blogy_enqueue_styles' );

// function blogy_enqueue_styles() {
// 	wp_enqueue_style( 
// 		'twentytwentyfour-parent-style', 
// 		get_parent_theme_file_uri( '/css/style.css' )
// 	);
// }


/**
 * This is the main function to register navigation menus
 *
 * @return void
 */


/**
 * This is the main function to register navigation menus
 *
 * @return void
 */

function arcade_register_nav_menus() {
	// register_nav_menus(
	// 	array(
	// 		'primary_menu'          => __( 'Primary Menu', 'textdomain' ),
	// 		'primary_menu_mobile'   => __( 'Primary Menu Mobile', 'textdomain' ),
	// 		'footer_menu_site_info' => __( 'Footer Menu Site Info', 'textdomain' ),
	// 	)
	// );

    register_nav_menu( 'primary', 'Primary Menu' );
}

add_action( 'after_setup_theme', 'arcade_register_nav_menus', 0 );