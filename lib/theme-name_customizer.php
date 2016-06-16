<?php
/*
* Theme Name Customizer
*/

/*
* Color options
*/
add_action( 'customize_register' , 'theme_name_options' );
function theme_name_options( $wp_customize ) {
	// Add Customizer section
	$wp_customize->add_section( 
		'theme-name_color_options', 
		array(
			'title'       	=> 		__( 'Color Settings', 'theme-name' ),
			'priority'    	=> 		100,
			'capability'  	=> 		'edit_theme_options',
			'description' 	=> 		__('Change Colors here.', 'theme-name'), 
		) 
	);
	$wp_customize->add_section(
		'theme-name-font-options',
		array(
			'title'			=>		__('Typography', 'theme-name'),
			'prority'		=>		110,
			'description'	=>		__('All your typography needs. In one place.', 'theme-name')
		)
	);
	// Add color settings
	$wp_customize->add_setting( 
		'primary_color',
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'secondary_color',
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'accent_color_one',
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);
	$wp_customize->add_setting( 
		'accent_color_two',
		array(
			'default' 	=> 	'',
			'transport'	=>	'postMessage'
		)
	);

	// Add typography settings
	$wp_customize->add_setting(
		'paragraph_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'h1_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'h2_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'h3_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'h4_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'nav_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);
	$wp_customize->add_setting(
		'custom_font',
		array(
			'default' 	=>	'Source Sans Pro',
			'transport'	=> 	'postMessage'
		)
	);

	// Add Color Controls to Customizer Section
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'primary_color_control',
		array(
			'label'    =>	__( 'Primary Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'primary_color',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'secondary_color_control',
		array(
			'label'    =>	__( 'Secondary Color', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'secondary_color',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'accent_color_one_control',
		array(
			'label'    =>	__( 'Accent Color One', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'accent_color_one',
			'priority' =>	10,
		) 
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( 
		$wp_customize, 
		'accent_color_two_control',
		array(
			'label'    =>	__( 'Accent Color Two', 'theme-name' ), 
			'section'  =>	'theme-name_color_options',
			'settings' =>	'accent_color_two',
			'priority' =>	10,
		) 
	));

	// Add Font Controls to Customizer Section
	$wp_customize->add_control(
		'paragraph_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('Paragraph Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'paragraph_font',
			'priority'	=>	10,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control(
		'h1_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('H1 Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'h1_font',
			'priority'	=>	20,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control(
		'h2_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('H2 Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'h2_font',
			'priority'	=>	30,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control(
		'h3_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('H3 Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'h3_font',
			'priority'	=>	40,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control(
		'h4_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('H4 Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'h4_font',
			'priority'	=>	50,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control(
		'nav_font_control',
		array(
			'type'		=> 'radio',
			'label'		=>	__('Nav Font', 'theme-name'),
			'section'	=>	'theme-name-font-options',
			'settings'	=>	'nav_font',
			'priority'	=>	60,
			'choices' => array(
                  'Source Sans Pro' => 'Source Sans Pro (sans-serif)',
                  'Alegreya' => 'Alegreya (serif)',
                  'Inconsolata'	=>	'Inconsolata (monotype)',
                  get_theme_mod('custom_font')	=>	get_theme_mod('custom_font'),
              ),
		)
	);
	$wp_customize->add_control( 
		'custom_font_control', 
		array(
			'type'			=> 'text',
			'label'			=> __( 'Google Fonts', 'theme-name' ),
			'description'	=>	__('Paste URL to a specific Google Font.', 'theme-name'),
			'section' 		=> 'theme-name-font-options',
			'settings' 		=> 'custom_font',
			'priority'		=> 70,
		) 
	);
	/*
	if ( class_exists('WP_Customize_Control')) {
		class WP_Customize_Textarea_Control extends WP_Customize_Control {
			public $type = 'textarea';

			public function render_content() {
				?>
					<label>
						<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
						<textarea rows="2" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
					</label>
				<?php
			}
		}
	}
	$wp_customize->add_control( new WP_Customize_Textarea_Control( 
		$wp_customize, 
		'custom_font_control', 
		array(
			'label'			=> __( 'Google Fonts', 'theme-name' ),
			'description'	=>	__('Paste URL to a specific Google Font.', 'theme-name'),
			'section' 		=> 'theme-name-font-options',
			'settings' 		=> 'custom_font',
			'priority'		=> 70,
		) 
	)); */

	// Remove unnecessary sections
    $wp_customize->remove_section('static_front_page');
}

/*
* Implementing Customizer CSS changes.
*/
add_action( 'wp_head', 'implement_customizer_css' );
function implement_customizer_css(){
	?>
	<style type="text/css" media="screen">
		/* Theme custom colors */
		.primary-color { color: <?php echo get_theme_mod('primary_color'); ?>; }
		.primary-color-bg { background-color: <?php echo get_theme_mod('primary_color'); ?>; }
		.secondary-color { color: <?php echo get_theme_mod('secondary_color'); ?>; }
		.secondary-color-bg { background-color: <?php echo get_theme_mod('secondary_color'); ?>; }
		.accent-color-one { color: <?php echo get_theme_mod('accent_color_one'); ?>; }
		.accent-color-one-bg { background-color: <?php echo get_theme_mod('accent_color_one'); ?>; }
		.accent-color-two { color: <?php echo get_theme_mod('accent_color_two'); ?>; }
		.accent-color-two-bg { background-color: <?php echo get_theme_mod('accent_color_two'); ?>; }

		/* Theme custom fonts */
		.paragraph-font { font-family: <?php echo get_theme_mod('paragraph_font'); ?>; }
		.h1-font { font-family: <?php echo get_theme_mod('h1_font'); ?>; }
		.h2-font { font-family: <?php echo get_theme_mod('h2_font'); ?>; }
		.h3-font { font-family: <?php echo get_theme_mod('h3_font'); ?>; }
		.h4-font { font-family: <?php echo get_theme_mod('h4_font'); ?>; }
		.nav-font { font-family: <?php echo get_theme_mod('nav_font'); ?>; }
		<?php echo get_theme_mod('paragraph_font'); ?>
	</style>
	<?php
}

/*
* Enqueue Theme Customizer JS
*/
add_action( 'customize_preview_init' , 'customizer_preview' );
function customizer_preview() {
	wp_enqueue_script( 
		'my_theme_customizer',
		get_template_directory_uri() . '/js/theme-customizer.js',
		array(  'jquery', 'customize-preview' ),
		'',
		true
	);
}
