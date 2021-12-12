<?php
/**
 * kirki-theme Theme Customizer
 *
 * @package kirki-theme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kirki_theme_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'kirki_theme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'kirki_theme_customize_partial_blogdescription',
			)
		);
	}
}
add_action( 'customize_register', 'kirki_theme_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function kirki_theme_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function kirki_theme_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function kirki_theme_customize_preview_js() {
	wp_enqueue_script( 'kirki-theme-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'kirki_theme_customize_preview_js' );

Kirki::add_config( 'stack_config', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );
Kirki::add_panel( 'stack-panel1', array(
    'priority'    => 10,
    'title'       => esc_html__( 'Stack Option', 'kirki-theme' ),
    'description' => esc_html__( 'Description', 'kirki-theme' ),
) );


// Banner Section
Kirki::add_section( 'banner_section', array(
    'title'          => esc_html__( 'Banner Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Custom Setting
Kirki::add_field( 'stack_config', [
	'type'        => 'custom',
	'settings'    => 'custom_setting',
	'section'     => 'banner_content_section',
	'default'     => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Banner Content', 'kirki-theme' ) . '</h3>',
	'priority'    => 10,
] ); 
// Banner Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'banner_heading',
	'label'    => esc_html__( 'Banner Heading', 'kirki-theme' ),
	'section'  => 'banner_section',
	'default'  => esc_html__( 'WE DISCOVER, DESIGN & BUILD DIGITAL
PRESENCE OF BUSINESSES', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.head-title',
			'function' => 'html',
		)  
	)
	
] );
// Heading Color
Kirki::add_field( 'stack_config', [
	'type'        => 'typography',
	'settings'    => 'banner_heading_typo',
	'label'       => esc_html__( 'Banner Heading Typo', 'kirki-theme' ),
	'section'     => 'banner_section',
	'default'     => [
		'font-family'    => 'Titillium Web',
		'variant'        => '700',
		'font-size'      => '30px',
		'line-height'    => '48px',
		'letter-spacing' => '0',
		'color'          => '#585b60',
		'text-transform' => 'uppercase',
		'text-align'     => 'center',
	],
	'priority'    => 10,
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#hero-area .contents .head-title ',
		],
	],
] );
// banner btn text
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'banner_btn_text',
	'label'    => __( 'Banner Btn text', 'kirki-theme' ),
	'section'  => 'banner_section',
	'default'  => esc_html__( 'explore', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.btn-common',
			'function' => 'html',
		)  
	)
] );
// Banner btn link
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'banner_link',
	'label'    => __( 'Banner Link', 'kirki-theme' ),
	'section'  => 'banner_section',
	'default'  => esc_html__( 'https://facebook.com/','kirki-theme'),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.btn-common',
			'function' => 'html',
		)  
	)
] );

// Banner Section
Kirki::add_field( 'stack_config', [
	'type'        => 'custom',
	'settings'    => 'banner_section_setting',
	'section'     => 'banner_section',
	'default'     => '<h3 style="padding:15px 10px; background:#fff; margin:0;">' . __( 'Banner Section', 'kirki-theme' ) . '</h3>',
	'priority'    => 10,
] ); 
// Banner section image
Kirki::add_field( 'stack_config', [
	'type'        => 'background',
	'settings'    => 'banner_section_image',
	'label'       => esc_html__( 'Background  Iamge Setting', 'kirki-theme' ),
	'section'     => 'banner_section',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'fixed',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#hero-area',
		],
	],
] );

// About Section
Kirki::add_section( 'about_section', array(
    'title'          => esc_html__( 'About Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );

// About Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'about_heading',
	'label'    => esc_html__( 'About Heading', 'kirki-theme' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'We are helping to grow
           your business.S', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.title-hl',
			'function' => 'html',
		)  
	)
	
] );
// About Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'about_desc',
	'label'    => esc_html__( 'About Text', 'kirki-theme' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'A digital studio specialising in User Experience & eCommerce, we combine innovation with digital craftsmanship to help brands fulfill their potential.', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.mb-4',
			'function' => 'html',
		)  
	)
	
] );
// About btn text
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'about_btn_text',
	'label'    => __( 'About Btn text', 'kirki-theme' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'MORE ABOUT US', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.btn-common',
			'function' => 'html',
		)  
	)
] );
// Banner btn link
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'about_link',
	'label'    => __( 'About Link', 'kirki-theme' ),
	'section'  => 'about_section',
	'default'  => esc_html__( 'https://facebook.com/','kirki-theme'),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.btn-common',
			'function' => 'html',
		)  
	)
] );

// About Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Add About Items', 'kirki-theme' ),
	'section'     => 'about_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add new About Item', 'kirki-theme' ),
		'field' =>'about_item_title',
 	],
	'button_label' => esc_html__('Add new About Item" button label (optional) ', 'kirki-theme' ),
	'settings'     => 'about_repeater',
	'default'      => [
		[
			'about_item_icon' => 'lni-microphone' ,
			'about_item_title' => __( 'WHAT WE DO', 'kirki-theme' ),
			'about_item_desc'  => __( 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia con- sequuntur magni dolores', 'kirki-theme' ),
		],

	],
	'fields' => [
		'about_item_icon' => [
			'type'        => 'select',
			'label'       => esc_html__( 'About Item Icon', 'kirki-theme' ),
			'default'     => '',
			'choices'     => array(
		 'lni-microphone' =>__('Icon Item 1','kirki-theme') , 
		 'lni-users'      =>__('Icon Item 2','kirki-theme') , 
		 'lni-medall-alt' =>__('Icon Item 3','kirki-theme') , 


			)
		],
		'about_item_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'About Item Title', 'kirki-theme' ),
			'default'     => '',
		],
		'about_item_desc'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'About Description', 'kirki-theme' ),
			'default'     => '',
		],
	],
	'choices' => [
		'limit' => 3
	],
] );

// About Services
Kirki::add_section( 'services_section', array(
    'title'          => esc_html__( 'About Services', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Service Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'service_show',
	'label'    => esc_html__( 'Service Want to Show ', 'kirki-theme' ),
	'section'  => 'services_section',
	'default'  => true,
	
	
	
] );
// Service Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'service_heading',
	'label'    => esc_html__( 'Service Heading', 'kirki-theme' ),
	'section'  => 'services_section',
	'default'  => esc_html__( 'OUR SERVICES', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.section-title',
			'function' => 'html',
		)  
	)
	
] );
// Service Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'service_desc',
	'label'    => esc_html__( 'Service Description', 'kirki-theme' ),
	'section'  => 'services_section',
	'default'  => esc_html__( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	'transport'   => 'postMessage',
	'js_vars' => array(
		array(
			'element'  => '.service_para',
			'function' => 'html',
		)  
	)
	
] );

// Services Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Add About Items', 'kirki-theme' ),
	'section'     => 'services_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add new Services Item', 'kirki-theme' ),
		'field' =>'services_item_title',
 	],
	'button_label' => esc_html__('Add new Services Item" button label (optional) ', 'kirki-theme' ),
	'settings'     => 'services_repeater',
	'default'      => [
		[
			'services_item_icon' => 'lni-pencil' ,
			'services_item_title' => __( 'CONTENT WRITING', 'kirki-theme' ),
			'services_item_desc'  => __( 'Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia con- sequuntur magni dolores', 'kirki-theme' ),
		],

	],
	'fields' => [
		'services_item_icon' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Services Item Icon', 'kirki-theme' ),
			'default'     => '',
			'choices'     => array(
		 'lni-pencil'     =>__('Icon Item 1','kirki-theme') , 
		 'lni-briefcase'  =>__('Icon Item 2','kirki-theme') , 
		 'lni-cog'        =>__('Icon Item 3','kirki-theme') , 
		 'lni-mobile'     =>__('Icon Item 4','kirki-theme') , 
		 'lni-layers'     =>__('Icon Item 5','kirki-theme') , 
		 'lni-rocket'     =>__('Icon Item 6','kirki-theme') , 


			)
		],
		'services_item_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Services Item Title', 'kirki-theme' ),
			'default'     => '',
		],
		'services_item_desc'  => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Services Description', 'kirki-theme' ),
			'default'     => '',
		],
	],
	'choices' => [
		'limit' => 6
	],
] );

// Service Alignment
Kirki::add_field( 'stack_config', [
	'type'     => 'radio-buttonset',
	'settings' => 'service_align',
	'label'    => esc_html__( 'Service Alignment', 'kirki-theme' ),
	'section'  => 'services_section',
	'default'  => 'Left',
	'choices'     => [
		'left'    => esc_html__( 'Left', 'kirki' ),
		'right'   => esc_html__( 'Right', 'kirki' ),
		'center'  => esc_html__( 'Center', 'kirki' ),
	],
	'output'    =>array(

			array(
				'element' => '.services-item',
				'property' =>'text-align',
			)
	)

	
] );
// Service Alignment Number
Kirki::add_field( 'stack_config', [
	'type'     => 'select',
	'settings' => 'service_align_number',
	'label'    => esc_html__( 'Service Alignment Number', 'kirki-theme' ),
	'section'  => 'services_section',
	'default'  => 'col-lg-4',
	'choices'     => [
		'col-lg-4'    => esc_html__( '3 Columns', 'kirki-theme' ),
		'col-lg-6'   => esc_html__( '2 Columns', 'kirki-theme' ),
		'col-lg-3'  => esc_html__( '4 Columns', 'kirki-theme' ),
	],
	

	
] );
// Video Section
Kirki::add_section( 'video_section', array(
    'title'          => esc_html__( 'Video Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Video Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'video_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'video_section',
	'default'  => true,
	
	
	
] );
// Video Url
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'video_url',
	'label'    => esc_html__( 'Video URl', 'kirki-theme' ),
	'section'  => 'video_section',
	'default'  => 'https://www.youtube.com/watch?v=yP6kdOZHids',
	'priority' => 10,
	
	
] );
// Video Title
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'video_text',
	'label'    => esc_html__( 'Video text', 'kirki-theme' ),
	'section'  => 'video_section',
	'default'  =>esc_html__( 'WACTH VIDEO', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
Kirki::add_field( 'stack_config', [
	'type'        => 'background',
	'settings'    => 'video_setting',
	'label'       => esc_html__( 'Background Control', 'kirki' ),
	'section'     => 'video_section',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'no-repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'fixed',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '.video-promo',
		],
	],
] );


// Team Section
Kirki::add_section( 'team_section', array(
    'title'          => esc_html__( 'Team Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Team Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'team_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'team_section',
	'default'  => true,
	
	
	
] );

// Team Title
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'team_text',
	'label'    => esc_html__( 'Team text', 'kirki-theme' ),
	'section'  => 'team_section',
	'default'  =>esc_html__( 'MEET OUR TEAM', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Team Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'team_desc',
	'label'    => esc_html__( 'Team DESCRIPTION', 'kirki-theme' ),
	'section'  => 'team_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Team Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Team Items', 'kirki-theme' ),
	'section'     => 'team_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'kirki-theme' ),
		'field' => 'team_title',
	],
	'button_label' => esc_html__('Add New About Item', 'kirki-theme' ),
	'settings'     => 'team_repeater',
	'fields' => [
        'team_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Team Image', 'kirki-theme' ),
			'default'     => '',
		],
		'team_facebook' => [
			'type'        => 'link',
			'label'       => esc_html__( 'Facebook URL', 'kirki-theme' ),
			'default'     => 'https://www.facebook.com',
		],
		'team_twitter' => [
			'type'        => 'link',
			'label'       => esc_html__( 'Twitter URL', 'kirki-theme' ),
			'default'     => 'https://www.twitter.com',
		],
		'team_instagram' => [
			'type'        => 'link',
			'label'       => esc_html__( 'Instagram URL', 'kirki-theme' ),
			'default'     => 'https://www.instagram.com',
		],
		'team_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Team Name', 'kirki-theme' ),
			'default'     => __('John Doe', 'kirki-theme'),
		],
		'team_desg' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Team Designation', 'kirki-theme' ),
			'default'     => __('Web Developer', 'kirki-theme'),
		],
	],
    'choices' => [
		'limit' => 4
	],
] );
// Counter Section
Kirki::add_section( 'counter_section', array(
    'title'          => esc_html__( 'Counter Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Counter Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'counter_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'counter_section',
	'default'  => true,
	
	
	
] );

// Counter Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'counter_heading',
	'label'    => esc_html__( 'Counter text', 'kirki-theme' ),
	'section'  => 'counter_section',
	'default'  =>esc_html__( 'MEET OUR TEAM', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Counter Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'counter_desc',
	'label'    => esc_html__( 'Counter DESCRIPTION', 'kirki-theme' ),
	'section'  => 'counter_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Counter Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Counter Items', 'kirki-theme' ),
	'section'     => 'counter_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'kirki-theme' ),
		'field' => 'counter_title',
	],
	'button_label' => esc_html__('Add New Counter Item', 'kirki-theme' ),
	'settings'     => 'counter_repeater',
	'fields' => [
        'counter_icon' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Counter Icon', 'kirki-theme' ),
			'default'     => '',
			'choices'     => array(
				'lni-users' => __('Users', 'kirki-theme'),
				'lni-emoji-smile' => __('Smile', 'kirki-theme'),
				'lni-download' => __('Download', 'kirki-theme'),
				'lni-thumbs-up' => __('Thumbs Up', 'kirki-theme'),
			),
		],
		'counter_number' => [
			'type'        => 'number',
			'label'       => esc_html__( 'Counter Number', 'kirki-theme' ),
			'default'     => '100',
		],
		'counter_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Counter Title', 'kirki-theme' ),
			'default'     => __('Users', 'kirki-theme'),
		],
		'counter_animation_name' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Counter Animation Name', 'kirki-theme' ),
			'default'     => 'fadeInUp',
			'choices'     => array(
				'fadeInUp' => __('fadeInUp', 'kirki-theme'),
				'fadeInLeft' => __('fadeInLeft', 'kirki-theme'),
				'fadeInRight' => __('fadeInRight', 'kirki-theme'),
			),
		],
		'counter_animation_duration' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Counter Animation Duration', 'kirki-theme' ),
			'default'     => '0.2s',
			'choices'     => array(
				'0.2s' => __('0.2s', 'kirki-theme'),
				'0.4s' => __('0.4s', 'kirki-theme'),
				'0.6s' => __('0.6s', 'kirki-theme'),
				'0.8s' => __('0.8s', 'kirki-theme'),
			),
		],
	],
    'choices' => [
		'limit' => 4
	],
] );

// Counter Background
Kirki::add_field( 'stack_config', [
	'type'        => 'background',
	'settings'    => 'counter_background',
	'label'       => esc_html__( 'Background', 'kirki-theme' ),
	'section'     => 'counter_section',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#counter',
		],
	],
] );
// Pricing Section
Kirki::add_section( 'pricing_section', array(
    'title'          => esc_html__( 'Pricing Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Pricing Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'pricing_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'pricing_section',
	'default'  => true,
	
	
	
] );

// Pricing Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'pricing_heading',
	'label'    => esc_html__( 'Pricing text', 'kirki-theme' ),
	'section'  => 'pricing_section',
	'default'  =>esc_html__( 'Best Pricing', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Pricing Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'pricing_desc',
	'label'    => esc_html__( 'Pricing DESCRIPTION', 'kirki-theme' ),
	'section'  => 'pricing_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Price Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Price Items', 'kirki-theme' ),
	'section'     => 'pricing_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'kirki-theme' ),
		'field' => 'price_name',
	],
	'button_label' => esc_html__('Add New Price Item', 'kirki-theme' ),
	'settings'     => 'price_repeater',
	'fields' => [
		'price_featured' => [
			'type'        => 'checkbox',
			'label'       => esc_html__( 'Featured?', 'kirki-theme' ),
			'default'     => false,
		],
        'price_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Price Name', 'kirki-theme' ),
			'default'     => __('Basic', 'kirki-theme'),
		],
		'price_amount' => [
			'type'        => 'number',
			'label'       => esc_html__( 'Price Amount', 'kirki-theme' ),
			'default'     => __('12.99', 'kirki-theme'),
		],
		'price_days' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Select Days', 'kirki-theme' ),
			'default'     => '',
			'choices'    => array(
				'month' => __('month', 'kirki-theme'),
				'year' => __('year', 'kirki-theme'),
			)
		],
		
		'price_feature-1' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Feature 1', 'kirki-theme' ),
			'default'     => __('Business Analyzing', 'kirki-theme'),
		],
		
		'price_feature-2' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Feature 2', 'kirki-theme' ),
			'default'     => __('24/7 Tech Suport', 'kirki-theme'),
		],
		
		'price_feature-3' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Feature 3', 'kirki-theme' ),
			'default'     => __('Operational Excellence', 'kirki-theme'),
		],
		
		'price_feature-4' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Feature 4', 'kirki-theme' ),
			'default'     => __('2 Database', 'kirki-theme'),
		],
		
		'price_feature-5' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Feature 5', 'kirki-theme' ),
			'default'     => __('Customer Support', 'kirki-theme'),
		],

		'price_btn_text' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Button Label', 'kirki-theme' ),
			'default'     => __('Get It', 'kirki-theme'),
		],
		'price_btn_url' => [
			'type'        => 'link',
			'label'       => esc_html__( 'Button URL', 'kirki-theme' ),
			'default'     => 'https://wwww.facebook.com',
		],
	],
    'choices' => [
		'limit' => 3
	],
] );

// Skill Section
Kirki::add_section( 'skill_section', array(
    'title'          => esc_html__( 'Skill Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Skill Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'checkbox',
	'settings' => 'skill_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'skill_section',
	'default'  => true,
	
	
	
] );

// Skill Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'skill_heading',
	'label'    => esc_html__( 'Skill text', 'kirki-theme' ),
	'section'  => 'skill_section',
	'default'  =>esc_html__( 'MEET OUR TEAM', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Skill Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'skill_desc',
	'label'    => esc_html__( 'Skill DESCRIPTION', 'kirki-theme' ),
	'section'  => 'skill_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
Kirki::add_field( 'stack_config', [
	'type'        => 'image',
	'settings'    => 'skill_image',
	'label'       => esc_html__( 'Image Section', 'kirki-theme' ),
	'section'     => 'skill_section',
	'default'     => '',
] );
// Skill Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Skill Items', 'kirki-theme' ),
	'section'     => 'skill_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'kirki-theme' ),
		'field' => 'skill_title',
	],
	'button_label' => esc_html__('Add New Skill Item', 'kirki-theme' ),
	'settings'     => 'skill_repeater',
	'fields' => [
		'skill_number' => [
			'type'        => 'number',
			'label'       => esc_html__( 'Skill Number', 'kirki-theme' ),
			'default'     => '100',
		],
		'skill_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Skill Title', 'kirki-theme' ),
			'default'     => __('Users', 'kirki-theme'),
		],
		'skill_animation_name' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Skill Animation Name', 'kirki-theme' ),
			'default'     => 'fadeInUp',
			'choices'     => array(
				'fadeInUp' => __('fadeInUp', 'kirki-theme'),
				'fadeInLeft' => __('fadeInLeft', 'kirki-theme'),
				'fadeInRight' => __('fadeInRight', 'kirki-theme'),
			),
		],
		'skill_animation_duration' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Skill Animation Duration', 'kirki-theme' ),
			'default'     => '0.2s',
			'choices'     => array(
				'0.2s' => __('0.2s', 'kirki-theme'),
				'0.4s' => __('0.4s', 'kirki-theme'),
				'0.6s' => __('0.6s', 'kirki-theme'),
				'0.8s' => __('0.8s', 'kirki-theme'),
			),
		],
	],
    'choices' => [
		'limit' => 3
	],
] );

// Works Section
Kirki::add_section( 'works_section', array(
    'title'          => esc_html__( 'Works Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Works Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'switch',
	'settings' => 'works_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'works_section',
	'default'  => true,
	
	
	
] );

// Works Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'works_heading',
	'label'    => esc_html__( 'Pricing text', 'kirki-theme' ),
	'section'  => 'works_section',
	'default'  =>esc_html__( 'Our Works', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Works Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'works_desc',
	'label'    => esc_html__( 'WORKS DESCRIPTION', 'kirki-theme' ),
	'section'  => 'works_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Work Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Work Items', 'stack' ),
	'section'     => 'works_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'stack' ),
		'field' => 'work_item_title',
	],
	'button_label' => esc_html__('Add New Work Item', 'stack' ),
	'settings'     => 'work_repeater',
	'fields' => [
        'work_item_title' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Work Title', 'stack' ),
			'default'     => __('Creative Design', 'stack'),
		],
		'work_item_small_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Work Small Image', 'stack' ),
			'default'     => '100',
		],
		'work_item_big_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Work Big Image', 'stack' ),
			'default'     => '100',
		],
	],
    'choices' => [
		'limit' => 6
	],
] );
// Testimonial Section
Kirki::add_section( 'testimonial_section', array(
    'title'          => esc_html__( 'Testimonial Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Testimonial Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'switch',
	'settings' => 'testimonial_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'testimonial_section',
	'default'  => true,
	
	
	
] );
// Testimonial Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Testimonial Items', 'kirki-theme' ),
	'section'     => 'testimonial_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Testimonial Item', 'kirki-theme' ),
		'field' => 'testimonial_title',
	],
	'button_label' => esc_html__('Add New Testimonial Item', 'kirki-theme' ),
	'settings'     => 'testimonial_repeater',
	'fields' => [
		'testimonial_item_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Testimonial Image', 'stack' ),
			'default'     => '',
		],
		'testimonial_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Testimonial Name', 'kirki-theme' ),
			'default'     => __('Md Abdul Hamid', 'kirki-theme'),
		],
		'testimonial_desig' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Testimonial Designation', 'kirki-theme' ),
			'default'     => __('Awesome Technology co.', 'kirki-theme'),
		],
		'testimonial_description' => [
			'type'        => 'textarea',
			'label'       => esc_html__( 'Testimonial Description', 'kirki-theme' ),
			'default'     => __('Holisticly empower leveraged ROI whereas effective web-readiness. Completely enable emerging meta-services with cross-platform web services. Quickly initiate inexpensive total linkage rather than extensible scenarios. Holisticly empower leveraged ROI whereas effective web-readiness. ', 'kirki-theme'),
		],
		
		
	],
    'choices' => [
		'limit' => 6
	],
] );

// Testimonial Background
Kirki::add_field( 'stack_config', [
	'type'        => 'background',
	'settings'    => 'testimonial_background',
	'label'       => esc_html__( 'Background', 'kirki-theme' ),
	'section'     => 'testimonial_section',
	'default'     => [
		'background-color'      => 'rgba(20,20,20,.8)',
		'background-image'      => '',
		'background-repeat'     => 'repeat',
		'background-position'   => 'center center',
		'background-size'       => 'cover',
		'background-attachment' => 'scroll',
	],
	'transport'   => 'auto',
	'output'      => [
		[
			'element' => '#testimonial',
		],
	],
] );

// Blog Section
Kirki::add_section( 'blog_section', array(
    'title'          => esc_html__( 'Blog Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Blog Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'switch',
	'settings' => 'blog_show',
	'label'    => esc_html__( 'Video Want to Show ', 'kirki-theme' ),
	'section'  => 'blog_section',
	'default'  => true,

] );

// Blog Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'blog_heading',
	'label'    => esc_html__( 'LATEST BLOG', 'kirki-theme' ),
	'section'  => 'blog_section',
	'default'  =>esc_html__( 'LATEST BLOG', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Blog Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'blog_desc',
	'label'    => esc_html__( 'WORKS DESCRIPTION', 'kirki-theme' ),
	'section'  => 'blog_section',
	'default'  => __( 'A desire to help and empower others between community contributors in technology
began to grow in 2020.', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Client Section
Kirki::add_section( 'client_section', array(
    'title'          => esc_html__( 'Client Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Client Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'switch',
	'settings' => 'client_show',
	'label'    => esc_html__( 'Client Want to Show ', 'kirki-theme' ),
	'section'  => 'client_section',
	'default'  => true,

] );

// Client Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'client_heading',
	'label'    => esc_html__( 'NOTABLE CLIENTS', 'kirki-theme' ),
	'section'  => 'client_section',
	'default'  =>esc_html__( 'NOTABLE CLIENTS', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Client Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'client_desc',
	'label'    => esc_html__( 'Client DESCRIPTION', 'kirki-theme' ),
	'section'  => 'client_section',
	'default'  => __( 'Over the last 20 years, we have helped and guided organisations to achieve outstanding results', 'kirki-theme' ),
	'priority' => 10,
	
	
] );

// Clients Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Clients Items', 'stack' ),
	'section'     => 'client_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'stack' ),
		'field' => 'client_item_name',
	],
	'button_label' => esc_html__('Add New Client Item', 'stack' ),
	'settings'     => 'client_repeater',
	'fields' => [
		'client_item_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Client Name', 'stack' ),
			'default'     => __('John Doe', 'stack'),
		],
        'client_item_image' => [
			'type'        => 'image',
			'label'       => esc_html__( 'Client Image', 'stack' ),
			'default'     => '',
		],
	],
    'choices' => [
		'limit' => 4
	],
] );

// Contact Section
Kirki::add_section( 'contact_section', array(
    'title'          => esc_html__( 'Contact Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Contact Show /Hide
Kirki::add_field( 'stack_config', [
	'type'     => 'switch',
	'settings' => 'contact_show',
	'label'    => esc_html__( 'Contact Want to Show ', 'kirki-theme' ),
	'section'  => 'contact_section',
	'default'  => true,

] );

// Contact Heading
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'contact_heading',
	'label'    => esc_html__( 'NOTABLE CLIENTS', 'kirki-theme' ),
	'section'  => 'contact_section',
	'default'  =>esc_html__( 'We are a friendly bunch..', 'kirki-theme' ),
	'priority' => 10,
	
	
] );
// Contact Description
Kirki::add_field( 'stack_config', [
	'type'     => 'textarea',
	'settings' => 'contact_desc',
	'label'    => esc_html__( 'Contact DESCRIPTION', 'kirki-theme' ),
	'section'  => 'contact_section',
	'default'  => __( 'Over the last 20 years, we have helped and guided organisations to achieve outstanding results', 'kirki-theme' ),
	'priority' => 10,
] );
	// Contact Title
Kirki::add_field( 'stack_config', [
	'type'     => 'text',
	'settings' => 'contact_title',
	'label'    => esc_html__( 'Contact Title', 'kirki-theme' ),
	'section'  => 'contact_section',
	'default'  => __( 'CONTACT US', 'kirki-theme' ),
	'priority' => 10,
	
	] );

// Contact Items
Kirki::add_field( 'stack_config', [
	'type'        => 'repeater',
	'label'       => esc_html__( 'Contact Items', 'stack' ),
	'section'     => 'contact_section',
	'priority'    => 10,
	'row_label' => [
		'type'  => 'field',
		'value' => esc_html__( 'Add New Item', 'stack' ),
		'field' => 'contact_item_name',
	],
	'button_label' => esc_html__('Add New Client Item', 'stack' ),
	'settings'     => 'contact_repeater',
	'fields' => [
		'counter_icon' => [
			'type'        => 'select',
			'label'       => esc_html__( 'Contact Icon', 'kirki-theme' ),
			'default'     => '',
			'choices'     => array(
				'lni-map-marker' => __('Map', 'kirki-theme'),
				'lni-envelope' => __('Envelope', 'kirki-theme'),
				'lni-phone-handset' => __('Contact', 'kirki-theme'),
				
			),
		],
		'client_item_name' => [
			'type'        => 'text',
			'label'       => esc_html__( 'Contact Name', 'kirki-theme' ),
			'default'     => __('ADDRESS: 28 Green Tower, New York City, USA', 'kirki-theme'),
		],
       	],
    'choices' => [
		'limit' => 3
	],
] );
// Contact Section
Kirki::add_section( 'footer_section', array(
    'title'          => esc_html__( 'Footer Section', 'kirki-theme' ),
    'panel'          => 'stack-panel1',
    'priority'       => 160,
) );
// Footer Logo
Kirki::add_field( 'stack_config', [
	'type'     => 'image',
	'settings' => 'footer_image',
	'label'    => esc_html__( 'Footer Image', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );


// Footer Facebook
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'footer_facebook',
	'label'    => esc_html__( 'Facebook URL', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );

// Footer Twitter
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'footer_twitter',
	'label'    => esc_html__( 'Twitter URL', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );

// Footer Instagram
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'footer_instagram',
	'label'    => esc_html__( 'Instagram URL', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );

// Footer Linkedin
Kirki::add_field( 'stack_config', [
	'type'     => 'link',
	'settings' => 'footer_linkedin',
	'label'    => esc_html__( 'Linkedin URL', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );

// Footer Copyright
Kirki::add_field( 'stack_config', [
	'type'     => 'editor',
	'settings' => 'footer_copy',
	'label'    => esc_html__( 'Copyright Text', 'kirki-theme' ),
	'section'  => 'footer_section',
	'default'  => '',
] );