<?php 
/**
 * Template Name: Podcast Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
			    
			    <section class="banner">
				    
				    <div class="grid-container fluid">
				    
					    <div class="inner grid-x grid-padding-x">
						    
						    <div class="left cell small-12 medium-6">
							    <?php 
								$image = get_field('pb_image');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
						    </div>
					
							<div class="right cell small-12 medium-6">
					
								<h1><?php the_field('pb_title');?></h1>
								<h3><?php the_field('pb_intro_text');?></h3>
								
								<div class="spotify-apple-buttons-wrap">
									<div class="grid-x grid-padding-x">
									
										<div class="cell shrink"><a href="<?php the_field('pb_spotify_url');?>">
											<?php 
											$image = get_field('pb_spotify_link_image');
											if( !empty( $image ) ): ?>
											    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>
										</a></div>
										<div class="cell shrink"><a href="<?php the_field('pb_apple_url');?>">
											<?php 
											$image = get_field('pb_apple_link_image');
											if( !empty( $image ) ): ?>
											    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>											
										</a></div>
									
									</div>
								</div>
								
								<div class="content-toggle-buttons-wrap">
									
									<button id="about" class="no-style active">About</button>
									<button id="episodes" class="no-style">Episodes</button>
																		
								</div>
							
							</div>
						
					    </div>
												
				    </div>
				
			    </section>	

				<div id="dynamic-height-wrapper">
			    
				    <section id="about-podcasts" class="about-podcasts toggle-section" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
					    <div class="grid-container fluid offset-content left-line">
						    <div class="grid-x grid-padding-x">					    
							    <div class="cell small-12 recent-pods-wrap">
								    <div class="inner-padding">
										<h2>Latest Episodes</h2>
										
										<div class="box-wrap sm grid-x grid-padding-x">
										
											<?php 			
												
											$cat_term = get_field('podcast_name');   
											
											$cat = $cat_term->slug;
																								
										    $args = array(  
										        'post_type' => 'podcast_post',
										        'post_status' => 'publish',
										        'posts_per_page' => 3, 
										        'order' => 'ASC',
										        'cat' => $cat,
										    );
										
										    $loop = new WP_Query( $args ); 
										        
										    while ( $loop->have_posts() ) : $loop->the_post();?>
										    
											<article class="single-podcast box sm cell small-12 medium-6 tablet-4">
												
												<div class="inner" data-equalizer-watch>
													
													<div class="top">
											    
														<div class="date small-caps">
															<?php 
															$format_in = 'd/m/Y'; // the format your value is saved in (set in the field options)
															$format_out = 'M, d Y'; // the format you want to end up with
															
															$date = DateTime::createFromFormat($format_in, get_field('date'));
															
															echo $date->format( $format_out );
																
															?>
														</div>	
													
														<h3>
															<?php the_title();?>
														</h3>
														
														<div class="excerpt-wrap">
															<?php the_field('description');?>
														</div>
													
													</div>
															
													<button class="button no-style" data-episode="<?php the_field('episode_id');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pod-play.svg"/><span class="small-caps underline">Listen Now</span></button>
													
													<div class="bottom-line"></div>
												
												</div>
											
											</article>
										
											<?php
										    endwhile;
										
										    wp_reset_postdata(); 
										    
										    ?>
										</div>
										
										<div class="bottom-line"></div>
										
								    </div>
							    </div>
							    
						    </div>
					    </div>
					    
					    <div class="copy-wrap">
					    	<div class="grid-container fluid offset-content">
						    	<div class="grid-x grid-padding-x">
							    	<div class="cell small-12">
								    	<div class="inner-padding">
									    	<div class="grid-container">
										    	<h3><?php the_field('about_heading');?></h3>
												<p><?php the_field('about_copy');?></p>
									    	</div>
								    	</div>
							    	</div>
						    	</div>
					    	</div>
				    	</div>
				    
				    </section>
				    
				    <section id="all-podcasts" class="all-podcasts toggle-section" style="display: none;">
					    <div class="grid-container fluid offset-content left-line">
						    <div class="grid-x grid-padding-x">
								<div class="cell small-12">
									<div class="inner-padding">
											
										<h2>All Episodes</h2>
<!--
										<?php 			
									    $args = array(  
									        'post_type' => 'podcast_post',
									        'post_status' => 'publish',
									        'posts_per_page' => -1, 
									        'order' => 'ASC',
									        'cat' => 'home',
									    );
									
									    $loop = new WP_Query( $args ); 
									        
									    while ( $loop->have_posts() ) : $loop->the_post();?>
									    
									    <article class="single-podcast">
										    
											<h3><?php the_title();?> </h3>
											
											<button class="button no-style" data-episode="<?php the_field('episode_id');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pod-play.svg"/><span>Listen Now</span></button>
									
									    </article>
									
										<?php
									    endwhile;
									
									    wp_reset_postdata(); 
									    
									    ?>
-->
									    
					    					<?php echo do_shortcode('[ajax_load_more scroll="false" button_label="Load More" container_type="div" transition_container_classes="box-wrap" post_type="podcast_post" taxonomy="podcast_name" taxonomy_terms="' . $cat . '" taxonomy_operator="IN" order="DESC" transition_container="true" posts_per_page="5" cache="false"]'); ?>
																	
									
									</div>
								</div>
						    </div>
					    </div>
				    </section>
				    
				</div>
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
	
	<div class="podcast-player-wrap" style="display: none;">
	
		<iframe data-target="persistent-player.spotifyEmbed" src="" width="100%" height="152" frameborder="0" allowtransparency="true" allow="encrypted-media" style="height: 152px;"></iframe>	
		
	</div>

<?php get_footer(); ?>