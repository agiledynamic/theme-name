<?php
/**
 * Function includes
 *
 * Include php-files form lib-folder
 * 
 */
include 'lib/custom_post_types.php';


/*
* Add Theme Options Page
*/
include 'lib/theme-name-settings-page.php';

/*
* Add post thumbnail support
*/
add_theme_support( 'post-thumbnails' );

/*
* Enqueue Custom Stylesheets
*/
add_action('wp_enqueue_scripts', 'customs_scripts');
function customs_scripts() {
	/* Bootstrap v4 Alpha */
	wp_enqueue_style('bootstrap-v4-alpha2', get_template_directory_uri() . '/css/bootstrap-v4.css');

	/* TweenMax &  Greensock Draggable */
	wp_enqueue_script( 'tweenmax-js', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/TweenMax.min.js', array('jquery'), 'null', true );
	wp_enqueue_script( 'gs-draggable-js', '//cdnjs.cloudflare.com/ajax/libs/gsap/1.18.4/utils/Draggable.min.js', array('jquery'), 'null', true );

	/* Extra Slider */
	wp_enqueue_script( 'extra-slider.js', get_template_directory_uri() . '/js/extra.slider.js', array(), 'null', true );
	wp_enqueue_style('extra-slider', get_template_directory_uri() . '/css/extra.slider.css');

	/* Google Fonts */
	wp_enqueue_style('gfonts-source-sans', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:400,300,400italic,700,600italic,600,700italic,900,900italic,300italic,200italic,200');

	/* Enqueue custom CSS last! */
	wp_enqueue_script( 'theme-name.js', get_template_directory_uri() . '/js/theme-name.js', array(), '1.0', true );
	wp_enqueue_style('theme-name-style', get_template_directory_uri() . '/css/theme-name-style.css');
}
/*
* Enqueue Theme Customizer JS
*/
add_action( 'customize_preview_init' , 'my_customizer_preview' );
function my_customizer_preview() {
	wp_enqueue_script( 
		'my_theme_customizer',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array(  'jquery', 'customize-preview' ),
		'',
		true
	);
}

/*
* Theme Customizer Support
*/
include 'lib/theme-name_customizer.php';


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