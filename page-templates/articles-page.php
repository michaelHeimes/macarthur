<?php 
/**
 * Template Name: Preacher's Toolkit Page
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
					    
						    <div class="left cell small-12 medium-6">
							    <?php 
								$image = get_field('ph_image');
								if( !empty( $image ) ): ?>
								    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
								<?php endif; ?>
						    </div>				    
							    
							    
							<?php
							$featured_post = get_field('featured_article');
							if( $featured_post ): ?>
							    <?php foreach( $featured_post as $post ): 
							
							        // Setup this post for WP functions (variable must be named $post).
							        setup_postdata($post); ?>
								    
									<div class="right cell small-12 medium-6">
							
										<h1><?php the_title();?></h1>
										
										<div class="copy-wrap">
											
											<?php the_field('hfa_excerpt');?>
																																
										</div>
										
										<div class="btn-wrap">
											<a class="button sm" href="<?php echo esc_url( get_permalink() ); ?>">
												Read More
											</a>
										</div>
									
									</div>
								    
							    <?php endforeach; ?>
							    <?php 
							    // Reset the global post object so that the rest of the page works correctly.
							    wp_reset_postdata(); ?>
							<?php endif; ?>						    

					    </div>
				    </div>
				
			    </section>	
			    
			    <section class="articles">
				    
				    <div class="grid-container fluid offset-content left-line">
						<div class="inner-padding heading-wrap grid-x grid-padding-x">

						    <h2 class="cell small-12 text-center"><?php the_field('heading');?></h2>
						    
						    <div class="filter-label cell small-12 small-caps text-center">Filter By</div>
						    
					    </div>
				    
				    <div id="cat-filter" class="filter-buttons-wrap grid-container fluid">
					    <div class="btn-wrap grid-x grid-padding-x align-center">
						    
						   <div class="cell shrink"><button class="button" data-repeater="default" data-posts-per-page="15"  data-scroll="false" data-category="">All</button></div>
						   
						   <?php 
							$categories = get_categories(array(
								'show_option_all'    => '',
								'orderby'            => 'name',
								'order'              => 'ASC',
								'style'              => 'list',
								'show_count'         => 0,
								'hide_empty'         => 1,
								'use_desc_for_title' => 1,
								'child_of'           => 0,
								'feed'               => '',
								'feed_type'          => '',
								'feed_image'         => '',
								'exclude_tree'       => '',
								'include'            => '',
								'hierarchical'       => true,
								'title_li'           => __( 'Categories' ),
								'show_option_none'   => __('No categories'),
								'number'             => NULL,
								'echo'               => 1,
								'depth'              => 0,
								'current_category'   => 0,
								'pad_counts'         => 0,
								'walker'             => 'Walker_Category' 
							  ));
							foreach ( $categories as $category ) :
						  
						   echo '<div class="cell shrink"><button class="button" data-repeater="default" data-posts-per-page="15"  data-scroll="false" data-category="' . $category->slug . '">' . $category->name . '</button></div>';
						
						  endforeach;?>
					    </div>

				    </div>
				    
				    <div class="articles-wrap">
					    
					    <div class="inner-padding">
					    
						    <div class="grid-container fluid">				    
						    	<?php 
								$featured_post = get_field('featured_article', false, false);
								$post__not_in = ($featured_post) ? implode(',', $featured_post) : '';
								echo do_shortcode('[ajax_load_more scroll="false" button_label="Load More" container_type="div" transition_container_classes="box-wrap filter-grid grid-x grid-margin-x grid-padding-x" post_type="post" order="DESC" transition_container="true" posts_per_page="9" cache="false" post__not_in="' . $post__not_in . '"]'); ?>
								
						    </div>
						
					    </div>
				    
				    </div>
			    </section>
			    					
			</main> <!-- end #main -->
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->

<?php get_footer(); ?>