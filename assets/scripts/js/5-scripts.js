jQuery( document ).ready(function($) {
	
	if ( $('nav#bh-drawer-nav').length ) {
		
		var maxWidth = 0;
		var widestTab = null;
		var $element;
		
		$("nav#bh-drawer-nav .tab").each(function(){
			$element = $(this);
			
			if($element.width() > maxWidth){
				maxWidth = $element.width();
				widestSpan = $element; 
			}
			
			$tabWidthConst = -widestSpan.width();
			
			$('#bh-drawer-nav').css("transform", "translate(" + $tabWidthConst + "px)", "0px");
			
			
		});
		
		
		$('nav#bh-drawer-nav .drawer').each(function( i ) {

			var $this = $(this);
			var $tab = $this.find('.tab');
			var $drawerContent = $this.find('.content');
			var $drawerContentWidth = $($drawerContent).width();
			
// 			$this.css("transform", "translate(" + $drawerContentWidth + "px)", "0px");
			

			
				$this.on('click', $tab, function() {
					
					if ( $this.hasClass('clicked') ) {
						$this.css('transform','translate(0px,0px)');
						$this.removeClass('clicked');

					} else {
						
						$this.css("transform", "translate(" + -$drawerContentWidth + "px)", "0px");
						$this.addClass('clicked');
						
					}
					
				});
				
		});
	   
	}
	
	
	
	
	if($('.accordion.last-active').length) {
		$('.accordion.last-active').foundation('toggle', $('.accordion.last-active >div:last-child a'));
		$('.accordion.last-active >div:last-child a').next('.accordion-content').css('display', 'block');
	}


});