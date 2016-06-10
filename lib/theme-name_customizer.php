<?php
/*
* Theme Name Customizer
*/

/*
* Font color option
*/
add_action( 'customize_register' , 'theme_name_options' );
function theme_name_options( $wp_customize ) {
	// Add Customizer section
	$wp_customize->add_section( 
		'theme-name_color_options', 
		array(
			'title'       => 	__( 'Color Settings', 'theme-name' ),
			'priority'    => 	100,
			'capability'  => 	'edit_theme_options',
			'description' => 	__('Change Colors here.', 'theme-name'), 
		) 
	);
	// Add font color setting
	$wp_customize->add_setting( 
		'paragraph_font_color', // <p>
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'h1_font_color', // <h1>
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'h2_font_color', // <h2>
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'h3_font_color', // <h3>
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	// Add Font Color Control to section
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'paragraph_color_control',
		array(
			'label'    =>	__( '&lt;P&gt; Paragraph Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'paragraph_font_color',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'h1_color_control',
		array(
			'label'    =>	__( '&lt;H1&gt; Heading 1 Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'h1_font_color',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'h2_color_control',
		array(
			'label'    =>	__( '&lt;H2&gt; Heading 2 Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'h2_font_color',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'h3_color_control',
		array(
			'label'    =>	__( '&lt;H3&gt; Heading 3 Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'h3_font_color',
			'priority' =>	10,
		) 
	));
}

/*
* Implementing Customizer CSS changes.
*/
add_action( 'wp_head', 'implement_customizer_css' );
function implement_customizer_css(){
	?>
	<style type="text/css" media="screen">
		p.theme-font-color {
			color: <?php echo get_theme_mod('paragraph_font_color'); ?>;
		}
		h1.theme-font-color {
			color: <?php echo get_theme_mod('h1_font_color'); ?>;
		}
		h2.theme-font-color {
			color: <?php echo get_theme_mod('h2_font_color'); ?>;
		}
		h3.theme-font-color {
			color: <?php echo get_theme_mod('h3_font_color'); ?>;
		}
	</style>
	<?php
}

/*
*
*/
add_action( 'customize_preview_init', 'theme_name_customize_preview' );
function theme_name_customize_preview() {
	wp_enqueue_script(
		'theme-name_customizer',
		get_template_directory_uri().'js/theme-customizer.js',
		array(
			'jquery',
			'customize-preview'
		),
		'',
		true
	);
}
