jQuery(document).ready(function($){
	"use strict";
	var isRTL = $('body').hasClass('rtl') ? true : false;
  	
	$('.nav-paste').html( $('.nav-copy').html() );

	$('.form-submit #submit').addClass('btn animation');

	$('.related.products h2, .upsells.products h2, .cart_totals h2, .woocommerce-billing-fields h3, #ship-to-different-address, .checkout.woocommerce-checkout h3, .woocommerce-order-received h2, .woocommerce-order-received h3, .woocommerce-account h2, .woocommerce-account h3').wrap('<div class="widget-title-wrap clearfix"></div>');

	$('.contact-form').append('<input type="hidden" name="captcha" value="1">');

	$('select:not(.country_select):not(#rating)').wrap('<div class="styled-select"></div>');

	$('.widget_layered_nav .count').each(function(){
		var $this = $(this);
		$this.text( $this.text().replace( '(', '' ).replace( ')', '' ) );
	});

	/* BUTTON TO TOP */
	//on scolling, show/animate timeline blocks when enter the viewport
	$(window).on('scroll', function(){		
		if( $(window).scrollTop() > 200 ){
			$('.to_top').fadeIn(100);
		}
		else{
			$('.to_top').fadeOut(100);
		}
	});
	
	$(document).on('click', '.to_top', function(e){
		e.preventDefault();
		$("html, body").stop().animate(
			{
				scrollTop: 0
			}, 
			{
				duration: 1200
			}
		);		
	});
	
	/* NAVIGATION */
	$(document).on('click', '#navigation a', function(e){
		if( $(window).width() < 768 && e.target.nodeName == 'I' ){
			return false;
		}
		else if( $(this).attr( 'href' ).indexOf( 'http' ) > -1 && !$(this).attr('target') ){
			window.location.href = $(this).attr('href');
		}
	});

	function handle_navigation(){
		if ($(window).width() > 768) {
			$('ul.nav li.dropdown, ul.nav li.dropdown-submenu').hover(function () {
				$(this).addClass('open').find(' > .dropdown-menu').show();
			}, function () {
				$(this).removeClass('open').find(' > .dropdown-menu').hide();
	
			});
		}
		else{
			$('.dropdown-toggle').removeAttr('data-toggle');
			$(document).on( 'click', 'li.dropdown a', function(e){
				e.preventDefault();
				if( !$(this).parent().hasClass('open') ){
					$(this).parent().addClass('open').find(' > .dropdown-menu').show();
					$(this).parents('.dropdown').addClass('open').find(' > .dropdown-menu').show();
				}
				else{
					$(this).parent().removeClass('open').find(' > .dropdown-menu').hide();
					$(this).parent().find('.dropdown').removeClass('open').find(' > .dropdown-menu').hide();
				}
			});	
		}
	}
	handle_navigation();
	
	$(window).resize(function(){
		setTimeout(function(){
			handle_navigation();
		}, 200);
	});	

	if( wrapit_data.enable_sticky == 'yes' ){
		$(window).scroll(function(){
			if( $(window).width() > 768 && $(window).scrollTop() > 200 ){
				var top;
				$('#wpadminbar').length > 0 ? top = $('#wpadminbar').height() : top = 0;
				$('.fixed-responsive-nav').css('top', top+'px');
			}
			else{
				$('.fixed-responsive-nav').css('top', '-1000px');	
			}
		});
	}

	/* START MASONRY */
	var $container = $('.masonry');
	var has_masonry = false;
	// initialize
	function start_masonry(){
		if( $container.length == 0 ){
			return;
		}
		if( $(window).width() < 768 && has_masonry ){
			$container.masonry('destroy');
			has_masonry = false;
			$('.masonry-item').removeClass('masonry-load');
		}
		else if( $(window).width() >= 768 && !has_masonry ){
			$('.masonry-item').addClass('masonry-load');
			$container.imagesLoaded(function() {
				$container.isotope({
					itemSelector: '.masonry-item',
					layoutMode: 'masonry',
					masonry: {
    					gutter: 30
  					}
				});
				has_masonry = true;
			});	
		}
	}
	
	start_masonry();
	
	$(window).resize(function(){
		setTimeout( function(){
			start_masonry();
		}, 500);
	});	

	var activeFilter = '';
	$(document).on( 'click', '.project-filters a', function(){
		var $this = $(this);
		var filterValue = '*';

 		var isActive = $this.hasClass( 'active' );
		if ( !isActive ) {
			$('.project-filters a').removeClass('active');
			filterValue = $this.data('filter');
			$this.addClass('active');
			activeFilter = filterValue;
			$container.isotope({ filter: filterValue });
		}
	});

	if( window.location.hash ){
		$('a[data-filter=".'+window.location.hash.replace('#','')+'"]').trigger('click');
	}

	/* SUBMIT FORMS */
	$(document).on('click', '.submit_form', function(){
		$(this).parents('form').submit();
	});
	
	$(document).on('click', '.submit-form', function(){
		var $this = $(this);
		var $form = $this.parents( 'form' );
		var $result = $form.find('.send_result');
		if( $this.find( 'i' ).length == 0 ){
			var $html = $this.html();
			$this.html( $html+' <i class="ion-loop"></i>' );
			if( $form.find('#description').length > 0 && typeof tinyMCE !== 'undefined' && $('#wp-description-wrap').hasClass('tmce-active') ){
				var tiny = tinyMCE.get('description').getContent();
				$('#description').val( tiny );
			}
			if( $form.find('#wrapit_steps').length > 0 && typeof tinyMCE !== 'undefined' && $('#wp-wrapit_steps-wrap').hasClass('tmce-active') ){
				var tiny = tinyMCE.get('wrapit_steps').getContent();
				$('#wrapit_steps').val( tiny );
			}			
			$.ajax({
				url: wrapit_data.ajaxurl,
				data: $form.serialize(),
				method: $form.attr('method'),
				dataType: "JSON",
				success: function(response){
					if( response.message ){
						$result.html( response.message );
					}
					if( response.captcha ){
						$('.captcha-solve').html( response.captcha );
						$('#captcha').val('');
					}
					if( response.url ){
						window.location.href = response.url;
					}
				},
				complete: function(){
					$this.html( $html );
				}
			});
		}
	});
	
	
	/* SUBSCRIBE */
	$(document).on('click', '.subscribe', function(e){
		e.preventDefault();
		var $this = $(this);
		var $parent = $this.parents('.subscribe-form');		
		
		$.ajax({
			url: wrapit_data.ajaxurl,
			method: "POST",
			data: {
				action: 'subscribe',
				email: $parent.find( '.email' ).val()
			},
			dataType: "JSON",
			success: function( response ){
				if( !response.error ){
					$parent.find('.sub_result').html( '<div class="alert alert-success" role="alert"><span class="ion-checkmark-circled"></span> '+response.success+'</div>' );
				}
				else{
					$parent.find( '.sub_result' ).html( '<div class="alert alert-danger" role="alert"><span class="ion-close-circled"></span> '+response.error+'</div>' );
				}
			}
		})
	} );

		
	/* contact script */
	$(document).on('click', '.send-contact', function(e){
		e.preventDefault();
		var $this = $(this);
		var $html = $this.html();
		$this.append( ' <i class="ion-loop"></i>' );		
		$.ajax({
			url: wrapit_data.ajaxurl,
			method: "POST",
			data: $('.comment-form').serialize(),
			dataType: "JSON",
			success: function( response ){
				if( !response.error ){
					$('.send_result').html( '<div class="alert alert-success" role="alert"><span class="ion-checkmark-circled"></span> '+response.success+'</div>' );
				}
				else{
					$('.send_result').html( '<div class="alert alert-danger" role="alert"><span class="ion-close-circled"></span> '+response.error+'</div>' );
				}
			},
			complete: function(){
				$this.html( $html );
			}
		})
	});
	
	/* MAGNIFIC POPUP FOR THE GALLERY */
	$('a[class^="gallery-"]').each(function(){
		var $this = $(this);
		$this.addClass( 'gallery-item' );
		$('a[class^="gallery-"]').magnificPopup({
			type:'image',
			gallery:{enabled:true},
		});
	});
	function showCaption(){
		var move = '5%';
		if( $(window).width() > $('.container').width() + 30 ){
			move = ( $(window).width() - $('.container').width() ) / 2;
		}
		setTimeout(function(){
			var $caption = $('.wrapit-slider .owl-item.active .ind-slide-caption');
			$caption.css('top', ( $('.wrapit-slider').height() - $caption.height() ) / 2);
			if( isRTL ){
				$caption.css({
					opacity: 1,
					right: move
				});
			}
			else{
				$caption.css({
					opacity: 1,
					left: move
				});
			}
		}, 600);
	}
	function hideCaption(){
		var $caption = $('.wrapit-slider .owl-item.active .ind-slide-caption');
		if( isRTL ){
			$caption.css({
				opacity: 0,
				right: 0
			});
		}
		else{
			$caption.css({
				opacity: 0,
				left: 0
			});
		}
	}
	/* BIG SLIDER */
	$(window).load(function(){
		$('.wrapit-slider').owlCarousel({
			items: 1,
			dots: false,
			rtl: isRTL ? true : false,
			autoplayHoverPause: true,
			autoplay: 5000,
			nav: $('.wrapit-slider .ind-slide').length > 1 ? true : false,
			mouseDrag: false,
			smartSpeed: 500,
			loop: $('.wrapit-slider .ind-slide').length > 1 ? true : false,
			onChange: function(){
				hideCaption();
			},
			onResize: function(){
				hideCaption();
			},
			onResized: function(){
				showCaption();
			},
			onChanged: function(){
				showCaption();
			},
			onInitialized: function(){
				showCaption();
			},
			navText: ['<i class="ion-android-arrow-dropleft animation"></i>', '<i class="ion-android-arrow-dropright animation"></i>']
		});
	});

	/* TESTIMONIALS */
	$(window).load(function(){
		$('.testimonials').each(function(){
			$(this).owlCarousel({
				items: 1,
				rtl: isRTL ? true : false,
				dots: true,
				margin: 0,
			});
		});	
	});

	$('.clients').each(function(){
		var $this = $(this);
		$this.owlCarousel({
			rtl: isRTL ? true : false,
			responsive: {
				0:{
					items: 1
				},
				300:{
					items: 2
				},
				400:{
					items: 3
				},
				600:{
					items: 4
				},
				800:{
					items: 5
				},
				1027:{
					items: 7
				}
			},
			dots: false,
			nav: false,
			margin: 15,
			autoplayHoverPause: true,
			loop: $this.data('rotate') ? true : false,
			autoplay: $this.data('rotate') ? true : false,
			autoplayTimeout: $this.data('rotate') ? parseInt( $this.data('rotate') ) : 5000

		});
	});

	/* PROJECTS */
	$('.projects-slider').each(function(){
		var $this = $(this);
		$this.owlCarousel({
			rtl: isRTL ? true : false,
			responsive: {
				0:{
					items: 1
				},
				500:{
					items: 2
				},
				800:{
					items: 3
				},
				1000: {
					items: 4
				}
			},
			dots: false,
			nav: false,
			margin: 30
		});
	});

	/* CONTACT GMAP */
	var $map = $('.contact-map');
	if( $map.length > 0 ){
		var markers = JSON.parse( $map.html().trim() );
		$map.html('');
		$map.removeClass('hidden');
		var markersArray = [];
		var bounds = new google.maps.LatLngBounds();
		var mapOptions = { mapTypeId: google.maps.MapTypeId.ROADMAP };
		var map =  new google.maps.Map($map[0], mapOptions);
		if( markers.length > 0 ){
			for( var i=0; i<markers.length; i++ ){
				var temp = markers[i].split(',');
				var location = new google.maps.LatLng( temp[0], temp[1] );
				bounds.extend( location );

				var marker = new google.maps.Marker({
				    position: location,
				    map: map,
				    icon: wrapit_data.marker_icon
				});				
			}

			map.fitBounds( bounds );

			var listener = google.maps.event.addListener(map, "idle", function() { 
				if( wrapit_data.markers_max_zoom != '' ){
			  		map.setZoom(parseInt( wrapit_data.markers_max_zoom ));
			  		google.maps.event.removeListener(listener); 
			  	}
			});			
			
		}
	}
	/* SEARCH BAR */
	$(document).on('click', '.search-trigger', function(){
		$('.search-bar').slideToggle();
	});

	/* APPEND STYLE TO SHORTCODE */
	$('.service').each(function(){
		var $this = $(this);
		var elements = $this.data('colors').split('|');		

		var style = '<style>';
		if( elements[1] ){
			style += '.service.'+elements[0]+' h5{ color: '+elements[1]+' }';
		}
		if( elements[2] ){
			style += '.service.'+elements[0]+' p{ color: '+elements[2]+' }';
		}
		if( elements[3] ){
			style += '.service.'+elements[0]+' a{ color: '+elements[3]+' }';
		}
		if( elements[4] ){
			style += '.service.'+elements[0]+' a:hover{ color: '+elements[4]+' }';
		}
		style += '</style>';

		$("head").append( style );
		
	});

	function bootstrap_3_to_2(){
		if( $('.ajax-container').length > 0 ){
			var $html = [];
			var pointer = 0;
			var counter = 0;
			var max_number = 1;
			var $window_width = $(window).width();
			if( $window_width > 400 ){
				max_number = 2;
			}
			if( $window_width > 600 ){
				max_number = 3;
			}			
			if( $window_width > 768 ){
				max_number = 2;
			}
			if( $window_width > 990 ){
				max_number = 3;
			}			
			$('.ajax-container .product-item-wrap').each(function(){
				counter++;
				var $this = $(this);
				if( !$html[pointer] ){
					$html[pointer] = '';
				}
				$html[pointer] += '<div class="product-item-wrap col-xs-'+( 12 / max_number )+'">'+$this.html()+'</div>';
				if( max_number == counter ){
					counter = 0;
					$html[pointer] = '<div class="row">'+$html[pointer]+'</div>';
					pointer++;
				}
			});

			if( $html.length > 0 ){
				if( $html[$html.length - 1].indexOf( 'row' ) == -1 ){
					$html[$html.length - 1] = '<div class="row">'+$html[$html.length - 1]+'</div>';
				}
			}

			$('.ajax-container').html( $('.ajax-container').find('.woocommerce-info, .woocommerce-message, .woocommerce-error').clone() );
			$('.ajax-container').prepend( $html.join('') );
		}
	}

	/* Fix reviews number for the RTL */
	var $reviews = $('a[href="#tab-reviews"]');
	if( isRTL && $reviews.length > 0 ){
		var number = parseInt( $reviews.text().split('(')[1].split(')') );
		var el = $reviews.text().split(' ');
		el[el.length-1] = '';
		$reviews.text( '('+number+') '+el.join(' ') );
	}

	/* LANGUAGE SELECTOR */
	$(document).on('change', '.language-selector select', function(){
		var link = $(this).val();
		if( link ){
			window.location.href = link;
		}
	});

	/* START COUNT UP */
	$('.counter').counterUp({
	    delay: 10,
	    time: 1000
	});
});