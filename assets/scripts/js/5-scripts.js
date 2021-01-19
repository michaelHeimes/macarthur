jQuery( document ).ready(function($) {
	
// 	Preloader
	$(".preloader").fadeIn(300);
  	
	$(window).on("load", function() {
		
		var $preloaderImgWrap = $('.preloader .img-wrap');
		var $preloaderImg = $('.preloader .img-wrap img');
		var $preloaderLine = $('.preloader .vertical-line')
		
		var $wrapOffset = $('.preloader .img-wrap').offset();
		var $imgWrapBottom = $wrapOffset.top;
		var $imgHeight = $('.preloader .img-wrap img').height();
		var $imgPosition = $imgWrapBottom + $imgHeight;
		var $verticalLineHeight = $imgWrapBottom - 57;
				
		$preloaderLine.css('height', $verticalLineHeight);
		
		gsap.set($preloaderImg, {
			y: $imgPosition
		});

		gsap.set($preloaderLine, {
			y: $imgPosition, opacity: 1
		});
		
		$('.off-canvas-content').css('opacity', '1');
		
		gsap.to($preloaderImg, {
			y: '0%', duration: 3, delay: 0, ease: 'expo.out'
	  	});	

		gsap.to($preloaderLine, {
			y: '0%', duration: 3, delay: 0, ease: 'expo.out'
	  	});	

		$(".preloader").addClass('loaded');	

	  	setTimeout(function(){ 
			$(".preloader").addClass('loaded');	
		}, 2000);

	  	setTimeout(function(){ 
		  	
			$("body").css('overflow', 'visible');	
			
			$(".preloader").fadeOut(700);
			
		}, 3500);
		
	});

	
// 	Desktop Menu
	$('.top-bar .top-bar-right ul#main-nav li.is-dropdown-submenu-parent').removeClass('opens-left');
	$('.top-bar .top-bar-right ul#main-nav li.is-dropdown-submenu-parent').addClass('opens-right');
	
//	Mobile Menu
	var $navTrigger = $('button.mobile-nav-trigger');
	var $mobileNav = $('.mobile-nav');
	
	$($navTrigger).click(function(e) {
		$mobileNav.fadeToggle(300);
		$navTrigger.toggleClass('open');
	});
		
// 	Home Page Banner Nav Drawers
	if ( $('nav#bh-drawer-nav').length ) {
		
		var maxWidth = 0;
		var widestSpan = null;
		var $element;
		
		$("nav#bh-drawer-nav .tab").each(function(){
			$element = $(this);
			
			if($element.width() > maxWidth){
				maxWidth = $element.width();
				widestSpan = $element; 
			}
			
			$tabWidthConst = -widestSpan.outerWidth() + 1;
						
			$('#bh-drawer-nav').css("transform", "translate(" + $tabWidthConst + "px)", "0px");
			
		});
		
		
		$('nav#bh-drawer-nav .drawer').each(function( i ) {

			var $this = $(this);
			var $tab = $this.find('.tab');
			var $tabWidth = $($tab).outerWidth();
			
			$('#bh-drawer-nav .drawer .content').css('padding-right', $tabWidth);			
			
			var $drawerContent = $this.find('.content');
			var $drawerContentWidth = $($drawerContent).outerWidth();
			
			
// 			$this.css("transform", "translate(" + $drawerContentWidth + "px)", "0px");
						
/*
			$this.on('click', $tab, function() {
				
				if ( $this.hasClass('clicked') ) {
					$this.css('transform','translate(0px,0px)');
					$this.removeClass('clicked');

				} else {
					
					$this.css("transform", "translate(" + -$drawerContentWidth + "px)", "0px");
					$this.addClass('clicked');
					
				}
				
			});
*/
				
			$this.hover(
			
				function() {
					$this.css("transform", "translate(" + -$drawerContentWidth + "px)", "0px");
					$this.addClass('hovered');
				},	
				
				function() {
					$this.css('transform','translate(0px,0px)');
					$this.removeClass( "hovered" );
				}			
				
			);
				
		});
	   
	}
	
	
// 	Home Page Improvement Slider
	if ($('body').hasClass('home')) {
		
		$(window).on("load resize", function() {
			var $button1Width = $('button.line-offset-const').width();
			
			var $linePosition = $button1Width * .5;
						
			$('.toggle-content-wrap .line-wrap').css('left', $linePosition);
			
// 			gsap.set('.toggle-content-wrap .line-wrap', {x: $linePosition});
		
		});
		
		$(window).on("load", function() {
		
			gsap.fromTo('.toggle-content-wrap .line', 1, {height: 0}, {height: '100%', ease: 'expo.out',
				scrollTrigger: {
				    trigger: '.improvement',
				    start: 'top 40%',
				    toggleActions: 'play none play reverse'
				}
			});		
	
			gsap.fromTo('.toggle-content-wrap .circ.two', 1, {top: '0%'}, {top: '100%', ease: 'expo.out',
				scrollTrigger: {
				    trigger: '.improvement',
				    start: 'top 40%',
				    toggleActions: 'play none play reverse'
				}
			});
		
		});

	
		$('.toggle-content-slider').slick({
			fade: true,
			arrows: false
		});
		
		$('.toggle-nav-wrap button[data-slide]').click(function(e) {
			e.preventDefault();
			
			$(this).addClass('active');
			$(this).siblings('button').removeClass('active');
			
			var slideno = $(this).data('slide');
			$('.toggle-content-slider').slick('slickGoTo', slideno - 1);
		});
			
	}
	
// 	Home Page Accordion
	if($('.home-accordion .accordion.last-active').length) {
		
		$('.home-accordion  .accordion-item').last().addClass('open');
		
		$(document).on('click', '.home-accordion a', function(e) {
			e.preventDefault();
			
			$(this).parent().addClass('open');
			$(this).parent().siblings().removeClass('open');
			
		});
		
/*
		$('.home-accordion .accordion.last-active').foundation('toggle', $('.accordion.last-active >div:last-child a'));
		$('.home-accordion .accordion.last-active >div:last-child a').next('.accordion-content').css('display', 'block');
*/
		
	}

	
// 	Articles Filter
	if ($('body').hasClass('page-template-articles-page')) {

		// Set initial active item	
		document.querySelector('#cat-filter button:first-child').classList.add('active'); // Set initial active state
						
		// Animation flag
		var alm_is_animating = false; 
		  
		// Click Event
		function filterClick(){
			
			if ( $(this).hasClass('active') && !alm_is_animating) { // Exit if active
				return false;
				$(this).removeClass('active');
			} else {
				$(this).addClass('active');
				$(this).parent().siblings().find('button').removeClass('active');
				alm_is_animating = true;			
			};
				   
		   // Set filters 
			var transition = 'fade';
			var speed = 250;
			var data  = this.dataset;
			
			// Call core Ajax Load More `filter` function
			ajaxloadmore.filter(transition, speed, data);
		}
		 
		// Event Handlers
		var filter_buttons = document.querySelectorAll('#cat-filter button');
		if(filter_buttons){
			[].forEach.call(filter_buttons, function(button) {
				button.addEventListener('click', filterClick);
			});
		}
		 
		// Callback
		window.almFilterComplete = function(){      
		   alm_is_animating = false; // Clear animation flag
		};

	}
	

	if($('.podcast-player-wrap').length) {
		
		var $player = $('.podcast-player-wrap');
		var $playerURL = "https://open.spotify.com/embed/episode/";

		$( 'article.single-podcast button' ).each(function( index ) {
		
			var $this = $(this);
			
			var $playButtonId = $($this).data('episode');
			
			$this.click(function(e) {
				e.preventDefault();				
				$('.podcast-player-wrap iframe').attr('src', $playerURL + $playButtonId);
				$player.addClass('show').fadeIn(300);
			});			
		})
	
	}
	
	if ($('body').hasClass('page-template-podcast-page')) {
		
		$('a#all-podcasts-label').addClass('initial');
		
		if ($('a#all-podcasts-label').hasClass('initial') ) {

			$('a#all-podcasts-label').on('click', function(e) {
				ajaxloadmore.reset();
				$('a#all-podcasts-label').removeClass('initial');
			});
			
			} else {
			
		}
		

		
	}
	
// 	Mentorship Slider
	if($('.testimonial-slider').length) {
	
		$('.testimonial-slider').slick({
			fade: true,
			arrows: false
		});		
		
		$('.testimonials .slider-nav .prev').click(function(){ 
			$('.testimonial-slider').slick('slickPrev');
		} );
		
		$('.testimonials .slider-nav .next').click(function(e){
			e.preventDefault(); 
			$('.testimonial-slider').slick('slickNext');
		} );

	}

});