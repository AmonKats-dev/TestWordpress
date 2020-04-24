<?php
/**
 * Colors Customizer panel
 *
 * @package Esfahan
 */

/**
 * Colors panel
 */
Esfahan_Kirki::add_panel( 'esfahan_panel_colors', array(
    'priority'    => 12,
    'title'       => esc_html__( 'Colors', 'esfahan' ),
) );

/**
 * General
 */
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_primary',
	'label'       => esc_html__( 'Primary color', 'esfahan' ),
	'section'     => 'colors',
	'default'     => '#727272',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.woocommerce div.product .woocommerce-tabs ul.tabs li.active a,.product div.entry-summary p.price, .product div.entry-summary span.price,.esfahan-blog:not(.esfahan_esfahan_blog_skin) .posted-on a,.esfahan-blog:not(.esfahan_esfahan_blog_skin) .byline a:hover,.testimonials-section.style1:before,.single-post .read-more-link .gt,.blog-loop .read-more-link .gt,.single-post .posted-on a,.blog-loop .posted-on a,.entry-title a:hover,.esfahan_recent_entries .post-date,.widget_categories li:hover::before,.widget_categories li:hover a',
			'property' => 'color',
		),
		array(
			'element'  => '.product .single_add_to_cart_button.button.alt,button,.button,input[type="button"],input[type="reset"],input[type="submit"]',
			'property' => 'border-color',
		),		
		array(
			'element'  => '.woocommerce-checkout button.button.alt,.woocommerce-checkout button.button.alt:hover,.woocommerce-cart .cart-collaterals .cart_totals .button:hover,.woocommerce-cart .cart-collaterals .cart_totals .button,.product .single_add_to_cart_button.button.alt:hover,.product .single_add_to_cart_button.button.alt,.woocommerce ul.products li.product .button,.menuStyle2 .main-navigation a:hover:after,.comments-area .comment-reply-link:hover,button,.button,input[type="button"],input[type="reset"],input[type="submit"]',
			'property' => 'background-color',
		),		
	),			
) );

/**
 * Header colors
 */
Esfahan_Kirki::add_section( 'esfahan_section_colors_header', array(
    'title'       	 => esc_html__( 'Header', 'esfahan' ),
	'panel'          => 'esfahan_panel_colors',
	'description'    => esc_html__( 'Different color options show up here, based on the type of menu you select from the Header > Menu section', 'esfahan' ),
    'priority'       => 1,
) );

/**
 * Menu type 1
 */
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_title',
	'label'       => esc_html__( 'Site title font color', 'esfahan' ),
	'section'     => 'esfahan_section_colors_header',
	'default'     => '#111111',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.site-title a, .sticky-wrapper.is-sticky .site-title a',
			'property' => 'color',
			'suffix'   => ' !important',
		),
	),			
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_site_desc',
	'label'       => esc_html__( 'Site description font color', 'esfahan' ),
	'section'     => 'esfahan_section_colors_header',
	'default'     => '#424851',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.site-description, .sticky-wrapper.is-sticky .site-description',
			'property' => 'color',
			'suffix'   => ' !important',
		),
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_top_menu_items',
	'label'       => esc_html__( 'Top menu font color', 'esfahan' ),
	'section'     => 'esfahan_section_colors_header',
	'default'     => '#424851',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.main-navigation a, .fa-search, .site-header .socials a, .menu-item-has-children::after, .main-navigation ul ul li a, .sticky-wrapper.is-sticky .main-navigation a, .sticky-wrapper.is-sticky .fa-search, .sticky-wrapper.is-sticky .site-header .socials a',
			'property' => 'color',
			'suffix'   => ' !important',
		),
		array(
			'element'  => '.mobile-menu-toggle_lines, .mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines,.mobile-menu-toggle_lines:before, .mobile-menu-toggle_lines:after,.mobile-menu-toggle_lines',
			'property' => 'background',
		),
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_mt1_bg_color',
	'label'       => esc_html__( 'Header background color', 'esfahan' ),
	'section'     => 'esfahan_section_colors_header',
	'default'     => '',
	'choices'     => array(
		'alpha' => true,
	),
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.site-header, page-template-template_page-builder .site-header, .mobile-menu-active .main-navigation ul, .mobile-menu-active .main-navigation ul ul li, .main-navigation ul ul li, .is-sticky .site-header',
			'property' => 'background-color',
			'suffix'   => ' !important',
		),
	),
) );

/**
 * Blog colors
 */
Esfahan_Kirki::add_section( 'esfahan_section_colors_blog', array(
    'title'       	 => esc_html__( 'Blog', 'esfahan' ),
	'panel'          => 'esfahan_panel_colors',
    'priority'       => 2,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_index_post_title',
	'label'       => esc_html__( 'Post title (blog & archives)', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.entry-title a',
			'property' => 'color',
		),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_single_post_title',
	'label'       => esc_html__( 'Post title (post page)', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-title',
			'property' => 'color',
		),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_meta_cat_bg',
	'label'       => esc_html__( 'Categories (single and archives)', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#eff1f4',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .post-cat, .blog-loop .post-cat',
			'property' => 'background-color',
		),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_meta_text',
	'label'       => esc_html__( 'Meta text', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#a5a5a5',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-meta, .blog-loop .entry-meta',
			'property' => 'color',
		),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_meta_links',
	'label'       => esc_html__( 'Meta links', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#464646',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-meta .byline a, .blog-loop .entry-meta .byline a',
			'property' => 'color',
		),
	),
) );
Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_post_text',
	'label'       => esc_html__( 'Body text', 'esfahan' ),
	'section'     => 'esfahan_section_colors_blog',
	'default'     => '#464646',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.single-post .entry-content, .blog-loop .entry-content',
			'property' => 'color',
		),
		array(
			'element'  => '.editor-block-list__layout, .editor-block-list__layout .editor-block-list__block',
			'context'  => array( 'editor' ),
		),		
	),
) );



/**
 * Widgets
 */

Esfahan_Kirki::add_section( 'esfahan_section_colors_widgets', array(
    'title'       	 => esc_html__( 'Sidebar &amp; Footer widgets', 'esfahan' ),
	'panel'          => 'esfahan_panel_colors',
    'priority'       => 12,
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_title',
	'label'       => esc_html__( 'Widget titles', 'esfahan' ),
	'section'     => 'esfahan_section_colors_widgets',
	'default'     => '#191919',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget .widget-title',
			'property' => 'color',
		),
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_text',
	'label'       => esc_html__( 'Widget text', 'esfahan' ),
	'section'     => 'esfahan_section_colors_widgets',
	'default'     => '#707070',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget',
			'property' => 'color',
		),
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_widgets_links',
	'label'       => esc_html__( 'Widget links', 'esfahan' ),
	'section'     => 'esfahan_section_colors_widgets',
	'default'     => '#464646',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '.widget a',
			'property' => 'color',
		),
	),
) );

Esfahan_Kirki::add_field( 'esfahan', array(
	'type'        => 'color',
	'settings'    => 'color_footer_background',
	'label'       => esc_html__( 'Footer Background', 'esfahan' ),
	'section'     => 'esfahan_section_colors_widgets',
	'default'     => '#f4f4f4',
	'transport'	 => 'auto',
	'output' => array(
		array(
			'element'  => '#sidebar-footer, #colophon',
			'property' => 'background',
		),
	),
) );