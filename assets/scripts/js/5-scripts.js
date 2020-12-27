jQuery( document ).ready(function($) {
		
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
			
			$tabWidthConst = -widestSpan.outerWidth();
						
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
			var $button1Width = $('button#toggle-nav-1').width();
			
			$('.toggle-content-wrap .line-wrap').css('left', $button1Width * .5);
		
		});
		
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
	if($('.accordion.last-active').length) {
		$('.accordion.last-active').foundation('toggle', $('.accordion.last-active >div:last-child a'));
		$('.accordion.last-active >div:last-child a').next('.accordion-content').css('display', 'block');
	}

	
// 	Podcast Page Toggle
	if ($('body').hasClass('page-template-podcast-page')) {
		
		var $aboutSection = $('section#about-podcasts');
		var $podcastsSection = $('section#all-podcasts');
		
		function setAboutHeight() {
			$aboutHeight = $($aboutSection).innerHeight();
		};
		setAboutHeight();
		
		$(window).resize(function() {
			setAboutHeight();
		});
		
		function setPodcastsHeight() {
			window.almComplete = function(alm){
				$podcastsHeight = $($podcastsSection ).innerHeight();
			}
		};
		setPodcastsHeight();
		
		$(window).resize(function() {
			setPodcastsHeight();
		});
		
		$('#dynamic-height-wrapper').css('height', $aboutHeight);

		$(document).on('click', 'button#about', function(e) {
			
			if ( $(this).hasClass('active') ) {

			} else {
				$('#dynamic-height-wrapper').css('height', $aboutHeight);
				$($podcastsSection).fadeOut(300);
				$($aboutSection).fadeIn(300);
			};
			
		});
		
		$(document).on('click', 'button#episodes', function(e) {
			
			if ( $(this).hasClass('active') ) {

			} else {
				$('#dynamic-height-wrapper').css('height', $podcastsHeight);
				$($aboutSection).fadeOut(300);
				$($podcastsSection).fadeIn(300);

			};
			
		});
		
		$(document).on('click', '.content-toggle-buttons-wrap button', function(e) {
			
			if ( $(this).hasClass('active') ) {

			} else {
				$(this).siblings().removeClass('active');
				$(this).addClass('active');
			};
			
		});
		
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


});