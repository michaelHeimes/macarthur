<?php 
/**
 * Template Name: Sermons Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
			    			    
			    <section class="banner">
				    
				    <div class="grid-container fluid">
				    
					    <div class="inner grid-x grid-padding-x align-middle">
						    
						    <div class="left cell small-12 medium-6">
							    <?php 
								$image = get_field('ph_image');
								if( !empty( $image ) ): ?>
								    <img class="opacity-img" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
						    </div>
					
							<div class="right cell small-12 medium-6">
					
								<h1><?php the_field('ph_heading');?></h1>
								
								<div class="copy-wrap">
									
									<div class="author-date class small-caps">
										<span><?php the_field('ph_author');?></span>
										<span>|</span>
										<span>
											<?php 
											$format_in = 'd/m/Y'; // the format your value is saved in (set in the field options)
											$format_out = 'M, d Y'; // the format you want to end up with
											
											$date = DateTime::createFromFormat($format_in, get_field('ph_date'));
											
											echo $date->format( $format_out );
												
											?>										
										</span>
									</div>
									
									<div class="description-wrap">
										<?php the_field('ph_description');?>
									</div>
									
									<div class="links-wrap">
										
										<?php 
										$link = get_field('ph_button_link');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
										    <a class="button lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
										
										<?php 
										$link = get_field('ph_view_more_link');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow"/></a>
										<?php endif; ?>										
										
									</div>
									
								</div>
							
							</div>
						
					    </div>
												
				    </div>
				
			    </section>	
					
				<?php if( have_rows('sermons_rows') ):?>
				<section class="sermons">
					<div class="grid-container fluid offset-content left-line">
						<div class="inner-padding grid-x grid-padding-x">
						
						<?php while ( have_rows('sermons_rows') ) : the_row();?>	
						
						<?php if( have_rows('single_row') ):?>
							<?php while ( have_rows('single_row') ) : the_row();?>	
							
							
							<div class="single-sermon-row cell small-12">
								<h2><?php the_sub_field('heading');?></h2>
								
								<h3 class="sub-heading"><?php the_sub_field('sub-heading');?></h3>

								<?php $cards = count(get_sub_field('sermons'));?>							
							
								<?php if( $cards <= 3 ):?>

									<?php if( have_rows('sermons') ):?>
									<div class="box-wrap sm grid-x grid-padding-x" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
										<?php while ( have_rows('sermons') ) : the_row();?>	
										
										<?php if( have_rows('single_sermon') ):?>
											<?php while ( have_rows('single_sermon') ) : the_row();?>	
										
												<?php get_template_part('parts/loop', 'resource-box');?>
											
											<?php endwhile;?>
										<?php endif;?>
									
										<?php endwhile;?>
									</div>
									<?php endif;?>
									
								<?php else:?>
								
									<?php if( have_rows('sermons') ):?>
									<div class="box-wrap sermon-slider sm" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
																				
										
										<?php while ( have_rows('sermons') ) : the_row();?>	
										
										<?php if( have_rows('single_sermon') ):?>
											<?php while ( have_rows('single_sermon') ) : the_row();?>	
										
												<?php get_template_part('parts/loop', 'resource-box');?>
											
											<?php endwhile;?>
										<?php endif;?>
									
										<?php endwhile;?>
									
										
									</div>
									
									<div class="slider-nav grid-x grid-padding-x align-right">
										<div class="buttons-wrap cell">
											<button class="prev no-style cell-shrink" value="slide_left"  aria-label="Slide Left">
												<img src="/wp-content/themes/macarthur/assets/images/arrow-slider-left.svg" alt="arrow left"/>
											</button>
											<button class="next no-style cell-shrink" value="slide_right" aria-label="Slide Right">
												<img src="/wp-content/themes/macarthur/assets/images/arrow-slider-right.svg" alt="arrow right"/>
											</button>
										</div>
									</div>
									
									<?php endif;?>
									
								<?php endif;?>
						
							</div>
						
							<?php endwhile;?>
						<?php endif;?>
					
						<?php endwhile;?>
						
						</div>
					</div>
				</section>
				<?php endif;?>
	
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<?php get_footer(); ?>