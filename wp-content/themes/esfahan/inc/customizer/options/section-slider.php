<?php
/**
 * Slider Customizer panel
 *
 * @package Esfahan
 */

Esfahan_Kirki::add_section( 'esfahan_section_slider', array(
    'title'       	 => esc_html__( 'Featured Post Slider', 'esfahan' ),
    'priority'       => 11,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'slider_active',
	'label'       => esc_html__( 'Enable Featured Post Slider', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => false,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'select',
	'settings'    => 'slider_posts',
	'label'       => esc_html__( 'Display Posts', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => 'all-posts',
	'choices'     => [
		'all-posts' => esc_html__( 'All Posts', 'esfahan' ),
		'by-post-category' => esc_html__( 'by Post Category', 'esfahan' ),
	],
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'select',
	'settings'    => 'slider_category',
	'label'       => esc_html__( 'Select Category', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'placeholder' => esc_html__( 'Select a category...', 'esfahan' ),
	'default'     => '',
	'choices'     => Kirki_Helper::get_terms( array('taxonomy' => 'category') ),
	'active_callback'  => [
		[
			'setting'  => 'slider_posts',
			'operator' => '===',
			'value'    => 'by-post-category',
		],
	]
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'select',
	'settings'    => 'slider_width',
	'label'       => esc_html__( 'Width', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => 'boxed',
	'choices'     => [
		'full-width' => esc_html__( 'Full Width', 'esfahan' ),
		'boxed' => esc_html__( 'Boxed', 'esfahan' ),
	],
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'number',
	'settings'    => 'number_of_slides',
	'label'       => esc_html__( 'Number of Slides', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => 2,
	'choices'     => [
		'min'  => 1,
		'max'  => 3,
		'step' => 1,
	],
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'number',
	'settings'    => 'slider_margin',
	'label'       => esc_html__( 'Top Spacing (in pixel)', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => 30,
	'choices'     => [
		'min'  => 0,
		'max'  => 40,
		'step' => 10,
	],
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'show_arrows',
	'label'       => esc_html__( 'Show Navigation Arrows', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => true,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'show_pagination',
	'label'       => esc_html__( 'Show Pagination Dots', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => true,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'slider_note',
	'label'       => esc_html__( 'Note:', 'esfahan' ),
	'section'     => 'esfahan_section_slider',
	'default'     => '<div style="padding: 10px;background-color: #ddd; color: #222222;">' . esc_html__( 'Only Posts having Featured Image will appear in the slider. ', 'esfahan' ) . '<br><br>' . esc_html__( 'When enabled, the slider appears on Latest Posts page / Blog page. ', 'esfahan' ) . '</div>',
) );