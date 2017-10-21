<?php

// Load the WPS Framework.
require_once( trailingslashit( get_template_directory() ) . 'wps_framework/wps-framework.php' );
new WPS_Framework();

// Sets up theme defaults and registers support for various WordPress features.
add_action( 'after_setup_theme', 'wps__theme_setup' );
function wps__theme_setup() {
  // Load the congif files.
  require_once( trailingslashit( CHILD_DIR ) . 'wps_config/wps_config.php' );
}




#### Add image size // plugin Force Regenerate Thumbnails 
if ( function_exists( 'add_image_size' ) ) {
  add_image_size( '480_630', 480, 630, true ); // true/false жесткая обрезка
} 
#### Allow the following image size
add_filter('intermediate_image_sizes', 'true_supported_image_sizes');
function true_supported_image_sizes( $sizes ) {
  return array(
    '150_150', // не удалять
  );
}



#### Path
define('REL_ASSETS_URI', 'wp-content/themes/'.get_stylesheet().'/assets/'); // for IMG in frontend
define('ABS_ASSETS_URI', get_stylesheet_directory_uri().'/assets');         // for JS and CSS

#### Подключение скриптов и стилей https://truemisha.ru/blog/wordpress/wp_enqueue_script.html
## Условные теги http://wp-kama.ru/id_89/uslovnyie-tegi-v-wordpress-i-vse-chto-s-nimi-svyazano.html
add_action( 'wp_enqueue_scripts', 'set_scripts_and_styles' );
function set_scripts_and_styles() {
  if( !is_admin() ){

    ## jQuery
    wp_deregister_script( 'jquery' );
    //wp_register_script  ( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js', false, null, true );
    wp_register_script( 'jquery', ABS_ASSETS_URI.'/js/jquery-3.2.1.min.js', false, null, true );

    ## register script and styles
    wp_register_style ( 'main_style', ABS_ASSETS_URI.'/css/style.css', array(), '1.0.0', null );
    wp_register_script( 'common-js', ABS_ASSETS_URI.'/js/common.js', array('jquery'), '1.0.0', true );

    //wp_register_style ( 'name', ABS_ASSETS_URI.'/css/', array(), '1.0.0', null );
    //wp_register_script( 'name', ABS_ASSETS_URI.'/js/', array('jquery'), '1.0.0', true );

    ## init
    //wp_enqueue_style ( 'name' );
    //wp_enqueue_script( 'name' );

    wp_enqueue_style ( 'main_style' );
    wp_enqueue_script( 'jquery' );
    
    wp_enqueue_script( 'common-js');
    
  }   
}


## Часть стилей в footer
add_action( 'get_footer', 'my_style_method' );
function my_style_method() {
  //wp_enqueue_style( 'awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css', array(), null, null );
};