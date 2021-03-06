jQuery( document ).ready(function($) {

	// $('body').hide();
	
	var _app = window._app || {};
	
	var Munchkin; // fix for gravity forms marketo extension.
	
	var ajaxurl = "/wp-admin/admin-ajax.php";
	
	_app.emptyParentLinks = function() {
			
		$('a[href="#"]').click(function(e) {
		    e.preventDefault ? e.preventDefault() : e.returnValue = false;
		});	
		
	};
	
	_app.smoothState = function() {
	   var options = {
	            prefetch: true,
	            cacheLength: 2,
	            blacklist: ".blacklist",
	            onStart: {
	                duration: 10, // Duration of our animation 2500
	                render: function($container) {
	                    // Add your CSS animation reversing class

	                    // Restart your animation
						console.log('onstart');
	                    smoothState.restartCSSAnimations();
						
	                }
	            },
	            onReady: {
	                duration: 0,
	                render: function($container, $newContent) {
		                		                
	                    // Remove your CSS animation reversing class

	                    // Inject the new content
						console.log('onready');
	                    $container.html($newContent);
	                }  
	             
	            },
	            onAfter: function() { //Call Back Functions after page load
	                
	                $(document).foundation();
		   			$(function() {
						_app.init();
						$(".preloader").fadeOut(0);
						$('.off-canvas-content').css('opacity', '1');
					});	        
					
					$('.slick-slider').each(function(index, el) {
						if ($.isFunction($.fn.slick)) {
							$(this).slick('unslick');
						}
					});   

					console.log("done");
  	            
	            }
	        },
		smoothState = $('#smoothstate-container').smoothState(options).data('smoothState');
		
	}
	

	_app.barba = function() {
		
	// progress animation for mobile devices
		var barba_progress = $('.barba-progress');
		var barba_progressing = gsap.timeline({
			paused: true
		});
		barba_progressing
			.set(barba_progress, {
				autoAlpha: 1,
				width: 0
			}, 0)
			.fromTo(barba_progress, 2, {
				width: 0,
				ease: Power1.easeOut
			}, {
				width: '100%',
				ease: Power1.easeOut
			}, 0)
			.to(barba_progress, 0.5, {
				autoAlpha: 0,
				ease: Power1.easeOut
			}, '-=0.25');
		barba_progressing.eventCallback("onComplete", function() {
			barba_progressing.pause().time(0)
		});

/* 		barba.use(barbaPrefetch); */ // prefetch plugin
		//barba.use(barbaCss); // css plugin for css based transitions

		// Global hook for before (link clicked)
		barba.hooks.before((data) => {

			// check if page should not be loaded via barba
			if ($(data.next.container).is('#no-barba')) {
				barba.force(data.next.url.href);
			}

			// close any takeovers open
			$(document).trigger('close-takeover');

			// close any reveals
			if ($('.reveal-overlay .reveal').length > 0) {
				$('.reveal-overlay .reveal').foundation('close');
			}

			// destroy foundation sticky elements
			if ($('.sticky').length > 0) {
				$('.sticky').foundation('_destroy');
			}

			// add classes here for a css transition
			$('.body').addClass('barba-transition');

			// start progress animation when barba link is clicked
			if (Modernizr.touch || $(window).width() <= 1024) {
				barba_progressing.timeScale(1).play(0);
			}

		});

		// Global hook for enter (new page ready)
		barba.hooks.enter(() => {
			
			ajaxloadmore.start($('.ajax-load-more-wrap'));
						
			// scroll to top
			window.scrollTo(0, 0);

			// remove all reveal containers from footer
			$('.reveal-overlay').remove();
			$('.reveal.without-overlay').remove();

		});
		
		


		barba.hooks.afterLeave((data) => {
			
		  // Set <body> classes for "next" page
		  var nextHtml = data.next.html;
		  var response = nextHtml.replace(/(<\/?)body( .+?)?>/gi, '$1notbody$2>', nextHtml)
		  var bodyClasses = $(response).filter('notbody').attr('class')
		  $("body").attr("class", bodyClasses);
		
				var alm_target = document.querySelector('.ajax-load-more-wrap');
				if (alm_target && alm_target !== undefined) {
					window.almInit(alm_target);
				}	
				
				
		});
		
		
		
		

		// Global hook for after (transition complete)
		barba.hooks.after(() => {
						
			$(document).foundation();

			$('a#all-podcasts-label').addClass('initial');
						
			// GTM state change
			if (typeof dataLayer !== 'undefined') {
				dataLayer.push({
					'event' : 'barbaStateChange',
					'pathname': location.pathname,
					'title' : document.title
				});
			}			

			var container = document.querySelector(".barba-container");

			// kill all slick sliders
			$('.slick-slider').each(function(index, el) {
				if ($.isFunction($.fn.slick)) {
					$(this).slick('unslick');
				}
			});
			

			// eval all script in container
			// used mostly for gravity forms
			var js = container.querySelectorAll('script:not([type="text/template"])');
			if (js != null) {
				js.forEach(function(jsItem) {
					eval(jsItem.innerHTML);
				});
			}
			


			// remove classes here for a css transition
			$('.body').removeClass('barba-transition');

			// copy over body classes
/*
			var classes = $('.body').data('classes');
			console.log(classes);
			if (classes != undefined && classes.length >= 4) {
				$('.body').attr('class', classes);
			}
*/

			// update adminbar edit link
/*
			if ($('#wpadminbar').length > 0) {
				var edit = $('#wpadminbar #wp-admin-bar-edit');
				if ($('.body').data('edit-href').length > 0) {
					edit.show();
					edit.find('a').text($('.body').data('edit-label'));
					edit.find('a').attr('href', $('.body').data('edit-href'));
				} else {
					edit.hide();
				}
			}
*/

			// re-assign current-menu-item
			var elements_outside_barbawrapper = $('.off-canvas-wrapper').children();
			
			var newURL = window.location.href;
			
			elements_outside_barbawrapper.find('.menu a').each(function(index, el) {
				if (typeof $(this).attr('href') !== "undefined") {
										
					if ($(this).attr("href") == window.location.pathname || $(this).attr("href") == window.location) {
						if ($(this).parent('li')) {
							$(this).parents('li').addClass('current-menu-item active');
						} else {
							$(this).addClass('current-menu-item active');
						}
					} else {
						$(this).removeClass('current-menu-item active');
						$(this).parents('li').removeClass('current-menu-item active');
					}
					
				}
				
								
			});
			

			// load alm when not loaded from barba page transistion
			if ($(".ajax-load-more-wrap").length) {
				// $(".ajax-load-more-wrap[data-alm-id='']").ajaxloadmore(); // ver 4.x

				// updated to work with ver 5.x
				var alm_target = document.querySelector('.ajax-load-more-wrap');
				if (alm_target && alm_target !== undefined) {
					window.almInit(alm_target);
				}
			}
			
			
			// re-initialize functions after barba ajax page change
			$(function() {
				_app.init();
			});

		});

		barba.init({
			//debug: true,
			prevent: (el) => {
				// ignore pdf links
				if (/.pdf/.test(el.href.toLowerCase())) {
					return true;
				}

				// ignore links with these classes
				// ab-item is for wp admin toolbar links
				var ignoreClasses = ['no-barba', 'ab-item', 'slick-arrow', 'toggle-takeover'];
				for (var i = 0; i < ignoreClasses.length; i++) {
					if (el.el.classList.contains(ignoreClasses[i])) {
						return true;
					}
				}

				return false;
			},
			transitions: [{
					name: 'fade-transition',
					leave(data) {
						return gsap.to(data.current.container, {
							opacity: 0,
							duration: .100
						});
					},
					enter(data) {
						return gsap.from(data.next.container, {
							opacity: 0,
							duration: .150
						});
					}
				},
				/*{
					name: 'overlay-transition',
					enter(data) {
						let tl = gsap.timeline();
						tl
							.from(data.next.container, {
								opacity: 0,
								duration: .100
							})
							.to(data.current.container, {
								opacity: 0,
								duration: .400
							})
						;
						return tl;
					}
				}*/
			]
		});
		
	}
		
	_app.ajaxloadmore = function() {

		// Ajax Lod More Plugin filtering		
		var alm_is_animating; // we need to make sure call are not interrupted by animations

		/*
		 * Callback function sent from core Ajax Load More
		 */
		window.almComplete = function(alm) {
			alm_is_animating = false; // clear animating flag

			// re init foundation for any element in the grid
			$(document).foundation();
		};

		window.almEmpty = function(alm) {
			alm_is_animating = false; // clear animating flag
		}

	};

	
	// 	Preloader
	_app.preloader = function() {
		if ( $('.body').hasClass('home') ){
	
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
					y: '0%', duration: 5, delay: 0, ease: 'expo.out'
			  	});	
		
				gsap.to($preloaderLine, {
					y: '0%', duration: 5, delay: 0, ease: 'expo.out'
			  	});	
		
/*
				$(".preloader").addClass('loaded');	
		
			  	setTimeout(function(){ 
					$(".preloader").addClass('loaded');	
				}, 2000);
*/
		
			  	setTimeout(function(){ 
				  	
					$("body").css('overflow', 'visible');	
					
					$(".preloader").fadeOut(700);
					
				}, 6000);
				
			});
			
		}
	}



	
	// 	Desktop Menu
	_app.desktop_menu = function() {
		$('.top-bar .top-bar-right ul#main-nav li.is-dropdown-submenu-parent').removeClass('opens-left');
		$('.top-bar .top-bar-right ul#main-nav li.is-dropdown-submenu-parent').addClass('opens-right');
	}
	
	
	_app.mobile_menu = function() {
	//	Mobile Menu
		var $navTrigger = $('button.mobile-nav-trigger');
		var $mobileNav = $('.mobile-nav');
		
		// $($navTrigger).click(function(e) {
		// 	$mobileNav.fadeToggle(300);
		// 	$navTrigger.toggleClass('open');
		// });
		$($navTrigger).on('click', function (e) {
			e.preventDefault();
			if ($navTrigger.hasClass('open')) {
				$navTrigger.removeClass('open');
				$mobileNav.fadeOut(300);
			} else {
				$navTrigger.addClass('open');
				$mobileNav.fadeIn(300);
			}
		});
	}
		
	_app.hero_drawers = function() {
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
	}
	
	
	_app.improvement_slider = function() {
	// 	Home Page Improvement Slider
		if ($('.body').hasClass('home')) {
			
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

			$('.toggle-content-slider').children('.toggle-content').hide();
			$('.toggle-content-slider').children('.toggle-content:first-child').show();
			
			$('.toggle-nav-wrap button[data-slide]').click(function(e) {
				e.preventDefault();
				
				$(this).addClass('active');
				$(this).siblings('button').removeClass('active');
				
				var slideno = $(this).data('slide');
				$('.toggle-content-slider').slick('slickGoTo', slideno - 1);
			});

/*
			$('.toggle-nav-wrap button[data-slide]').on('click', function(e){
				e.preventDefault();
				$(this).addClass('active');
				$(this).siblings('button').removeClass('active');
				var target = $(this).attr('data-slide');
				$('.toggle-content').hide();
				$('.toggle-content:nth-child(' + target + ')').show();
				$('.bg').removeClass('active');
				$('.bg[data-slide="' + target + '"]').addClass('active');
			});
*/
				
		}
	}
	
// 	Home Page Accordion
	if($('.home-accordion .accordion').length) {
		
		$('.home-accordion  .accordion-item').first().addClass('open');
		
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

	
	_app.articles_filter = function() {
		// 	Articles Filter
		if ($('.body').hasClass('page-template-articles-page')) {
	
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
	}

	_app.podcast_player = function() {
		if($('.podcast-player-wrap').length) {
			
			var $player = $('.podcast-player-wrap');
			var $playerURL = "https://open.spotify.com/embed/episode/";
			var $close = $('.podcast-player-wrap button');
			
	
			$( 'article.single-podcast button' ).each(function( index ) {
			
				var $this = $(this);
				
				var $playButtonId = $($this).data('episode');
				
				$this.click(function(e) {
					e.preventDefault();				
					$('.podcast-player-wrap iframe').attr('src', $playerURL + $playButtonId);
					$player.addClass('show').fadeIn(300);
				});			
			})
			
			$close.click(function(e) {
				e.preventDefault();
				$player.addClass('show').fadeOut(300);
			});
		
		}
	}
	
	_app.podcast_page_toggle = function() {
		if ($('.body').hasClass('page-template-podcast-page')) {
						
			$('a#all-podcasts-label').addClass('initial');
			
			if ($('a#all-podcasts-label').hasClass('initial') ) {
	
				$('a#all-podcasts-label').on('click', function(e) {
					
					
					
					ajaxloadmore.reset();
					$('a#all-podcasts-label').removeClass('initial');
				});
				
				} else {
					
				
			}
		}
	}
	
	_app.mentorship_slider = function() {
		// 	Mentorship Slider
		if($('.testimonial-slider').length) {
		
	
			$('.testimonial-slider').slick({
				fade: true,
				arrows: false,
				adaptiveHeight: true,
				autoplay: true,
				autoplaySpeed: 7000
			});		
			
			$('.testimonials .slider-nav .prev').click(function(){ 
				$('.testimonial-slider').slick('slickPrev');
			} );
			
			$('.testimonials .slider-nav .next').click(function(e){
				e.preventDefault(); 
				$('.testimonial-slider').slick('slickNext');
			} );

			//Can be added as CSS or in PHP, was having issue adding the attribute via PHP for some reason

/*
			$('.testimonial-slider').children('.single-testimonial').hide();
			$('.testimonial-slider').children('.single-testimonial:first-child').show().addClass('active');

			
			$('.testimonials .slider-nav .prev').click(function(e){ 
				e.preventDefault();
				// $('.testimonial-slider').slick('slickPrev');
				if ($('.single-testimonial.active').prev().hasClass('single-testimonial')) {
					$('.single-testimonial.active').removeClass('active').hide().prev().show().addClass('active');
				} else { // reset
					$('.single-testimonial.active').removeClass('active').hide();
					$('.testimonial-slider').children('.single-testimonial:last-child').show().addClass('active');
				}
			} );
			
			$('.testimonials .slider-nav .next').click(function(e){
				e.preventDefault(); 
				// $('.testimonial-slider').slick('slickNext');
				if ($('.single-testimonial.active').next().hasClass('single-testimonial')) {
					$('.single-testimonial.active').removeClass('active').hide().next().show().addClass('active');
				} else { // reset
					$('.single-testimonial.active').removeClass('active').hide();
					$('.testimonial-slider').children('.single-testimonial:first-child').show().addClass('active');
				}

			} );
			
			setInterval(function () {
		        slider();
		    }, 7000);		
		
			var slider = function () {
				
				if ($('.single-testimonial.active').prev().hasClass('single-testimonial')) {
					$('.single-testimonial.active').removeClass('active').hide().prev().show().addClass('active');
				} else { // reset
					$('.single-testimonial.active').removeClass('active').hide();
					$('.testimonial-slider').children('.single-testimonial:last-child').show().addClass('active');
				}
				
			}
*/
	
		}
	}
	
	_app.sermon_slider = function() {
		if($('.sermon-slider').length) {
			
			$('.sermon-slider').slick({
				dots: false,
				arrows: false,
				infinite: true,
				speed: 300,
				slidesToShow: 3,
				slidesToScroll: 3,
				responsive: [
					{
						breakpoint: 1024,
						settings: {
						slidesToShow: 3,
						slidesToScroll: 3,
						infinite: true,
					}
					},
					{
						breakpoint: 992,
						settings: {
						slidesToShow: 2,
						slidesToScroll: 2
					}
					},
					{
						breakpoint: 480,
						settings: {
						slidesToShow: 1,
						slidesToScroll: 1
					}
					}
	
				]
			});	
		
			$('.sermons .slider-nav .prev').click(function(){ 
				$('.sermon-slider').slick('slickPrev');
			} );
			
			$('.sermons .slider-nav .next').click(function(e){
				e.preventDefault(); 
				$('.sermon-slider').slick('slickNext');
			} );
		
/*
		var divs = $(".sermon-slider .box");
		for(var i = 0; i < divs.length; i+=3) {
		  divs.slice(i, i+3).wrapAll("<div class='slide grid-x grid-padding-x'></div>");
		}
		
		var $slide = $('.sermon-slider .slide');
		
		
		var slideCount = $($slide).length;
		var slideWidth = $($slide).width();
		var slideHeight = $($slide).height();
		var sliderUlWidth = slideCount * slideWidth;
		
		$('.sermon-slider').css({ width: slideWidth, height: slideHeight });
	    
	    $('.sermon-slider .slide:last-child').prependTo('.sermon-slider.box-wrap  .slider-track');
	
	    function moveLeft() {

	        $('.sermon-slider.box-wrap .slider-track').animate({
	            left: + slideWidth
	        }, 200, function () {
	            $('.sermon-slider.box-wrap .slide:last-child').prependTo('.sermon-slider.box-wrap .slider-track');
	            $('.sermon-slider.box-wrap  .slider-track').css('left', '');
	        });
	    };
	
	    function moveRight() {
	        $('.sermon-slider.box-wrap .slider-track').animate({
	            left: - slideWidth
	        }, 200, function () {
	            $('.sermon-slider.box-wrap .slide:first-child').appendTo('.sermon-slider.box-wrap .slider-track');
	            $('.sermon-slider.box-wrap .slider-track').css('left', '');
	        });
	    };
	
	    $('a.control_prev').click(function (e) {
		    e.preventDefault();
	        moveLeft();	        
	    });
	
	    $('a.control_next').click(function (e) {
		    e.preventDefault();
	        moveRight();
	    });
*/

		};
	}
	
		
	_app.init = function() {
// 		is_barba = typeof is_barba !== 'undefined' ? is_barba : false;
		_app.emptyParentLinks();
		_app.preloader();
		_app.ajaxloadmore();
		_app.desktop_menu();
		// _app.desktop_menu(); //Called Twice
		_app.mobile_menu();
		_app.hero_drawers();
		_app.improvement_slider(); //Temp
		_app.articles_filter();
		_app.podcast_player();
		_app.podcast_page_toggle();
		_app.mentorship_slider();
		_app.sermon_slider();
// 		_app.barba();
// 		_app.smoothState();
	}


	// initialize functions on load
	$(function() {
		_app.init();
	});

});