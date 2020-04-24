<?php
/**
 * Template part for Menu style 4
 *
 * @package Esfahan
 */
?>

<header id="masthead" class="site-header">
	
	<div class="<?php echo esc_attr( esfahan_menu_container() ); ?>">

		<div class="menu3-container col-12">
			<div class="row">
				<div class="header-mobile-menu col-2">
					<button class="mobile-menu-toggle" aria-controls="main-menu">
						<span class="mobile-menu-toggle_lines"></span>
						<span class="sr-only"><?php esc_html_e( 'Toggle mobile menu', 'esfahan' ); ?></span>
					</button>
				</div>
				<nav id="site-navigation" class="main-navigation col-lg-9">
					<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'main-menu',
							'fallback_cb' 		=> 'esfahan_main_menu_fallback',
						) );
					?>
					<div></div>
				</nav><!-- #site-navigation -->

				<div class="col-lg-3 col-10">
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
						<?php esfahan_header_cart_search(); ?>
					</div>
					<div class="header-search-form">
						<?php get_search_form(); ?>
						<button class="esf-search-button"><i class="fa fa-times"></i></button>
					</div>
				</div>
			</div>
		</div>
		<div class="site-branding col-12">
			<?php esfahan_site_branding(); ?>
		</div><!-- .site-branding -->
		
	</div>


</header><!-- #masthead -->