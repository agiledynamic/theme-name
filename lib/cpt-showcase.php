<?php
/* Creates a meta-box for links to project and date */
add_action('admin_init', 'showcase_meta_box');

function showcase_meta_box(){
	add_meta_box('projInfo-meta', 'Project Options', 'showcase_meta_options', 'showcase', 'side', 'low');
}

function showcase_meta_options(){
	global $post;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	$custom = get_post_custom($post->ID);
	$link = $custom['proj-link'][0];
	$date = $custom['proj-date'][0];

	?>
	<div class="inside">
		<div class="">
			<label for="proj-starred">
			<input name="proj-starred" type="checkbox" id="proj-starred" value="Yes" <?php if ( isset( $custom['proj-starred'] ) ) checked( $custom['proj-starred'][0], 'Yes' ); ?> />
				Show post in your carousel
			</label>
		</div>

		<div class="">
			<label for="proj-date">Date: </label>
			<input name="proj-date" placeholder="YYYY-MM" value="<?php echo $date; ?>" /> <br><br>
		</div>

		<div class="">
			<label for="proj-link">Link: </label>
			<input name="proj-link" value="<?php echo $link; ?>" /> 
		</div>
	</div>
	<?php
}

/* Saves meta box in post */
add_action('save_post', 'save_project_meta_box');

function save_project_meta_box(){
	global $post;

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}else{
		update_post_meta( $post->ID, 'proj-link', $_POST['proj-link']);
		update_post_meta( $post->ID, 'proj-date', $_POST['proj-date']);
	}

	if( isset($_POST['proj-starred']) ){
		update_post_meta( $post->ID, 'proj-starred', 'Yes');
	}else{
		update_post_meta( $post->ID, 'proj-starred', 'No');
	}
}


/* Custom Post Type for Showcase */
add_theme_support('post-thumbnails');
//set_post_thumbnail_size( 200, 200, true );

add_action( 'init', 'cpt_showcase' );

function cpt_showcase() {

	$labels = array(
		'name'					=> _x('Showcase', 'post type general name'),
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
		'not_found_in_trash'	=> __('Nothing found'),
		'parent_item_colon'		=> __(''),
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
		'publicly_queryble'		=> true,
		'has_archive'			=> true,
		'show_ui'				=> true,
		'rewrite'				=> true,
		'query_var' 			=> true,
		'show_in_menu'			=> true,
		'menu_postition'		=> 5,
		'menu_icon'				=> 'dashicons-portfolio',
		'supports'				=> array(
									'title', 
									'editor', 
									'excerpt', 
									'comments',
									'thumbnail', 
									'page-attributes'
								)
	);
	register_post_type( 'showcase', $args );
}

/* Taxanomies for projects. i.e. A Wordpress page  */
/* UTVECKLA ELLER TA BORT */
function project_skill_taxanomy() {
	register_taxonomy(
		'Skills',
		'showcase',
		array(
			'hierarchical' 		=> true, 
			'label' 			=> 'Skills', 
			'singular_label' 	=> 'Skill', 
			'rewrite' 			=> true
		)
	);
}
add_action('init', 'project_skill_taxanomy');

/* Makes columns in admin view */ 
add_filter('manage_edit-showcase_columns', 'project_edit_columns');

function project_edit_columns($columns){

	$columns = array(
		'cb' 			=> '<input type=\"checkbox\" />',
		'title' 		=> 'Project',
		'description'	=> 'Description',
		'link'			=> 'Link',
		'skill'			=> 'Skills used in project',
		'proj-date'		=> 'Date of project',
		'starred'		=> 'Show in Carousel'
		);

	return $columns;
}

add_action('manage_posts_custom_column', 'project_custom_columns');

function project_custom_columns($column) {

	global $post;
	$custom = get_post_custom();

	switch($column){

		case 'description':
			the_excerpt();
			break;
		case 'link':
			echo $custom['proj-link'][0];
			break;
		case 'skill':
			echo get_the_term_list($post->ID, 'Skills', '', ', ','');
			break;
		case 'proj-date':
			echo $custom['proj-date'][0];
			break;
		case 'starred':
			echo $custom['proj-starred'][0];
			break;
	}
}

/* limit excerpt to 20 words */


function showcase_thumbnail_url($pid){
    $image_id = get_post_thumbnail_id($pid);  
    $image_url = wp_get_attachment_image_src($image_id,'screen-shot');  
    return  $image_url[0];  
}
?>