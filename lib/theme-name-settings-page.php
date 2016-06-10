<?php
function theme_name_settings(){
	if (!current_user_can('manage_options')) {
	    wp_die('You do not have sufficient permissions to access this page.');
	}
}

function theme_name_settings_page() {
	?>
    <div class="wrap">
        <h2><span class="dashicons dashicons-id-alt"></span> Front page elements</h2>
 
        <form method="POST" action="">
            <form method="post" action="options.php">
	        <?php
	            settings_fields("section");
	            do_settings_sections("theme-options");      
	            submit_button(); 
	        ?>          
	    </form>
        </form>
    </div>
	<?php
}

function add_theme_settings_page() {
	add_menu_page("Theme Name Settings", "Theme Name Settings", "manage_options", "theme-name-settings", "theme_name_settings_page", "
dashicons-hammer", 59);
         
    add_submenu_page('theme-name-settings', 
        'Front Page Elements', 'Front Page', 'manage_options', 
        'theme-name-settings', 'theme_name_settings_page'); 
}
add_action("admin_menu", "add_theme_settings_page");

