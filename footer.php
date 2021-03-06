<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
			</div>
			
				<footer class="footer" role="contentinfo">
					
					<div class="grid-container fluid">
					
						<div class="inner-footer grid-x grid-padding-x align-justify">
							
							<div class="left cell shrink medium-auto large-6">
								<div class="grid-x grid-padding-x align-middle">
									
									<?php 
									$image = get_field('footer_logo', 'options');
									if( !empty( $image ) ): ?>
									<div class="cell shrink">
									    <img class="footer-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
									<?php endif; ?>
									
									<div class="footer-copy cell auto show-for-medium"><?php the_field('footer_copy', 'options');?></div>
								
								</div>
								
								<div class="source-org copyright cell show-for-medium">
									<span class="small-caps">Copyright &copy; <?php echo date('Y'); ?> MacArthur Center. All Rights Reserved.</span><br>
									<span class="small-caps push-link-wrap"><a href="https://www.push10.com/" target="_blank">Web Design</a> by Push10 <a href="https://www.push10.com/" target="_blank">Branding Agency</a></span>									
								</div>
		    				</div>
							
							<div class="right cell auto medium-4 large-shrink">
								
								<div class="footer-copy hide-for-medium"><?php the_field('footer_copy', 'options');?></div>
								
								<div class="grid-x grid-padding-x">
									
									<div class="contact-wrap cell auto medium-12">
									
									<div class="email-wrap"><a href="mailto:<?php the_field('email_address', 'options');?>"><?php the_field('email_address', 'options');?></a></div>
									<div class="phone-wrap"><a href="tel:<?php the_field('phone_number', 'options');?>"><?php the_field('phone_number', 'options');?></a></div>
									
									</div>
									
									<nav class="social-wrap cell small-12 medium-12">
										<div><a href="<?php the_field('facebook_url', 'options');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.svg" alt="facebook-icon"/></a></div>
										<div><a href="<?php the_field('youtube_url', 'options');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-icon.svg" alt="youtube-icon"/></a></div>
									</nav>
									
								</div>
									
							</div>
							
							<div class="source-org copyright cell hide-for-medium">
								<span class="small-caps">Copyright &copy; <?php echo date('Y'); ?> MacArthur Center. All Rights Reserved.</span><br>
								<span class="small-caps push-link-wrap"><a href="https://www.push10.com/" target="_blank">Web Design</a> by Push10 <a href="https://www.push10.com/" target="_blank">Branding Agency</a></span>
							</div>

						</div> <!-- end #inner-footer -->
						
					</div>
				
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
					
		<?php wp_footer(); ?>
		
			</div> <!-- end .body -->
		
		</div> <!-- end smoothstate -->
		
		<div class="podcast-player-wrap" style="display: none;">
			
<script>	
jQuery( document ).ready(function($) {		
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
});		
</script>
			
			
			<div class="btn-wrap text-right">
				<button type="button" class="no-style small-caps">Close</button>
			</div>
		
			<iframe data-target="persistent-player.spotifyEmbed" src="" width="100%" height="152" frameborder="0" allowtransparency="true" allow="encrypted-media" style="height: 152px;"></iframe>	
			
		</div>
		
	</body>
	
</html> <!-- end page -->