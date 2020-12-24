<?php 
/**
 * Template Name: About Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
			    			    
			    <section class="banner">
				    
				    <div class="grid-container fluid">
				    
					    <div class="grid-x grid-padding-x">
					
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
			    
			    <section class="alternating-rows">
				    
				    <div class="grid-container fluid">	
					    					    
					    <?php if( have_rows('alternating_rows') ):?>
					    	<?php while ( have_rows('alternating_rows') ) : the_row();?>	
					    	
					    	<div class="single-row grid-x grid-padding-x layout-<?php the_field('layout');?>">
					    
						    <?php if( have_rows('single_row') ):?>
						    	<?php while ( have_rows('single_row') ) : the_row();?>	
						    	
						    		<div class="img-wrap cell small-12 medium-6">

										<?php 
										$image = get_sub_field('image');
										if( !empty( $image ) ): ?>
										    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
										<?php endif; ?>							    		
							    		
						    		</div>
						    
									<div class="copy-wrap cell small-12 medium-6">
										<h2><?php the_sub_field('heading');?></h2>
										<div class="copy-wrap"><?php the_sub_field('copy');?></div>
										<?php 
										$link = get_field('link');
										if( $link ): 
										    $link_url = $link['url'];
										    $link_title = $link['title'];
										    $link_target = $link['target'] ? $link['target'] : '_self';
										    ?>
										    <a class="button sm" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
										<?php endif; ?>
									</div>
						    
						    	<?php endwhile;?>
						    <?php endif;?>
					    
					    	</div>
					    
					    	<?php endwhile;?>
					    <?php endif;?>
						    
				    </div>
			    </section>					
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>