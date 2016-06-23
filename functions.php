<?php
/**
 * Function includes
 *
 * Include php-files form lib-folder
 * 
 */
include 'lib/custom_post_types.php';
include 'lib/cpt-showcase.php';

/*
* Add Theme Options Page
*/
include 'lib/theme-name-settings-page.php';

/*
* Add post thumbnail support
*/
add_theme_support( 'post-thumbnails' );

/*
* Disable Posts & Pages
*/
function remove_from_menu() {
    remove_menu_page( 'index.php' );                  	//Dashboard
	// remove_menu_page( 'jetpack' );                    		//Jetpack* 
	// remove_menu_page( 'edit.php' );                  	//Posts
	// remove_menu_page( 'upload.php' );                 		//Media
	remove_menu_page( 'edit.php?post_type=page' );    	//Pages
	// remove_menu_page( 'edit-comments.php' );          		//Comments
	// remove_menu_page( 'themes.php' );                 		//Appearance
	// remove_menu_page( 'plugins.php' );                		//Plugins
	// remove_menu_page( 'users.php' );                  		//Users
	// remove_menu_page( 'tools.php' );                  		//Tools
	// remove_menu_page( 'options-general.php' );        		//Settings 
}
add_action('admin_init', 'remove_from_menu');

/*
* Disable Posts & Pages from adminbar
*/
add_action( 'admin_bar_menu', 'remove_from_adminbar', 999 );
function remove_from_adminbar( $wp_admin_bar ) {
	$wp_admin_bar->remove_node( 'new-post' );
	$wp_admin_bar->remove_node( 'new-page' );
}

// Fix for WP Adminbar and Navbar conflict
add_filter('body_class', 'navfix_body_class');
function navfix_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

add_action('wp_head', 'navbar_wp_head');
function navbar_wp_head(){
    echo '<style>'.PHP_EOL;
    echo 'body.body-logged-in{ top: 28px !important; }'.PHP_EOL;
    echo 'body.body-logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    echo 'body.logged-in .navbar-fixed-top{ top: 28px !important; }'.PHP_EOL;
    echo '</style>'.PHP_EOL;
}

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
	wp_enqueue_script( 'extra-slider.js', get_template_directory_uri() . '/js/extra.slider.min.js', array(), 'null', true );
	wp_enqueue_style('extra-slider', get_template_directory_uri() . '/css/extra.slider.css');

	/* Font Awsome */
	wp_enqueue_style('FontAwsome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css');

	/* Awesome Cursor */
	wp_enqueue_script( 'AwesomeCursor', 'https://cdn.rawgit.com/jwarby/jquery-awesome-cursor/master/dist/jquery.awesome-cursor.min.js', array(), 'null', true );

	/* Google Fonts */
	wp_enqueue_style('SourceSansPro', 'https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,300i,400,400i,700,700i');
	wp_enqueue_style('Alegreya', 'https://fonts.googleapis.com/css?family=Alegreya:400,400i,700,700i');
	wp_enqueue_style('Inconsolata', 'https://fonts.googleapis.com/css?family=Inconsolata:400,700');

	/* User submitted Google font */
	wp_enqueue_style( get_theme_mod('custom_font') , 'https://fonts.googleapis.com/css?family=' . get_theme_mod('custom_font') );

	/* Enqueue custom CSS last! */
	wp_enqueue_script( 'theme-name.js', get_template_directory_uri() . '/js/theme-name.js', array(), rand(), true );
	wp_enqueue_style('theme-name-style', get_template_directory_uri() . '/css/theme-name-style.css');
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

/*
* Limit Excerpt Length
*/
function excerpt($limit) {
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }	
  $excerpt = preg_replace('`\[[^\]]*\]`','',$excerpt);
  return $excerpt;
}
 
function content($limit) {
  $content = explode(' ', get_the_content(), $limit);
  if (count($content)>=$limit) {
    array_pop($content);
    $content = implode(" ",$content).'...';
  } else {
    $content = implode(" ",$content);
  }	
  $content = preg_replace('/\[.+\]/','', $content);
  $content = apply_filters('the_content', $content); 
  $content = str_replace(']]>', ']]&gt;', $content);
  return $content;
}