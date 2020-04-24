<?php
/**
 * Esfahan Theme Customizer
 *
 * @package Esfahan
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function esfahan_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';
	$wp_customize->get_section( 'colors' )->title 				= esc_attr__( 'General', 'esfahan' );
	$wp_customize->get_section( 'colors' )->panel 				= 'esfahan_panel_colors';
	$wp_customize->get_section( 'colors' )->priority 			= '10';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'esfahan_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'esfahan_customize_partial_blogdescription',
		) );
	}

}
add_action( 'customize_register', 'esfahan_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function esfahan_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function esfahan_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function esfahan_customize_preview_js() {
	wp_enqueue_script( 'esfahan-customizer', get_template_directory_uri() . '/js/admin/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'esfahan_customize_preview_js' );

/**
 * Kirki
 */
require get_template_directory() . '/inc/customizer/kirki/class-esfahan-kirki.php';

/**
 * Add Kirki config
 */
Esfahan_Kirki::add_config( 'esfahan', array(
	'capability'    => 'edit_theme_options',
	'option_type'   => 'theme_mod',
) );

/**
 * Load option files
 */
require get_template_directory() . '/inc/customizer/options/section-blog.php';
require get_template_directory() . '/inc/customizer/options/section-header.php';
require get_template_directory() . '/inc/customizer/options/section-slider.php';
require get_template_directory() . '/inc/customizer/options/section-footer.php';
require get_template_directory() . '/inc/customizer/options/section-typography.php';
require get_template_directory() . '/inc/customizer/options/section-colors.php';
require get_template_directory() . '/inc/customizer/options/section-demodoc.php';