<?php
/**
 * Header Customizer panel
 *
 * @package Esfahan
 */

//Header Styles
Esfahan_Kirki::add_section( 'esfahan_section_menu', array(
    'title'       	 => esc_html__( 'Header Styles', 'esfahan' ),
    'priority'       => 9,
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'menu_type',
	'label'       => esc_html__( 'Header Style', 'esfahan' ),
	'section'     => 'esfahan_section_menu',
	'default'     => 'menuStyle2',
	'choices'     => array(
		'menuStyle1' => esc_html__( 'Style 1 - inside header', 'esfahan' ),
		'menuStyle2' => esc_html__( 'Style 2 - outside header', 'esfahan' ),
		'menuStyle3' => esc_html__( 'Style 3 - center header', 'esfahan' ),
		'menuStyle4' => esc_html__( 'Style 4 - top header', 'esfahan' ),
		'menuStyle5' => esc_html__( 'Style 5 - one line', 'esfahan' ),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'menu_container',
	'label'       => esc_html__( 'Header width', 'esfahan' ),
	'section'     => 'esfahan_section_menu',
	'default'     => 'menuContained',
	'choices'     => array(
		'menuContained' 	=> esc_html__( 'Contained', 'esfahan' ),
		'menuNotContained' 	=> esc_html__( 'Full Width', 'esfahan' ),
	)
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'radio',
	'settings'    => 'sticky_menu',
	'label'       => esc_html__( 'Sticky menu', 'esfahan' ),
	'section'     => 'esfahan_section_menu',
	'default'     => 'static-header',
	'choices'     => array(
		'sticky-header' 	=> esc_html__( 'Sticky menu', 'esfahan' ),
		'static-header' 	=> esc_html__( 'Static menu', 'esfahan' ),
	),	
) );


// Search
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'checkbox',
	'settings'    => 'disable_header_search',
	'section'     => 'esfahan_section_menu',
	'default'     => false,	
	'label'       => esc_html__( 'Disable header search icon?', 'esfahan' ),
) );

//Site Title Headings family
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'typography',
	'settings'    => 'sitetitle_heading_font',
	'label'       => esc_html__( 'Site title font', 'esfahan' ),
	'section'     => 'esfahan_section_menu',
	'default'     => array(
		'font-family'    => 'Playfair Display',
		'variant'        => 'regular',
		'text-transform' => 'none',
	),
	'choices' => [
		'fonts' => [
			'google' => [ 'Playfair Display', 'Niconne', 'Work Sans', 'Poppins', 'Lato', 'Pacifico', 'Karla', 'Lora', 'Abril Fatface', 'Oswald', 'Roboto', 'Rubik', 'Eczar', 'Montserrat'],
		],
	],
	'output'      => array(
		array(
			'element' => '.site-title',
		),	
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'     	  => 'slider',
	'settings'    => 'font_size_site_title',
	'label'       =>  esc_html__( 'Site title font size', 'esfahan' ),
	'section'     => 'esfahan_section_menu',
	'default'     => '36',
	'priority'    => 10,
	'choices'   => array(
		'min'  => 16,
		'max'  => 50,
		'step' => 1,
	),
	'transport'	  => 'auto',
	'output'      => array(
		array(
			'element'  => '.site-title',
			'property' => 'font-size',
			'units'    => 'px',
		),
	),	
) );

// Social icons
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'custom',
	'settings'    => 'header_note',
	'section'     => 'esfahan_section_menu',
	'default'     => esc_html__( 'Social Media Icons', 'esfahan' ),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'       		=> 'link',
	'settings'    		=> 'menu5_facebook',
	'label'       		=> esc_html__( 'Facebook', 'esfahan' ),
	'section'     		=> 'esfahan_section_menu',
	'input_attrs' 		=> array(
		'placeholder' => esc_attr__( 'Insert link or leave blank to hide icon', 'esfahan' ),
	)
) );
// Menu social
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'       		=> 'link',
	'settings'    		=> 'menu5_instagram',
	'label'       		=> esc_html__( 'Instagram', 'esfahan' ),
	'section'     		=> 'esfahan_section_menu',
	'input_attrs' 		=> array(
		'placeholder' => esc_attr__( 'Insert link or leave blank to hide icon', 'esfahan' ),
	)
) );
// Menu social
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'       		=> 'link',
	'settings'    		=> 'menu5_twitter',
	'label'       		=> esc_html__( 'Twitter', 'esfahan' ),
	'section'     		=> 'esfahan_section_menu',
	'input_attrs' 		=> array(
		'placeholder' => esc_attr__( 'Insert link or leave blank to hide icon', 'esfahan' ),
	)
) );
// Menu social
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'       		=> 'link',
	'settings'    		=> 'menu5_linkedin',
	'label'       		=> esc_html__( 'Linkedin', 'esfahan' ),
	'section'     		=> 'esfahan_section_menu',
	'input_attrs' 		=> array(
		'placeholder' => esc_attr__( 'Insert link or leave blank to hide icon', 'esfahan' ),
	)
) );
