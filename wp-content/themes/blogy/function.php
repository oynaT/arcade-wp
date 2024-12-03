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