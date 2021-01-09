<?php 
/**
 * Template Name: Mentorship Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
			    			    
			    <section class="banner">
				    
				    <div class="columns-banner grid-container fluid offset-content">
				    
					    <div class="heading-wrap grid-x grid-padding-x">
					
							<h1 class="cell small-12"><?php the_field('ph_heading');?></h1>
						
					    </div>
							
						<?php if( have_rows('ph_icon_and_info_columns') ):?>
						<div class="columns-wrap grid-x grid-padding-x">
							<?php while ( have_rows('ph_icon_and_info_columns') ) : the_row();?>	
							
							<?php if( have_rows('single_column') ):?>
								<?php while ( have_rows('single_column') ) : the_row();?>
								
								<div class="single-column cell small-12 medium-4">
									
									<div class="inner">
									
										<div class="icon-wrap">
											<?php 
											$image = get_sub_field('icon');
											if( !empty( $image ) ): ?>
											    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>
										</div>
										
										<h3><?php the_sub_field('heading');?></h3>
										
										<div class="copy-wrap">
											<?php the_sub_field('copy');?>
										</div>
									
									</div>
									
								</div>	
							
								<?php endwhile;?>
							<?php endif;?>
						
							<?php endwhile;?>
						</div>
						<?php endif;?>
						
				    </div>
				
			    </section>	
			    
			    <section class="testimonials">
				    
				    <div class="bg grid-container fluid offset-content left-line" style="background-image: url(<?php the_field('testimonials_background_image');?>)">	
					    
					    <div class="mask"></div>
					    
					    <div class="grid-x grid-padding-x">					    
						    <div class="cell small-12 recent-pods-wrap">
								<div class="inner-padding">
									<div class="quotes">“”</div>
					    					    
									<?php if( have_rows('testimonials') ):?>
									<div class="testimonial-slider">
										<?php while ( have_rows('testimonials') ) : the_row();?>	
									
										<?php if( have_rows('single_testimonial') ):?>
											<?php while ( have_rows('single_testimonial') ) : the_row();?>	
											
											<div class="single-testimonial">
												
												<h2><?php the_sub_field('large_text');?></h2>
												<h3><?php the_sub_field('small_text');?></h3>
												
												<div class="author"><?php the_sub_field('quote_author_name');?><br><?php the_sub_field('quote_author_credentials');?></div>
												
											</div>
											
											<?php endwhile;?>
										<?php endif;?>
									
										<?php endwhile;?>
									</div>
									<?php endif;?>
									
									<div class="slider-nav grid-x grid-padding-x align-right">
										<button class="prev no-style cell-shrink">
											<img src="/wp-content/themes/macarthur/assets/images/arrow-slider-left.svg"/>
										</button>
										<button class="next no-style cell-shrink">
											<img src="/wp-content/themes/macarthur/assets/images/arrow-slider-right.svg"/>
										</button>
									</div>
								</div>  						    
						    </div>
					    </div>
				    </div>
				    
					<div class="bottom-line"></div>
				    
			    </section>	
			    
			    <section class="form">
				    <div class="bg grid-container fluid offset-content left-line">	
					    					    
					    <div class="grid-x grid-padding-x">					    
						    <div class="cell small-12">
								<div class="inner-padding">
									<div class="grid-x grid-padding-x">	
										
										<div class="left cell small-12 medium-6 large-5">
											<h2><?php the_field('form_heading');?></h2>
										</div>

										<div class="left cell small-12 medium-6 large-7">
											<?php 
												$formNum = get_field('form_id');
												gravity_form( $formNum, false, false, false, '', true );
											?>
										</div>
										
									
									</div>
								</div>
						    </div>
					    </div>				    
			    </section>				
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>