<?php
/*
Template Name: Fullwidth + Slider
*/


get_header();

$slider_columns 	= "1";
$slider_autoplay 	= "0";
$slider_navigation 	= get_theme_mod('show_arrows' , true);
$slider_pagination 	= get_theme_mod('show_pagination', true);
$slider_width 	= get_theme_mod('slider_width' , 'boxed');
$slider_posts 	= get_theme_mod('slider_posts' , 'all-posts');

$slider_data = '{';

	$slider_data .= '"slidesToShow":'.$slider_columns;

	if ( $slider_autoplay > 0 ) {
		$slider_data .= ', "autoplay": true, "autoplaySpeed": '. $slider_autoplay;
	}

	if ( !$slider_navigation ) {
		$slider_data .= ', "arrows":false';
	} 

	if ( $slider_pagination ) {
		$slider_data .= ', "dots":true';
	}

	if ( $slider_columns === '1' ) {
	  	$slider_data .= ', "fade":true';
	}

$slider_data .= '}';

?>

<div class="<?php  
	if ( $slider_width === 'full-width' ) {
		echo esc_attr("container-fluid px-0");
	}
	if ( $slider_width === 'boxed' ) {
		echo esc_attr("container");
	}
?>">
	
	<div id="featured-slider" class="" data-slick="<?php echo esc_attr( $slider_data ); ?>">

		<?php 

		// Query Args
		$args = array(
			'post_type'		      	=> array( 'post' ),
			'order'			      	=> 'DESC',
			'posts_per_page'      	=> get_theme_mod('number_of_slides', '2'),
			'ignore_sticky_posts'	=> 1,
			'meta_query' 			=> array( 
				array(
					'key' 		=> '_thumbnail_id',
					'compare' 	=> 'EXISTS'
				) ),			
		);

		if ( $slider_posts === 'by-post-category' ) {
			$args['cat'] = get_theme_mod('slider_category');
		}

		$sliderQuery = new WP_Query();
		$sliderQuery->query( $args );


		// Loop Start
		if ( $sliderQuery->have_posts() ) :

		while ( $sliderQuery->have_posts() ) : $sliderQuery->the_post();

		?>

		<div class="slider-item">
			<?php if ( $slider_columns === '1' ) : ?>
				<div class="slider-item-bg" style="background-image:url(<?php the_post_thumbnail_url(); ?>);"></div>
			<?php else : ?>
				<img src="<?php the_post_thumbnail_url('esfahan-slider-full-thumbnail'); ?>" alt="">
			<?php endif; ?>

			<div class="cv-container image-overlay">
				<div class="cv-outer">
					<div class="cv-inner">
						<div class="slider-info">

							<h2 class="slider-title"> 
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a>								
							</h2>

							<div class="slider-content"><?php esfahan_excerpt( 30 ); ?></div>

							<div class="slider-read-more">
								<a href="<?php echo esc_url( get_permalink() ); ?>"><?php esc_html_e( 'read more','esfahan' ); ?></a>
							</div>

						</div>
					</div>
				</div>
			</div>

		</div>

		<?php

		endwhile; // Loop end
		endif;

		?>

	</div>
	
</div>

<style>
	.entry-title {
		display: none;
	}
</style>

<div id="primary" class="content-area fullwidth col-md-12">
	<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>

	</main><!-- #main -->
</div><!-- #primary -->
<?php
get_footer();
