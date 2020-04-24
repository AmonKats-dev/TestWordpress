<?php
/**
 * Footer Customizer panel
 *
 * @package Esfahan
 */


Esfahan_Kirki::add_section( 'esfahan_section_footer', array(
    'title'       	 => esc_html__( 'Footer', 'esfahan' ),
    'priority'       => 18,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'footer_widget_areas',
	'label'       => esc_html__( 'No. of columns in footer', 'esfahan' ),
	'section'     => 'esfahan_section_footer',
	'default'     => '4',
	'priority'    => 10,
	'choices'     => array(
		'1'   	=> esc_html__( '1', 'esfahan' ),
		'2'   	=> esc_html__( '2', 'esfahan' ),
		'3'	 	=> esc_html__( '3', 'esfahan' ),
		'4'  	=> esc_html__( '4', 'esfahan' ),
	),
) );

//Santize function
function esfahan_sanitize_text( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}