<?php
/**
 * Footer Customizer panel
 *
 * @package Esfahan
 */


Esfahan_Kirki::add_section( 'esfahan_section_demodoc', array(
    'title'       	 => esc_html__( 'Documentation & Demo', 'esfahan' ),
    'priority'       => 998,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'documentation_note',
	'label'       => esc_html__( 'Documentation', 'esfahan' ),
	'section'     => 'esfahan_section_demodoc',
	'default'     => '<div style="padding:0 0 8px 0;">' . esc_html__( 'Read how to customize the theme, set up widgets, and learn all the possible options available to you. ', 'esfahan' ) . '<br></div><a href="https://optimathemes.com/esfahan-theme/">Documentation</a>',
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'demo_note',
	'label'       => esc_html__( 'Demo Content', 'esfahan' ),
	'section'     => 'esfahan_section_demodoc',
	'default'     => '<div style="padding:0 0 8px 0;">' . esc_html__( 'You can download and import our demo file to get the same demo content as shown on our website. For more details please read theme documentation. ', 'esfahan' ) . '<br></div><a href="https://optimathemes.com/esfahan-theme/">Demo Content</a>',
) );
