<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Esfahan
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function esfahan_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	//Menu type
	$menu_layout = esfahan_menu_layout();
	if ($menu_layout['type'] == 'menuStyle4'){
		$menu_layout['type'] = 'menuStyle3 menuStyle4';
	}
	$classes[] 	= esc_attr($menu_layout['type']);
	$classes[] 	= esc_attr($menu_layout['contained']);

	//Sticky menu
	$sticky 	= get_theme_mod('sticky_menu', 'static-header');
	$classes[] 	= esc_attr( $sticky );	


	if ( class_exists( 'WooCommerce' ) ) {
		$check = esfahan_wc_archive_check();
		
		if ( $check ) {
			$classes[] = 'woocommerce-product-loop';
		}
	}

	return $classes;
}
add_filter( 'body_class', 'esfahan_body_classes' );

/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function esfahan_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'esfahan_pingback_header' );

/**
 * Returns menu type and if the menu is contained or stretched
 */
function esfahan_menu_layout() {

	//Type
	$type 		= get_theme_mod( 'menu_type', 'menuStyle2' );
	//Contained or stretched
	$contained 	= get_theme_mod( 'menu_container', 'menuContained' );	

	$layout = array(
		'type' 		=> $type,
		'contained'	=> $contained,
	);

	return $layout;
}

/**
 * Menu container
 */
function esfahan_menu_container() {
	$layout = esfahan_menu_layout();

	if ( 'menuNotContained' === $layout['contained'] ) {
		$container = 'container-fluid';
	} else {
		$container = 'container';
	}

	return $container;
}


/**
 * Blog layout
 */
if ( !function_exists( 'esfahan_blog_layout' ) ) {
	function esfahan_blog_layout() {

		$layout = get_theme_mod( 'blog_layout', 'layout-default' );

		//Blog archive columns
		if ( $layout == 'layout-grid' || $layout == 'layout-masonry' ) {
			$cols 		= 'col-md-12';
			$sidebar	= false;
		}
		elseif ( $layout == 'layout-list-2' || $layout == 'layout-two-columns' )
		{
			$cols 		= 'col-lg-9';
			$sidebar 	= true;
		}
		else {
			$cols 		= 'col-lg-9';
			$sidebar 	= true;
		}	

		//Inner columns for list layout
		if ( $layout == 'layout-list' ) {
			$item_inner_cols = 'col-md-6 col-sm-12';
		} else {
			$item_inner_cols = 'col-md-12';
		}

		$setup = array(
			'type'				=> $layout,
			'sidebar' 			=> $sidebar,
			'cols'	  			=> $cols,
			'item_inner_cols' 	=> $item_inner_cols
		);
		
		return $setup;

	}
}

/**
 * Single post layout
 */
if ( !function_exists( 'esfahan_single_layout' ) ) {
	function esfahan_single_layout() {

		$layout = get_theme_mod( 'single_post_layout', 'layout-default' );

		//Single post columns
		if ( $layout == 'layout-default' ) {
			$cols 		= 'col-lg-9';
			$sidebar	= true;
		} else {
			$cols 		= 'col-md-12';
			$sidebar 	= false;
		}

		$setup = array(
			'type'		=> $layout,
			'sidebar' 	=> $sidebar,
			'cols'	  	=> $cols,
		);
		
		return $setup;

	}
}

/**
 * Adds class for blog grid and masonry layouts
 */
function esfahan_blog_grid( $classes ) {

	$layout = esfahan_blog_layout();

	if ( !is_singular() && ( $layout['type'] == 'layout-grid' || $layout['type'] == 'layout-masonry' ) ) {
		$classes[] = 'col-lg-4 col-md-6';
	}

	return $classes;
}
add_filter( 'post_class', 'esfahan_blog_grid' );

/**
 * Masonry data
 */
function esfahan_masonry_data() {

	$layout = esfahan_blog_layout();

	if ( $layout['type'] == 'layout-masonry' ) {
		return 'data-masonry=\'{ "itemSelector": ".hentry", "columnWidth": ".grid-sizer", "percentPosition": "true"}\'';
	}
}

/**
 * Single comment template
 */
function esfahan_comment_template($comment, $args, $depth) {

	?>
	<li id="comment-<?php comment_ID(); ?>" <?php comment_class( $comment->has_children ? 'parent' : '' ); ?>>
		<article id="div-comment-<?php comment_ID(); ?>" class="comment-body comment-entry clearfix">
			
			<figure class="comment-avatar">
				<?php echo get_avatar( $comment, $args['avatar_size'] ); ?>
			</figure>

			<div class="comment-text">
				<header class="comment-head">
					
					<a href="<?php echo esc_url( get_comment_link() ); ?>">
					<time class="comment-time" datetime="<?php comment_time( 'c' ); ?>">
						<?php 
							/* translators: %1$s: date %2$s: time */ 
							printf( esc_html_x( '%1$s at %2$s', '1: date, 2: time', 'esfahan' ), esc_html(get_comment_date()), esc_html(get_comment_time()) );  
						?>
					</time>	
					</a>				
					<h5 class="comment-author-name">
						<span><?php printf( '<b class="fn">%s</b>', get_comment_author_link() ) ; ?></span>
					</h5>
				</header>

				<div class="comment-body">
					<?php if ( '0' == $comment->comment_approved ) : ?>
					<p class="comment-awaiting-moderation"><?php esc_attr_e( 'Your comment is awaiting moderation.', 'esfahan' ); ?></p>
					<?php endif; ?>

					<div class="comment-content">
						<?php comment_text(); ?>
					</div>
					<div class="comment-links">
					<?php edit_comment_link( __( 'Edit', 'esfahan' ), '<span class="edit-link">', '</span>' ); ?>
					<?php comment_reply_link( array_merge( $args, array( 'add_below' => 'edit-link', 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>													
					</div>
				</div>
			</div>
		</article>
	<?php
}

/**
 * Excerpt length
 */
function esfahan_excerpt_length( $length ) {

	if ( is_admin() ) {
		return $length;
	}

	$excerpt = get_theme_mod('excerpt_length', '20');
	return $excerpt;
}
add_filter( 'excerpt_length', 'esfahan_excerpt_length', 999 );

/**
 * Footer credits
 */
function esfahan_footer_credits() {

	$credits = get_theme_mod( 'footer_credits' );
	?>
	
	<div class="site-info col-md-12">
		
		<?php if ( $credits == '' ) : ?>
			<a href="<?php echo esc_url( __( 'https://wordpress.org/', 'esfahan' ) ); ?>"><?php
				/* translators: %s: CMS name, i.e. WordPress. */
				printf( esc_html__( 'Proudly powered by %s', 'esfahan' ), 'WordPress' );
			?></a>
			<span class="sep"> | </span>
			<?php
				/* translators: 1: Theme name, 2: Theme author. */
				printf( esc_html__( 'Theme: %2$s by %1$s.', 'esfahan' ), 'OptimaThemes', '<a href="https://optimathemes.com/esfahan-theme/" rel="nofollow">Esfahan</a>' );
			?>
		<?php else : ?>
			<?php echo wp_kses_post( $credits ); ?>
		<?php endif; ?>
	</div><!-- .site-info -->
	
	<?php
}
add_action( 'esfahan_footer', 'esfahan_footer_credits' );

/**
 * Tag cloud font sizes
 */
function esfahan_tag_cloud_widget($args) {
	$args['largest'] = 12;
	$args['smallest'] = 12;
	$args['unit'] = 'px';
	
	return $args;
}
add_filter( 'widget_tag_cloud_args', 'esfahan_tag_cloud_widget' );

/**
 * Site branding
 */
if ( !function_exists( 'esfahan_site_branding' ) ) {
	function esfahan_site_branding() {
		
			the_custom_logo();

			if ( is_front_page() && is_home() ) : ?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php else : ?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
			<?php
			endif;

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo esc_html($description); /* WPCS: xss ok. */ ?></p>
			<?php
			endif;
		
	}
}


if ( ! function_exists( 'esfahan_header_cart_search' ) ) {
	/**
	 * Display Header cart and search icon.
	 *
	 */
	function esfahan_header_cart_search() {
		
		$disable_search = get_theme_mod( 'disable_header_search' );
		?>
		<ul class="header-search-cart">
			<?php if ( !$disable_search ) : ?>
			<li class="header-search">
				<div class="header-search-toggle"><button type="button" class="btn"><i class="fa fa-search"></i><span class="sr-only"><?php esc_html_e( 'Search Button', 'esfahan' ); ?></span></button></div>
			</li>
			<?php endif; ?>
			<li class="header-cart-link">
				<?php if ( function_exists( 'esfahan_woocommerce_cart_link' ) ) {
					esfahan_woocommerce_cart_link();
				} ?>
			</li>
		</ul>
		<?php
	}
}