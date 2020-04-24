<?php
/**
 * Template part for Menu style 2
 *
 * @package Esfahan
 */
?>

<header id="masthead" class="site-header">
	
	<div class="<?php echo esc_attr( esfahan_menu_container() ); ?>">
		<div class="esf-row">
			<div class="site-branding col-lg-10 col-12">
				<?php esfahan_site_branding(); ?>
			</div><!-- .site-branding -->
			
			<div class="header-mobile-menu col-4">
				<button class="mobile-menu-toggle" aria-controls="main-menu">
					<span class="mobile-menu-toggle_lines"></span>
					<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'esfahan' ); ?></span>
				</button>
			</div>

			<div class="menu2-social col-lg-2 col-8">
				<div class="socials d-flex justify-content-end">
					<?php
					$esfahan_socials = array( 'facebook', 'instagram', 'twitter', 'linkedin', 'pinterest' );
					foreach ( $esfahan_socials as $esf_social )
					{
						$esf_field_name = sprintf( 'menu5_%s', $esf_social );
						$esf_social_value = get_theme_mod( $esf_field_name );
						if ( $esf_social_value )
						{
						?>
							<a href="<?php echo esc_url( $esf_social_value ); ?>" target="_blank"><i class="fa fa-<?php echo esc_attr( $esf_social ); ?>" aria-hidden="true"></i></a>
						<?php
						}
					?>
					<?php
					}
					?>
					<div class="esf-search-mobile">
					<?php esfahan_header_cart_search(); ?>
					</div>
				</div>
				<div class="header-search-form esf-search-form-1">
					<?php get_search_form(); ?>
					<button class="esf-search-button"><i class="fa fa-times"></i></button>
				</div>
			</div>


			<nav id="site-navigation" class="main-navigation col-lg-12">
				<?php
					wp_nav_menu( array(
						'theme_location' => 'menu-1',
						'menu_id'        => 'main-menu',
						'fallback_cb' 		=> 'esfahan_main_menu_fallback',
					) );
				?>
				<?php esfahan_header_cart_search(); ?>
				<div class="header-search-form esf-search-form-2">
					<?php get_search_form(); ?>
					<button class="esf-search-button"><i class="fa fa-times"></i></button>
				</div>
			</nav><!-- #site-navigation -->
			
		</div>
	</div>
	

</header><!-- #masthead -->