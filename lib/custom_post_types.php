<?php
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 200, 200, true );

function my_custom_post_showcase() {


	$labels = array(
		'name'					=> _x('Showcases', 'post type general name'),
		'singular_name'			=> _x('Showcase', 'post type singular name'),
		'menu_name'				=> _x('Showcase', 'admin menu'),
		'name_admin_bar'		=> _x('Showcase', 'Add new on admin bar'),
		'add_new'				=> _x('Add New', 'item'),
		'add_new_item'			=> __('Add New Item'),
		'edit_item'				=> __('Edit Item'),
		'new_item'				=> __('New Item'),
		'all_items'				=> __('All Items'),
		'view_item'				=> __('View Item'),
		'search_items'			=> __('Search Items'),
		'not_found'				=> __('No items found'),
		'featured_image' 		=> __('Select featured image for the Showcase'),
		'set_featured_image' 	=> __('Select image'),
		'remove_featured_image'	=> __('Remove image'),
		'use_featured_image' 	=> __('Use as featured image'),
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Your Showcase',
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'public'				=> true,
		'menu_postition'		=> 5,
		'menu_icon'				=> 'dashicons-portfolio',
		'supports'				=> array(
			'title', 
			'editor', 
			'thumbnail', 
			'excerpt', 
			'custom-fields', 
			'page-attributes',
			'comments'
			)
	);

	register_post_type( 'showcase', $args );
}

add_action( 'init', 'my_custom_post_showcase' );

?>