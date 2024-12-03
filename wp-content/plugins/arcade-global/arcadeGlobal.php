<?php
/*
* Plugin Name: ArcadeGlobal
* Version: 0.1  
* Description: This is my main plugin for my project
* */

if ( ! defined( 'ARCADE_PLUGIN_VERSION' ) ) {
    define( 'ARCADE_PLUGIN_VERSION', '0.1' );
}

if ( ! defined( 'ARCADE_PLUGIN_ASSETS_URL' ) ) {
    define( 'ARCADE_PLUGIN_ASSETS_URL',  plugin_dir_url( __FILE__ ) . 'assets' );
}


require 'includes/cpt-faqs.php';

// require 'includes/functions.php';