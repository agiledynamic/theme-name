<?php
function theme_name_settings(){
	if (!current_user_can('manage_options')) {
	    wp_die('You do not have sufficient permissions to access this page.');
	}
}

function theme_name_settings_page() {
	?>
    <div class="wrap">
        <h2>Theme-Name Theme is hand coded with love by:</h2>
 
        <h3>Anders Berg</h3>
        <h3>Mikael Bjerkerot</h3>
        <h3>Viktor Schultzberg</h3>
    </div>
	<?php
}

function add_theme_settings_page() {
	add_menu_page("Theme-Name", "Theme-Name", "manage_options", "theme-name-settings", "theme_name_settings_page", "
dashicons-hammer", 59);
         
    add_submenu_page('theme-name-settings', 
        'Front Page Elements', 'Front Page', 'manage_options', 
        'theme-name-settings', 'theme_name_settings_page'); 
}
add_action("admin_menu", "add_theme_settings_page");

