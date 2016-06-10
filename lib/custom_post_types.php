<?php

/*
function cpt_showcase_page() {
	$labels = array(

	);

	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Your Showcase page',
		'capability_type'		=> 'page',
		'hierarchical'			=> true,
		'public'				=> true,
		'menu_postition'		=> 5,
		'supports'				=> array(
			'title',
			'editor',
			),
	);

}
*/

/* Creates a meta-box for links to project */
add_action('admin_init', 'showcase_meta_box');

function showcase_meta_box(){
	add_meta_box('projInfo-meta', 'Project Options', 'showcase_meta_options', 'showcase', 'side', 'low');
}

function showcase_meta_options(){
	global $post;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	$custom = get_post_custom($post->ID);
	$link = $custom['projLink'][0];
	
	?> 
	<label for="projLink">Link:</label>
	<input name="projLink" value="<?php echo $link; ?>" /> 
	<?php
}

/* Saves meta link in post*/
add_action('save_post', 'save_project_link');

function save_project_link(){
	global $post;

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}else{
		update_post_meta( $post->ID, 'projLink', $_POST['projLink']);
	}

}

/* Custom Post Type for Showcase */
add_theme_support('post-thumbnails');
set_post_thumbnail_size( 200, 200, true );

add_action( 'init', 'cpt_showcase' );

function cpt_showcase() {

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
		'use_featured_image' 	=> __('Use as featured image')

	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Your Showcase items',
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'public'				=> true,
		'menu_postition'		=> 5,
		'menu_icon'				=> 'dashicons-portfolio',
		'supports'				=> array(
									'title', 
									'editor', 
									'excerpt', 
									'comments',
									'thumbnail', 
									'custom-fields', 
									'page-attributes'
									)
	);

	register_post_type( 'showcase', $args );
}

/* Taxanomies for projects. i.e. A Wordpress page  */
/* UTVECKLA ELLER TA BORT */
function project_type_taxanomy() {
	register_taxonomy(
		'project-type',
		'showcase',
		array(
			'hierarchical' => true, 
			'label' => 'Project Types', 
			'singular_label' => 'Project Type', 
			'rewrite' => true
		)
	);
}
add_action('init', 'project_type_taxanomy');


/* Makes columns in admin view */ 
add_filter('manage_edit-showcase_columns', 'project_edit_columns');

function project_edit_columns($columns){

	$columns = array(
		'cb' 			=> '<input type=\"checkbox\" />',
		'title' 		=> 'Project',
		'description'	=> 'Description',
		'link'			=> 'Link',
		'type'			=> 'Type of project'
		);

	return $columns;
}

add_action('manage_posts_custom_column', 'project_custom_columns');

function project_custom_columns($column) {

	global $post;

	switch($column){

		case 'description':
			the_excerpt();
			break;
		case 'link':
			$custom = get_post_custom();
			echo $custom['projLink'][0];
			break;
		case 'type':
			echo get_the_term_list($post->ID, 'project-type', '', ', ','');
			break;
	}
}

/* limit excerpt tp 20 words */
add_filter('excerpt_length', 'my_excerpt_length');

function my_excerpt_length($length) {
 
	return 20;

}

add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more($text){

	return 'more more more';
}

function showcase_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid);  
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
    return  $image_url[0];  
}
?>