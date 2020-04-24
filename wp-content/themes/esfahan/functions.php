<?php
/**
 * Esfahan functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Esfahan
 */

if ( ! function_exists( 'esfahan_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function esfahan_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on Esfahan, use a find and replace
		 * to change 'esfahan' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'esfahan', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'esfahan-720', 795 );
		add_image_size( 'esfahan-360-360', 360, 360, true );
		add_image_size( 'esfahan-850-485', 850, 485, true );
		add_image_size( 'esfahan-390-280', 390, 280, true );
		add_image_size( 'esfahan-969-485', 969, 485, true );
		add_image_size( 'esfahan-slider-full-thumbnail', 1080, 540, true );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Main Menu', 'esfahan' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'esfahan_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
			'header-text' => array( 'site-title', 'site-description' ),
		) );

		/**
		 * Theme Activation Notice
		 */
		global $pagenow;
		
		if ( is_admin() && ('themes.php' == $pagenow) && isset( $_GET['activated'] ) ) {
			add_action( 'admin_notices', 'esfahan_activation_notice' );
		}
	}
endif;
add_action( 'after_setup_theme', 'esfahan_setup' );

/**
 * Theme Activation Notice
 */
function esfahan_activation_notice() {
	echo '<div class="notice notice-success is-dismissible">';
		echo '<p>'. esc_html__( 'Thank you for choosing Esfahan! Now, we higly recommend you to visit our welcome page.', 'esfahan' ) .'</p>';
		echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=about-esfahan' ) ) .'" class="button button-primary">'. esc_html__( 'Get Started with Esfahan', 'esfahan' ) .'</a></p>';
	echo '</div>';
}

/**
* About Esfahan
*/
require get_parent_theme_file_path( '/inc/about/about-esfahan.php' );


/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function esfahan_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'esfahan_content_width', 1170 );
}
add_action( 'after_setup_theme', 'esfahan_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function esfahan_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'esfahan' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'esfahan' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h4 class="widget-title">',
		'after_title'   => '</h4>',
	) );

	//Footer widget areas
	$widget_areas = get_theme_mod( 'footer_widget_areas', '4' );
	for ( $i=1; $i <= $widget_areas; $i++ ) {
		register_sidebar( array(
			'name'          => __( 'Footer ', 'esfahan' ) . $i,
			'id'            => 'footer-' . $i,
			'description'   => '',
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
		) );
	}

	register_widget( 'Esfahan_Social' );

}
add_action( 'widgets_init', 'esfahan_widgets_init' );

/**
 * Enqueue theme scripts and styles.
 */
function esfahan_scripts() {

	$my_js_ver = "20191230";

	wp_enqueue_script( 'esfahan-touch-navigation', get_template_directory_uri() . '/js/vendor/touch-keyboard-navigation.js', array(), $my_js_ver, true );

	wp_enqueue_script( 'esfahan-skip-link-focus-fix', get_template_directory_uri() . '/js/vendor/skip-link-focus-fix.js', array(), $my_js_ver, true );

	wp_enqueue_style( 'esfahan-font-awesome', get_template_directory_uri() . '/css/font-awesome/css/font-awesome.min.css' );

	//Deregister FontAwesome from Elementor
	wp_deregister_style( 'font-awesome' );

	//Load masonry
	$blog_layout = esfahan_blog_layout();
	if ( $blog_layout == 'layout-masonry' ) {
		wp_enqueue_script( 'jquery-masonry' );
	}

	wp_enqueue_script( 'esfahan-scripts', get_template_directory_uri() . '/js/vendor/scripts.js', array( 'jquery' ), $my_js_ver, true );

	//Slick JS and CSS for Featured Slider
	if ( is_home() && !is_paged() && get_theme_mod('slider_active') === true ) {
		wp_enqueue_script( 'esfahan-slider-scripts', get_template_directory_uri() . '/js/vendor/slick.min.js', array( 'jquery' ), $my_js_ver, true );
		wp_enqueue_style( 'esfahan-slider', get_template_directory_uri() . '/css/slick.css' );
	}
	
	//wp_enqueue_script( 'esfahan-main', get_template_directory_uri() . '/js/custom/custom.min.js', array( 'jquery' ), $my_js_ver, true );	
	wp_enqueue_script( 'esfahan-main', get_template_directory_uri() . '/js/custom/custom.js', array( 'jquery' ), $my_js_ver, true );	

	if ( is_home() && !is_paged() && get_theme_mod('slider_active') ) {
		wp_localize_script( 'esfahan-main', 'esfahanSlider', array(
			'esfahan_slider_active' => true
		));
	} else {
		wp_localize_script( 'esfahan-main', 'esfahanSlider', array(
			'esfahan_slider_active' => false
		));
	}

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_style( 'esfahan-style', get_stylesheet_uri() );

}
add_action( 'wp_enqueue_scripts', 'esfahan_scripts' );

 /**
 * Enqueue custom Elementor scripts
 */
function esfahan_elementor_scripts() {
	wp_enqueue_script( 'esfahan-navigation', get_template_directory_uri() . '/js/vendor/navigation.js', array( 'jquery', 'jquery-slick', 'imagesloaded' ), false, true );
}
add_action('elementor/frontend/after_register_scripts', 'esfahan_elementor_scripts');

 /**
 * Enqueue Bootstrap
 */
function esfahan_enqueue_bootstrap() {
	wp_enqueue_style( 'esfahan-bootstrap', get_template_directory_uri() . '/css/bootstrap/bootstrap.min.css', array(), true );
}
add_action( 'wp_enqueue_scripts', 'esfahan_enqueue_bootstrap', 9 );

/**
 * Gutenberg
 */
function esfahan_editor_styles() {
	
	wp_enqueue_style( 'esfahan-block-editor-styles', get_theme_file_uri( '/editor-styles.css' ), '', '1.0', 'all' );
	
}
add_action( 'enqueue_block_editor_assets', 'esfahan_editor_styles' );

/**
 * Widgets
 */
require get_template_directory() . '/widgets/class-esfahan-social.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/kirki/kirki.php';
require get_template_directory() . '/inc/customizer/customizer.php';

// Disable kirki notice in dashboard and disable loader icon
add_filter( 'kirki_telemetry', '__return_false' );
function esfahan_kirki_configuration( $config ) {
	return wp_parse_args( array(
		'disable_loader' => true,
	), $config );
}
add_filter( 'kirki_config', 'esfahan_kirki_configuration' );

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load WooCommerce compatibility file.
 */
if ( class_exists( 'WooCommerce' ) ) {
	require get_template_directory() . '/inc/woocommerce.php';
}

/**
 * Upsell
 */
require get_template_directory() . '/inc/customizer/upsell/class-customize.php';

if ( ! function_exists( 'esfahan_excerpt' ) ) {
	function esfahan_excerpt( $limit = 50 ) {
	    echo '<p>'. esc_html(wp_trim_words(get_the_excerpt(), $limit)) .'</p>';
	}
}

/**
 * TGMPA
 */
require_once get_template_directory() . '/inc/tgmpa/class-tgm-plugin-activation.php';

function esfahan_register_required_plugins() {

	$plugins = array(

		array(
			'name'      => 'Elementor',
			'slug'      => 'elementor',
			'required'  => false,
		),
		array(
			'name'      => 'Contact Form 7',
			'slug'      => 'contact-form-7',
			'required'  => false,
		),
		array(
			'name'      => 'MailChimp for WordPress',
			'slug'      => 'mailchimp-for-wp',
			'required'  => false,
		),
	);	

	$config = array(
		'id'           => 'esfahan',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa( $plugins, $config );
}
add_action( 'tgmpa_register', 'esfahan_register_required_plugins' );

/*
**  Main Menu Fallback
*/
function esfahan_main_menu_fallback() {
	if ( current_user_can( 'edit_theme_options' ) ) {
		echo '<ul id="main-menu">';
			echo '<li>';
				echo '<a href="'. esc_url( home_url('/') .'wp-admin/nav-menus.php' ) .'">'. esc_html__( 'Set up Menu', 'esfahan' ) .'</a>';
			echo '</li>';
		echo '</ul>';
	}
}

/*
**  Extend Recent Posts Widget
*/
Class Esfahan_Recent_Posts_Widget extends WP_Widget_Recent_Posts {

	function widget($args, $instance) {
	
		extract( $args );
		
		$title = apply_filters('widget_title', empty($instance['title']) ? esc_html__( 'Recent Posts', 'esfahan' ) : $instance['title'], $instance, $this->id_base);
				
		if( empty( $instance['number'] ) || ! $number = absint( $instance['number'] ) )
			$number = 10;
					
		$r = new WP_Query( apply_filters( 'widget_posts_args', array( 'posts_per_page' => $number, 'no_found_rows' => true, 'post_status' => 'publish', 'ignore_sticky_posts' => true ) ) );
		if( $r->have_posts() ) :
			
			echo ent2ncr($before_widget);
			if( $title ) echo ent2ncr($before_title) . ent2ncr($title) . ent2ncr($after_title); ?>
			<ul>
				<?php while( $r->have_posts() ) : $r->the_post(); ?>				
				<li class="esfahann-recent-image-box">
					<div class="esfahann-small-image-box" style="background-image: url('<?php the_post_thumbnail_url(); ?>');">
					</div>
					<span><?php the_time( 'M d, Y'); ?></span>
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				</li>
				<?php endwhile; ?>
			</ul>
			 
			<?php
			echo ent2ncr($after_widget);
		
		wp_reset_postdata();
		
		endif;
	}
}

function esfahan_recent_widget_registration() {
  unregister_widget('WP_Widget_Recent_Posts');
  register_widget('Esfahan_Recent_Posts_Widget');
}
add_action('widgets_init', 'esfahan_recent_widget_registration');

/**
 * Shim for wp_body_open, ensuring backwards compatibility with versions of WordPress older than 5.2.
 */
if ( ! function_exists( 'wp_body_open' ) ) {
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
}