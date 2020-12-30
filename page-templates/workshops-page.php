<?php 
/**
 * Template Name: Workshops Page
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content">
	
		    <main class="main" role="main">
			    			    
			    <section class="banner">
				    
				    <div class="grid-container fluid offset-content">
				    
					    <div class="heading-wrap grid-x grid-padding-x">
					
							<h1 class="cell small-12"><?php the_field('heading');?></h1>
						
					    </div>
													
				    </div>
				
			    </section>	
			    

				<?php if( have_rows('workshops') ):?>
				<section class="rows">
					<div class="grid-container fluid offset-content left-line">
						<div class="inner-padding">	
							<?php while ( have_rows('workshops') ) : the_row();?>
		
								<?php if( have_rows('single_workshop') ):?>
									<?php while ( have_rows('single_workshop') ) : the_row();?>	
									
									<div class="single-workshop grid-x grid-padding-x">
										
										<div class="cell small-12">
											<h3><?php the_sub_field('heading');?></h3>
										</div>
										
										<div class="img-wrap cell small-12 medium-6 tablet-5">
											<?php 
											$image = get_sub_field('image');
											if( !empty( $image ) ): ?>
											    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
											<?php endif; ?>
										</div>
										
										<div class="cell small-12 medium-6 tablet-7">
											<div class="copy-wrap">
												<?php the_sub_field('copy');?>
											</div>
											<?php 
											$link = get_sub_field('sign_up_button');
											if( $link ): 
											    $link_url = $link['url'];
											    $link_title = $link['title'];
											    $link_target = $link['target'] ? $link['target'] : '_self';
											    ?>
											<a class="button sm" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><?php echo esc_html( $link_title ); ?></a>
											<?php endif; ?>								
										</div>
										
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