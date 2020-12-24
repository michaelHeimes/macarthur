<?php 
/**
 * Template Name: Home Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
			
		<div class="inner-content">
	
		    <main class="main" role="main">
				
				<section class="banner" style="background-image: url(<?php the_field('ph_background_image');?>)">
					
					<div class="inner grid-container fluid">
						
						<div class="heading-wrap">
							<?php if( $small_heading = get_field('ph_small_heading') ):?>
							<h1><?php echo $small_heading;?></h2>
							<?php endif;?>
							
							<?php if( $large_heading = get_field('ph_large_heading') ):?>
							<h2><?php echo $large_heading;?></h1>
							<?php endif;?>
						</div>
												
					</div>
					
					<div class="mask"></div>
					
					<nav id="bh-drawer-nav" class="bh-drawer-nav">
						
						<?php if( have_rows('ph_tab_1') ):?>
						<div class="drawer">
							<?php while ( have_rows('ph_tab_1') ) : the_row();?>	
							<div class="tab small-caps"><?php the_sub_field('tab_label');?></div>
							
							<div class="content">
								<div class="inner">
									
									<h3><?php the_sub_field('link_heading');?></h3>
									
									<div class="links-wrap">
										
										<?php 
										$link = get_sub_field('link_1');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>

										<?php 
										$link = get_sub_field('link_2');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>
										
									</div>
									
								</div>
							</div>
							<?php endwhile;?>
						</div>
						<?php endif;?>

						<?php if( have_rows('ph_tab_2') ):?>
						<div class="drawer">
							<?php while ( have_rows('ph_tab_2') ) : the_row();?>	
							<div class="tab small-caps"><?php the_sub_field('tab_label');?></div>
							
							<div class="content">
								<div class="inner">
									
									<h3><?php the_sub_field('link_heading');?></h3>
									
									<div class="links-wrap">
										
										<?php 
										$link = get_sub_field('link_1');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>

										<?php 
										$link = get_sub_field('link_2');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>
										
									</div>
									
								</div>
							</div>
							<?php endwhile;?>
						</div>
						<?php endif;?>
						
						<?php if( have_rows('ph_tab_3') ):?>
						<div class="drawer">
							<?php while ( have_rows('ph_tab_3') ) : the_row();?>	
							<div class="tab small-caps"><?php the_sub_field('tab_label');?></div>
							
							<div class="content">
								<div class="inner">
									
									<h3><?php the_sub_field('link_heading');?></h3>
									
									<div class="links-wrap">
										
										<?php 
										$link = get_sub_field('link_1');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>

										<?php 
										$link = get_sub_field('link_2');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
											<a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
										<?php endif; ?>
										
									</div>
									
								</div>
							</div>
							<?php endwhile;?>
						</div>
						<?php endif;?>
													
					</nav>
					
				</section><!-- banner -->
						
				
				<section class="improvement">
					
					<div class="bg-wrap grid-container fluid">
						<div class="bg" style="background-image: url(<?php the_field('');?>)"></div>
					</div>
					
					<div class="inner lined">
					
						<div class="grid-container">
							<div class="grid-x grid-padding-x">
								
								<div class="cell small-12">
									<div class="content-wrap">
									
										<div class="heading-wrap">
											<h2><?php the_field('imp_heading');?></h2>
										</div>
										
										<div class="toggle-content-wrap">
											
											<div class="grid-x grid-padding-x">
												
												<div class="left cell small-4">
													
												</div>
												
												<div class="right cell small-8">
													
													<div id="toggle-1" class="toggle-content">
														
														<?php if( have_rows('imp_slide_1') ):?>
															<?php while ( have_rows('imp_slide_1') ) : the_row();?>	
														
															<div class="icon-wrap">
															
															<?php 
															$image = get_sub_field('icon');
															if( !empty( $image ) ): ?>
															    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
															<?php endif; ?>
															
															</div>
	
															<div class="text-wrap">
																<h3><?php the_sub_field('heading');?></h3>
																<?php the_sub_field('copy');?>
															</div>
														
															<?php endwhile;?>
														<?php endif;?>
														
													</div>
													
												</div>
												
											</div>
											
										</div>
										
										<div class="toggle-nav-wrap">
											
											<?php if( have_rows('imp_slide_1') ):?>
											<button id="toggle-nav-1" class="third no-style">
												<?php while ( have_rows('imp_slide_1') ) : the_row();?>																		
												<?php the_sub_field('button_label');?>
												
												<?php endwhile;?>
											</button>
											<?php endif;?>							
	
											<div class="third and">and</div>
	
											<?php if( have_rows('imp_slide_2') ):?>
											<button id="toggle-nav-2" class="third no-style">
												<?php while ( have_rows('imp_slide_2') ) : the_row();?>																		
												<?php the_sub_field('button_label');?>
												
												<?php endwhile;?>
											</button>
											<?php endif;?>	
											
										</div>
									
									</div>
								</div>
							
							</div>
						</div>
						
					</div>
					
				</section>
				
						
				<section class="symposium-accordion">
					<div class="bg-wrap grid-container fluid">
					
						<div class="inner lined">
							
							<?php if( have_rows('accordion_sections') ):?>
								<div class="accordion last-active" data-accordion>
								<?php while ( have_rows('accordion_sections') ) : the_row();?>	
								
									<?php $num = get_row_index();?>
								
									<?php if( have_rows('single_section') ):?>
										<?php while ( have_rows('single_section') ) : the_row();?>	

										<div class="accordion-item" data-accordion-item>
											<a href="#" class="accordion-title">
												<span>No. 0<?php echo $num;?></span>
											</a>
				
											<div class="accordion-content" data-tab-content>
												
												<div class="inner">
												
													<h2><?php the_sub_field('heading');?></h2>
													
													<p><?php the_sub_field('text');?></p>
													
													<?php 
													$link = get_sub_field('link_button');
													if( $link ): 
													    $link_url = $link['url'];
													    $link_title = $link['title'];
													    $link_target = $link['target'] ? $link['target'] : '_self';
													    ?>
													    <a class="button lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
													<?php endif; ?>
											
												</div>
											
											</div>
											
										</div>
										<?php endwhile;?>
									<?php endif;?>

								<?php endwhile;?>
								</div>
							<?php endif;?>
													
						</div>
					
					</div>
				</section>
				
				
				<section class="alternating-rows">
					<div class="bg-wrap grid-container fluid">
						<div class="inner grid-x grid-padding-x">
							
							<?php if( have_rows('alt_row_1') ):?>
								<?php while ( have_rows('alt_row_1') ) : the_row();?>	
								
								<div class="left cell small-12 medium-6">
									<h2><?php the_sub_field('heading');?></h2>
									<?php 
									$link = get_sub_field('button_link');
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    ?>
									    <a class="button lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>

								</div>
	
								<div class="right cell small-12 medium-6">
									
									<div class="img-wrap">
										
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
									
									</div>
									
								</div>
							
								<?php endwhile;?>
							<?php endif;?>

							<?php if( have_rows('alt_row_2') ):?>
								<?php while ( have_rows('alt_row_2') ) : the_row();?>	
								
								<div class="left cell small-12 medium-6">
									<h2><?php the_sub_field('heading');?></h2>
									<?php 
									$link = get_sub_field('button_link');
									if( $link ): 
									    $link_url = $link['url'];
									    $link_title = $link['title'];
									    $link_target = $link['target'] ? $link['target'] : '_self';
									    ?>
									    <a class="button lg" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
									<?php endif; ?>

								</div>
	
								<div class="right cell small-12 medium-6">
									
									<div class="img-wrap">
										
									<?php 
									$image = get_sub_field('image');
									if( !empty( $image ) ): ?>
									    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
									<?php endif; ?>
									
									</div>
									
								</div>
							
								<?php endwhile;?>
							<?php endif;?>						

						
						</div>
					</div>
				</section>
			    					
			</main> <!-- end #main -->
		    		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>