<?php
/**
 * Typography Customizer panel
 *
 * @package Esfahan
 */

Esfahan_Kirki::add_panel( 'esfahan_panel_typography', array(
    'priority'    => 16,
    'title'       => esc_html__( 'Typography', 'esfahan' ),
) );


/**
 * Font families
 */
Esfahan_Kirki::add_section( 'esfahan_section_fonts', array(
    'title'       	 => esc_html__( 'Font families', 'esfahan' ),
    'panel'          => 'esfahan_panel_typography',
    'priority'       => 12,
) );



//Headings family
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'typography',
	'settings'    => 'headings_font',
	'label'       => esc_html__( 'Headings', 'esfahan' ),
	'section'     => 'esfahan_section_fonts',
	'default'     => array(
		'font-family'    => 'Playfair Display',
		'variant'        => '500',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'h1,h2,h3,h4,h5,h6',
		),
		array(
			'element'  => '.editor-block-list__layout h1,.editor-block-list__layout h2,.editor-block-list__layout h3,.editor-block-list__layout h4,.editor-block-list__layout h5,.editor-block-list__layout h6,.editor-post-title__block .editor-post-title__input',
			'context'  => array( 'editor' ),
		),		
	),
) );

//Body family
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'typography',
	'settings'    => 'body_font',
	'label'       => esc_html__( 'Body', 'esfahan' ),
	'section'     => 'esfahan_section_fonts',
	'default'     => array(
		'font-family'    => 'Open Sans',
		'variant'        => 'regular',
	),
	'priority'    => 10,
	'output'      => array(
		array(
			'element' => 'body',
		),
		array(
			'element'  => '.editor-block-list__layout,.editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );

/**
 * Font sizes
 */
Esfahan_Kirki::add_section( 'esfahan_section_font_sizes', array(
    'title'       	 => esc_html__( 'Font sizes', 'esfahan' ),
    'panel'          => 'esfahan_panel_typography',
    'priority'       => 12,
) );

//Header font sizes
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_general',
	'label'       => '',
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'General', 'esfahan' ) . '</div>',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_body',
	'label'       =>  esc_html__( 'Body text font size', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '15',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 22,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => 'body',
			'property' => 'font-size',
			'units'    => 'px',
		),
		array(
			'element'  => '.editor-styles-wrapper p',
			'context'  => array( 'editor' ),
		),
	),	
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_header',
	'label'       => '',
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Header area', 'esfahan' ) . '</div>',
	'priority'    => 10,
) );


Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_desc',
	'label'       =>  esc_html__( 'Site description', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '14',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 20,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-description',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_menu_top_level_items',
	'label'       =>  esc_html__( 'Top level menu font size', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '15',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 20,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.main-navigation li, .socials, .header-search-cart, .menu-item-has-children::after',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_menu_top_items',
	'label'       =>  esc_html__( 'Submenu font size', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '13',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 18,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.main-navigation ul ul li',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Blog
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_blog',
	'label'       => '',
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Blog', 'esfahan' ) . '</div>',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_index_title',
	'label'       =>  esc_html__( 'Post titles (blog & archives page)', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.blog-loop .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_single_title',
	'label'       =>  esc_html__( 'Post titles (post pages)', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '32',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.single-post .entry-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Sidebar font sizes
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_sidebar',
	'label'       => '',
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Sidebar', 'esfahan' ) . '</div>',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_widget_title',
	'label'       =>  esc_html__( 'Widget titles', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '24',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.widget-area .widget-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_widgets',
	'label'       =>  esc_html__( 'Widgets text', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 22,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.widget-area .widget',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

//Footer font sizes
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'label_font_sizes_footer',
	'label'       => '',
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '<div style="text-transform:uppercase;font-weight:600;background: #ccd6de;color: #1c1c1c;padding: 10px 20px;text-align: center;margin: 30px 0 15px 0;letter-spacing: 1px;border: 1px solid #ccc6c6;">' . esc_html__( 'Footer area', 'esfahan' ) . '</div>',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_widget_titles',
	'label'       =>  esc_html__( 'Footer widget titles', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '20',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.sidebar-column .widget-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_widgets',
	'label'       =>  esc_html__( 'Footer widgets text', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '16',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.sidebar-column .widget',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_footer_credits',
	'label'       =>  esc_html__( 'Footer credits', 'esfahan' ),
	'section'     => 'esfahan_section_font_sizes',
	'default'     => '13',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 10,
		'max'  => 30,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-info',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );