<?php
/**
 * The template for displaying the footer. 
 *
 * Comtains closing divs for header.php.
 *
 * For more info: https://developer.wordpress.org/themes/basics/template-files/#template-partials
 */			
 ?>
					
				<footer class="footer" role="contentinfo">
					
					<div class="grid-container fluid">
					
						<div class="inner-footer grid-x grid-padding-x align-justify">
							
							<div class="left cell small-12 medium-6">
								<div class="grid-x grid-padding-x align-middle">
									
									<?php 
									$image = get_field('footer_logo', 'options');
									if( !empty( $image ) ): ?>
									<div class="cell shrink">
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									</div>
									<?php endif; ?>
									
									<div class="footer-copy cell auto"><?php the_field('footer_copy', 'options');?></div>
								
								</div>
								
								<div class="source-org copyright show-for-medium"><span class="small-caps">Copyright &copy; <?php echo date('Y'); ?> MacArthur Center. All Rights Reserved.</span></div>
		    				</div>
							
							<div class="right cell small-12 medium-shrink">
								
								<div class="email-wrap"><a href="<?php the_field('email_address', 'options');?>"><?php the_field('email_address', 'options');?></a></div>
								<div class="phone-wrap"><a href="<?php the_field('phone_number', 'options');?>"><?php the_field('phone_number', 'options');?></a></div>
								<nav class="social-wrap">
									<div><a href="<?php the_field('facebook_url', 'options');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/facebook-icon.svg"/></a></div>
									<div><a href="<?php the_field('youtube_url', 'options');?>" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/youtube-icon.svg"/></a></div>
								</nav>
							</div>
							
							<div class="source-org copyright hide-for-medium"><span class="small-caps">Copyright &copy; <?php echo date('Y'); ?> MacArthur Center. All Rights Reserved.</span></div>
						
						</div> <!-- end #inner-footer -->
					
					</div>
				
				</footer> <!-- end .footer -->
			
			</div>  <!-- end .off-canvas-content -->
					
		</div> <!-- end .off-canvas-wrapper -->
				
		<?php wp_footer(); ?>
		
	</body>
	
</html> <!-- end page -->