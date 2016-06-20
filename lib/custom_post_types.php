<?php
/**
 *
 * cpt and metaboxes for contact in footer.php
 *
*/

/* METABOX for Contact Custom Post Type*/
add_action('admin_init', 'contact_meta_box');

function contact_meta_box(){
	add_meta_box('contact-meta', 'Project Options', 'contact_meta_options', 'contact', 'normal', 'high');
}

function contact_meta_options(){
	global $post;
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) return $post_id;

	$contact = get_post_custom($post->ID);

	?>
	<div class="inside">
		<div class="info">
			<h3>About you</h3>
			<label for="email">Email: </label>
			<input name="email" type="email" id="contact-meta__email" value="<?= $contact['email'][0]; ?> " />

			<label for="phone">Phonenumber: </label>
			<input name="phone" value="<?php echo $contact['phone'][0]; ?>" />

			<label for="webpage">Webpage: </label>
			<input name="webpage" value="<?php echo $contact['webpage'][0]; ?>" /> 
		</div>
		<div class="adress">
			<h3>Adress</h3>
			<label for="street">Street: </label>
			<input name="street" value="<?php echo $contact['street'][0]; ?>" />

			<label for="zipcode">Zip code: </label>
			<input name="zipcode" value="<?php echo $contact['zipcode'][0]; ?>" />

			<label for="city">City: </label>
			<input name="city" value="<?php echo $contact['city'][0]; ?>" />		
		</div>
		<div class="socialmedia">
			<h3>Social Media</h3>
			<label for="facebook">Facebook username: </label>
			<input name="facebook" value="<?php echo $contact['facebook'][0]; ?>" />

			<label for="linkedin">LinkedIn username: </label>
			<input name="linkedin" value="<?php echo $contact['linkedin'][0]; ?>" />

			<label for="instagram">Instagram username: </label>
			<input name="instagram" value="<?php echo $contact['instagram'][0]; ?>" />

			<label for="twitter">Twitter username: </label>
			<input name="twitter" value="<?php echo $contact['twitter'][0]; ?>" />
		</div>
	</div>
	<?php
}


/* Saves meta box in post */
add_action('save_post', 'save_contact_meta_box');

function save_contact_meta_box(){
	global $post;

	if( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
		return $post_id;
	}else{
		update_post_meta( $post->ID, 'email', $_POST['email']);
		update_post_meta( $post->ID, 'phone', $_POST['phone']);
		update_post_meta( $post->ID, 'webpage', $_POST['webpage']);
		update_post_meta( $post->ID, 'street', $_POST['street']);
		update_post_meta( $post->ID, 'zipcode', $_POST['zipcode']);
		update_post_meta( $post->ID, 'city', $_POST['city']);
		update_post_meta( $post->ID, 'facebook', $_POST['facebook']);
		update_post_meta( $post->ID, 'linkedin', $_POST['linkedin']);
		update_post_meta( $post->ID, 'instagram', $_POST['instagram']);
		update_post_meta( $post->ID, 'twitter', $_POST['twitter']);
	}
}



/* Custom Post Type for the about section in footer */
add_action('init', 'cpt_about');
function cpt_about() {

	$labels = array(
		'name'					=> _x('About', 'About you'),
		'menu_name'				=> _x('About', 'admin menu'),
		'add_new'				=> _x('Add info', 'item'),
		'add_new_item'			=> __('Add info about you'),
		'edit_item'				=> __('Edit Item'),
		'new_item'				=> __('New Item'),	
		'view_item'				=> __('View Item'),
		'search_items'			=> __('Search Items'),
		'not_found'				=> __('No items found'),
		'not_found_in_trash'	=> __('Nothing found'),
		'parent_item_colon'		=> __(''),
		'featured_image' 		=> __('Image'),
		'set_featured_image' 	=> __('Select image'),
		'remove_featured_image'	=> __('Remove image'),
		'use_featured_image' 	=> __('Use as image')
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Information',
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'public'				=> false,
		'publicly_queryble'		=> true,
		'show_ui'				=> true,
		'rewrite'				=> true,
		'query_var' 			=> true,
		'menu_postition'		=> 5,
		'posts_per_page'		=> 1,
		'supports'				=> array(
									'title', 
									'editor', 
									'thumbnail'
								)
	);
	register_post_type( 'about', $args );

}

/* limit excerpt to 20 words */
function my_excerpt_length($length) {
 
	return 20;

}

add_filter('excerpt_more', 'new_excerpt_more');

function new_excerpt_more($text){
	return ' (...)';
}

/* Custom Post Type for the social media and contant information section in Footer */
add_action('init', 'cpt_contact');
function cpt_contact(){

	$labels = array(
		'name'					=> _x('Contact', 'Get in contact'),
		'menu_name'				=> _x('Contact', 'admin menu'),
		'add_new'				=> _x('Add contact info', 'item'),
		'add_new_item'			=> __('Add contact info ..  you'),
		'edit_item'				=> __('Edit Item'),
		'new_item'				=> __('New Item'),	
		'view_item'				=> __('View Item'),
		'search_items'			=> __('Search Items'),
		'not_found'				=> __('No items found'),
		'not_found_in_trash'	=> __('Nothing found')
	);
	$args = array(
		'labels'				=> $labels,
		'description'			=> 'Contact Information',
		'capability_type'		=> 'post',
		'hierarchical'			=> false,
		'public'				=> false,
		'publicly_queryble'		=> true,
		'show_ui'				=> true,
		'rewrite'				=> true,
		'query_var' 			=> true,
		'menu_postition'		=> 5,
		'posts_per_page'		=> 1,
		'supports'				=> array(
									'title', 
									'	', 
									''
								)
	);
	register_post_type( 'contact', $args );
}

?>