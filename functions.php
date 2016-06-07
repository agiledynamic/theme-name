<?php
/**
 * Function includes
 *
 * Include php-files form lib-folder
 * 
 */

include 'lib/custom_post_types.php';

add_action('wp_enqueue_scripts', 'custom_css');

function custom_css() {
	//wp_enqueue_style('theme-name-style' );
	wp_enqueue_style('theme-name-style', get_template_directory_uri() . '/theme-name-style.css');
	wp_enqueue_style('bootstrap-v4-alpha2', get_template_directory_uri() . '/bootstrap-v4.css');
	//wp_enqueue_script('unikt-namn', 'sökvägen till filen', array('jquery'), '1.0', true);
}