<?php // About esfahan

// Add About esfahan Page
function esfahan_about_page() {
	add_theme_page( esc_html__( 'About Esfahan', 'esfahan' ), esc_html__( 'About Esfahan', 'esfahan' ), 'edit_theme_options', 'about-esfahan', 'esfahan_about_page_output' );
}
add_action( 'admin_menu', 'esfahan_about_page' );

// Render About esfahan HTML
function esfahan_about_page_output() {
?>
	<div class="wrap">
		<h1><?php esc_html_e( 'Welcome to esfahan!', 'esfahan' ); ?></h1>
		<p class="welcome-text">
			<?php esc_html_e( 'Esfahan is a free multi-purpose WordPress Blog theme. It\'s perfect for any kind of blog or website: personal, professional, tech, fashion, travel, health, lifestyle, food, blogging etc. Its fully Responsive and Retina Display ready, clean, modern and minimal design. esfahan is WooCommerce compatible, SEO friendly and also has RTL support.', 'esfahan' ); ?>
		</p>

		<!-- Tabs -->
		<?php $active_tab = isset( $_GET[ 'tab' ] ) ? sanitize_text_field( wp_unslash($_GET[ 'tab' ]) ) : 'esfahan_tab_1'; ?>  
	
		<div class="nav-tab-wrapper">
			<a href="?page=about-esfahan&tab=esfahan_tab_1" class="nav-tab <?php echo $active_tab == 'esfahan_tab_1' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Getting Started', 'esfahan' ); ?>
			</a>
			<a href="?page=about-esfahan&tab=esfahan_tab_2" class="nav-tab <?php echo $active_tab == 'esfahan_tab_2' ? 'nav-tab-active' : ''; ?>">
				<?php esc_html_e( 'Support', 'esfahan' ); ?>
			</a>
		</div>

		<!-- Tab Content -->
		<?php if ( $active_tab == 'esfahan_tab_1' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Customizer', 'esfahan' ); ?></h3>
					<p>
					<?php esc_html_e( 'All theme options are located here. We recommend you to open the Theme Customizer and play with some options. You will enjoy it.', 'esfahan' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url( wp_customize_url() );?>" class="button button-primary"><?php esc_html_e( 'Customize Your Site', 'esfahan' ); ?></a>
				</div>
				
				<br>

				<div class="column-wdith-3">
					<h3><?php esc_html_e( 'Theme Demo', 'esfahan' ); ?></h3>
					<p>
					<?php esc_html_e( 'Click below to check the theme Demo', 'esfahan' ); ?>
					</p>
					<a target="_blank" href="<?php echo esc_url('https://optimathemes.com/esfahan-demo/'); ?>" class="button button-primary"><?php esc_html_e( 'Esfahan Demo', 'esfahan' ); ?></a>
				</div>

			</div>

		<?php elseif ( $active_tab == 'esfahan_tab_2' ) : ?>

			<div class="three-columns-wrap">

				<br>

				<div class="column-wdith-3">
					<h3>
						<span class="dashicons dashicons-book"></span>
						<?php esc_html_e( 'Support', 'esfahan' ); ?>
					</h3>
					<p>
						<?php esc_html_e( 'Need more details? Please check our website for details.', 'esfahan' ); ?>
						<hr>
						<a target="_blank" href="<?php echo esc_url('https://optimathemes.com/esfahan-theme/'); ?>"><?php esc_html_e( 'Check our website for theme demo', 'esfahan' ); ?></a>
					</p>
				</div>

			</div>

	    <?php endif; ?>

	</div><!-- /.wrap -->
<?php
} // end esfahan_about_page_output

