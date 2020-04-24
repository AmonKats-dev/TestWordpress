<?php
/**
 * Blog Customizer panel
 *
 * @package Esfahan
 */

/**
 * Index
 */
Esfahan_Kirki::add_panel( 'esfahan_panel_blog', array(
    'title'       	 => esc_html__( 'Blog Layout', 'esfahan' ),
    'priority'       => 11,
) );
Esfahan_Kirki::add_section( 'esfahan_section_blog_index', array(
	'title'       	 => esc_html__( 'Main &amp; Archives Pages', 'esfahan' ),
	'panel'			 => 'esfahan_panel_blog',
    'priority'       => 17,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'blog_layout',
	'label'       => esc_html__( 'Blog layout', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_html__( 'Default', 'esfahan' ),
		'layout-grid' 		=> esc_html__( 'Grid Layout', 'esfahan' ),
		'layout-two-columns' 	=> esc_html__( 'Grid + Sidebar', 'esfahan' ),
		'layout-list-2' 		=> esc_html__( 'Classic', 'esfahan' ),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'number',
	'settings'    => 'excerpt_length',
	'label'       => esc_html__( 'Excerpt length', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => 20,
	'priority'    => 10,
	'choices'     => array(
		'min'  => 5,
		'max'  => 60,
		'step' => 1,
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'text',
	'settings'    => 'read_more_text',
	'label'       => esc_html__( 'Read more text', 'esfahan' ),
	'description' => esc_html__( 'Leave empty to hide', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => esc_html__( 'Read more', 'esfahan' ),
	'priority'    => 10,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_thumb',
	'label'       => esc_html__( 'Hide post thumbnail?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_date',
	'label'       => esc_html__( 'Hide post date?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_cats',
	'label'       => esc_html__( 'Hide post categories?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_author',
	'label'       => esc_html__( 'Hide post author?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'index_hide_comments',
	'label'       => esc_html__( 'Hide comments number?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_index',
	'default'     => '0',
	'priority'    => 10,
) );


/**
 * Single posts
 */
Esfahan_Kirki::add_section( 'esfahan_section_blog_single', array(
	'title'       	 => esc_html__( 'Single posts', 'esfahan' ),
	'panel'			 => 'esfahan_panel_blog',	
    'priority'       => 17,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'single_post_layout',
	'label'       => esc_html__( 'Single post layout', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_html__( 'Default', 'esfahan' ),
		'layout-full' 		=> esc_html__( 'No sidebar', 'esfahan' ),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'single_post_content_layout',
	'label'       => esc_html__( 'Content layout', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_html__( 'Default', 'esfahan' ),
		'layout-2' 		=> esc_html__( 'Layout 2', 'esfahan' ),
		'layout-3' 		=> esc_html__( 'Layout 3', 'esfahan' ),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'single_comment_form_layout',
	'label'       => esc_html__( 'Comment Form Layout', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => 'layout-default',
	'choices'     => array(
		'layout-default' 	=> esc_html__( 'Default', 'esfahan' ),
		'layout-2' 		=> esc_html__( 'Layout 2', 'esfahan' ),
		'layout-3' 		=> esc_html__( 'Layout 3', 'esfahan' ),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'single_hide_thumb',
	'label'       => esc_html__( 'Hide post thumbnail?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'single_hide_date',
	'label'       => esc_html__( 'Hide post date?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'single_hide_cats',
	'label'       => esc_html__( 'Hide post categories?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => '0',
	'priority'    => 10,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'single_hide_author',
	'label'       => esc_html__( 'Hide post author?', 'esfahan' ),
	'section'     => 'esfahan_section_blog_single',
	'default'     => '0',
	'priority'    => 10,
) );