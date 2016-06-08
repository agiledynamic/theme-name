<?php
/**
 * Function includes
 *
 * Include php-files form lib-folder
 * 
 */

include 'lib/custom_post_types.php';

/*
* Add post thumbnail support
*/
add_theme_support( 'post-thumbnails' );

/*
* Enqueue Custom Stylesheets
*/
add_action('wp_enqueue_scripts', 'custom_css');
function custom_css() {
	wp_enqueue_style('bootstrap-v4-alpha2', get_template_directory_uri() . '/bootstrap-v4.css');

	/* Enqueue custom CSS last! */
	wp_enqueue_style('theme-name-style', get_template_directory_uri() . '/theme-name-style.css');
	
	//wp_enqueue_script('unikt-namn', 'sökvägen till filen', array('jquery'), '1.0', true);
}

/*
* Add class .even to every second post on homepage
*/
function alternating_post_class($classes) {
     if( is_home() ) {
	global $wp_query;
	$classes[] = ( $wp_query->current_post%2 === 0 ? '' : 'even' );
      }
	return $classes;
}
add_filter('post_class', 'alternating_post_class');