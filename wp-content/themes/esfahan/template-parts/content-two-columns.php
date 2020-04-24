<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package Esfahan
 */

$layout 		= esfahan_blog_layout();
$hide_thumb 	= get_theme_mod( 'index_hide_thumb' );
$hide_date 		= get_theme_mod( 'index_hide_date' );
$hide_cats 		= get_theme_mod( 'index_hide_cats' );
$hide_author 	= get_theme_mod( 'index_hide_author' );
$hide_comments 	= get_theme_mod( 'index_hide_comments' );
$post_class[] = 'col-md-6';
$post_class[] = $layout['type'];
?>

<article id="post-<?php the_ID(); ?>" <?php post_class( implode( ' ', $post_class ) ); ?>>
	<div class="inner">
		<header class="entry-header">
			<?php
			if ( $hide_thumb == '' ) :
				if ( has_post_thumbnail() )
				{
					?>
					<div class="thumbnail<?php echo esc_attr( $layout['item_inner_cols'] ); ?>">
						<?php esfahan_post_thumbnail(); ?>
					</div>
					<?php
				}
			endif;

			?>
		</header><!-- .entry-header -->
		<div class="post-info <?php echo esc_attr( $layout['item_inner_cols'] ); ?>">
			<header class="entry-header">
				<?php
					if ( $hide_date == '' ) {
						esfahan_posted_on();
					}
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

				if ( 'post' === get_post_type() ) : ?>
				<div class="entry-meta">
					<?php
						if ( $hide_cats == '' ) {
						echo '<span>';
							esfahan_first_category();
						echo '</span>';
						}
						if ( $layout['type'] != 'layout-grid' && $layout['type'] != 'layout-masonry' && $hide_author == '' ) {
							esfahan_posted_by();
						}
						if ( $hide_comments == '' ) {
							esfahan_get_comments_number();
						}
					?>
				</div><!-- .entry-meta -->
				<?php
				endif; ?>
			</header><!-- .entry-header -->	

			

		</div>
	</div>
</article><!-- #post-<?php the_ID(); ?> -->
