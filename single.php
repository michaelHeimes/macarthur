<?php 
/**
 * The template for displaying all single posts and attachments
 */

get_header(); ?>
			
	<div class="content">
	
		<div class="inner-content ">
	
		    <main class="main" role="main">
			    
			    <section class="banner">
				    <div class="grid-container fluid offset-content">
					    <div class="inner-padding grid-x grid-padding-x">	
							
							<div class="cell small-12">
								<h1><?php the_title();?></h1>	
							</div>
							
							<div class="small-caps cell small-12">
								<?php $categories = get_the_category();
								if ( ! empty( $categories ) ) {
								    echo esc_html( $categories[0]->name );   
								} ?>
							</div>

					    </div>
				    </div>		
			    </section>		

			    <section class="content-area entry-content">
				    <div class="grid-container fluid offset-content left-line">
					    <div class="inner grid-x grid-padding-x">	
						    <div class="cell small-12">
							    <div class="grid-container">
								    <div class="grid-x grid-padding-x">	
									    <div class="cell small-12">							    
											<?php the_field('content');?> 	
									    </div>
								    </div>
							    </div>		    
						    </div>
					    </div>
				    </div>
					<div class="bottom-line"></div>
			    </section>	
			    
			    <?php
				$featured_posts = get_field('related_articles');
				if( $featured_posts ): ?>
			    <section class="resources" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
				    <div class="grid-container fluid offset-content left-line">
					    <div class="heading-wrap inner-padding grid-x grid-padding-x">
							<h2 class="cell small-12"><?php the_field('related_articles_heading');?></h2>
					    </div>
					    
					    <div class="inner-padding box-wrap sm grid-x grid-padding-x">	
						    
						<?php foreach( $featured_posts as $featured_post ): 
					        $permalink = get_permalink( $featured_post->ID );
					        $title = get_the_title( $featured_post->ID );
					        $post_date = get_the_date( 'M j, Y' );
					        $description = get_field( 'short_description', $featured_post->ID );
				        ?>
						    
						    
						    
						<div class="cell box sm small-12 medium-6 tablet-4">
							
							<div class="inner" data-equalizer-watch>
								
								<div class="top">
							
									<div class="date-tag small-caps">
										<?php  echo esc_html( $post_date ); ?>
									</div>
									
									<h3><?php echo esc_html( $title );?></h3>
									
									<?php if ( $description = get_sub_field('short_description') ):?>
									<div class="description">
										<?php echo esc_html( $description );?>
									</div>
									<?php endif;?>
									
								</div>
									
								<div class="link-wrap">
									
									<a class="arrow-link small-caps" href="<?php echo esc_url( $permalink ); ?>"><span class="small-caps underline">Read More</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow"/></a>

								</div>
								
							<div class="bottom-line"></div>
																	
							</div>
																
						</div>
					    	
					    	
					    	
					    	
					    	
					    <?php endforeach; ?>
					    	
					    </div>
				    </div>
			    </section>
			    <?php endif;?>
			    			    					
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>