<?php
/**
 * The template for displaying 404 (page not found) pages.
 *
 * For more info: https://codex.wordpress.org/Creating_an_Error_404_Page
 */

get_header(); ?>
			
	<div class="content">
		
		<main class="main small-12 medium-8 large-8 cell" role="main">

		    <section>
			    
			    <div class="grid-container fluid offset-content">
			    
				    <div class="heading-wrap grid-x grid-padding-x">
				
						<div class="cell small-12">
							<h1><?php the_field('error_404_heading', 'options');?></h1>
						
							<p><?php the_field('error_404_text', 'options');?></p>
						</div>
						
						<div class="btn-wrap cell small-12">
							<a class="button lg" href="<?php echo home_url(); ?>">Go To Home</a>							
						</div>
					
				    </div>
												
			    </div>
			
		    </section>	

		</main> <!-- end #main -->

	</div> <!-- end #content -->

<?php get_footer(); ?>