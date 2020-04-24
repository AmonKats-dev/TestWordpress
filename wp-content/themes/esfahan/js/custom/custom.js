/* Sticky menu */
(function($) {

	function stickyHeader() {
		if ( matchMedia( 'only screen and (min-width: 1024px)' ).matches ) {

			$('.menuStyle1.sticky-header:not(.admin-bar) .site-header, .menuStyle2.sticky-header:not(.admin-bar) .site-header, .menuStyle3.sticky-header:not(.admin-bar) .site-header, .menuStyle4.sticky-header:not(.admin-bar) .site-header, .menuStyle5.sticky-header:not(.admin-bar) .site-header').sticky({
				topSpacing: 0,
				responsiveWidth: true
			});

			$('.menuStyle1.sticky-header.admin-bar .site-header, .menuStyle2.sticky-header.admin-bar .site-header, .menuStyle3.sticky-header.admin-bar .site-header, .menuStyle4.sticky-header.admin-bar .site-header, .menuStyle5.sticky-header.admin-bar .site-header').sticky({
				topSpacing: 32,
				responsiveWidth: true
			});

			var headerHeight = $('.site-header').outerHeight();
			$('#masthead-sticky-wrapper').css('min-height', headerHeight);

			//Help Edge with handling the menu background color
			$window = $(window);
			$window.scroll(function() {
				if ( $window.scrollTop() <= 0 ) {
					$('.menuStyle1 .sticky-wrapper').removeClass('is-sticky');
				} else {
					$('.menuStyle1 .sticky-wrapper').addClass('is-sticky');
				}
			});

		} else {
			$('.sticky-header .site-header, .sticky-header .main-navigation, .sticky-header .bottom-bar').unstick();
		}
	}
	stickyHeader();
	$(window).on('resize', stickyHeader );

})( jQuery );



/* Mobile menu */
(function($) {

	// Mobile menu navigation toggle
	// Add .mobile-menu-active class to body when mobile menu is toggled
	// With that class hide/show mobile menu overlay
	$( '.site-header' ).on( 'click', '.mobile-menu-toggle', function( e ) {
		e.preventDefault();
		$( 'body' ).toggleClass( 'mobile-menu-active' );
	} );


	$( '.main-navigation' ).on( 'click', 'li a', function( e ) {
		if ( $( 'body' ).hasClass( 'mobile-menu-active' ) ) {
			$( 'body' ).removeClass( 'mobile-menu-active' );
		}
	} );

	// Close mobile menu toggle on escape key press
	document.addEventListener( 'keyup', function( event ) {
		if ( event.key === 'Escape' ) {
			if ( $( 'body' ).hasClass( 'mobile-menu-active' ) ) {
				$( 'body' ).removeClass( 'mobile-menu-active' );
			}
		}
	} );


	// Add dropdown arrow to <li> elements that contain sub-menus
	var hasChildMenu = $( '.main-navigation' ).find('li:has(ul)');
	hasChildMenu.children('a').after('<button class="subnav-toggle"></button>');

	// Mobile sub-menus toggle action
	$( '.main-navigation' ).on( 'click', '.subnav-toggle', function( e ) {
		e.preventDefault();
		//$('.subnav-toggle').removeClass('open');
		$( this ).toggleClass( 'open' ).next( '.sub-menu, .children' ).slideToggle();
		$( this ).toggleClass( 'open' ).siblings().removeClass('open');

	} );

	$('.menu-all-pages-container > ul > li:last-child').focusout(function() {
	    $( ".mobile-menu-toggle" ).focus();
	} );

	$('.subnav-toggle').click(function(){
	    $(this).toggleClass("subnav-active");
	});

})( jQuery );

/* Mobile menu */
(function($) {
	
	function mobileMenu() {
		if ( $('.site-header').length ) {
			var headerHeight = $( '.site-header' ).outerHeight();
			
			if ( matchMedia( '(max-width: 992px)' ).matches ) {

				// Check if WordPress Admin bar is present and accomodate the extra spacing by pushing the mobile menu futher bellow
				if ( $('#wpadminbar').length ) {
					var wpadminbarHeight = $( '#wpadminbar' ).outerHeight();
					$( '.main-navigation' ).css( 'top', headerHeight + wpadminbarHeight - 1 );
				} else {
					$( '.main-navigation' ).css( 'top', headerHeight - 1 );
				}

			} else {
				$( '.main-navigation' ).css( 'top', 'auto' );
			}
		}
	}


	$(this).live('keydown', function(e) { 

		$('.mobile-menu-active .menu-all-pages-container > ul > li:last-child').focusout(function() {
			
	    	var keyCode = e.keyCode || e.which; 

			if(keyCode == 9) {
			    if(e.shiftKey) {
			       //Focus previous input
			       $('.menu-all-pages-container > ul > li:nth-last-child(2) a').focus();
			    }
			    else {
			       //Focus next input
			       $( ".mobile-menu-toggle" ).focus();
			    }
			}


		});

	});

	$(window).on('load resize', mobileMenu );

})( jQuery );


/* Header search toggle */
(function($) {

	var toggleButton = $( '.header-search-toggle' );

	if ( toggleButton.length ) {

		toggleButton.on("click", function(){
			$( '.header-search-form' ).slideToggle();
			$( '.header-search-form .search-field' ).focus();

		});
		
		$('.esf-search-button').focusout(function() {
		    $( '.header-search-form .search-field' ).focus();
		} );

		$('.header-search-form .search-field').focusout(function() {
		    $( '.esf-search-button' ).focus();
		} );

	}

	$(".header-search-form .esf-search-button").on("click", function(){
		$( '.header-search-form' ).hide();
		$( '.header-search-toggle button' ).focus();
		
	});
	
	// remove all instances of is-focused added by touch-keyboard-navigation.js
	$(document).on("click", function(){
		$('.is-focused').removeClass('is-focused');
	});
	
})( jQuery );


/* Featured Slider */
(function($) {

	if (esfahanSlider.esfahan_slider_active) {
		var RTL = false;
		if( $('html').attr('dir') == 'rtl' ) {
		RTL = true;
		}

		$('#featured-slider').slick({
			prevArrow: '<span class="prev-arrow icon-left-open-big"></span>',
			nextArrow: '<span class="next-arrow icon-right-open-big"></span>',
			dotsClass: 'slider-dots',
			adaptiveHeight: true,
			rtl: RTL,
			speed: 700,
	  		customPaging: function(slider, i) {
	            return '';
	        }
		});
	}

})( jQuery );