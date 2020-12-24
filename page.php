<?php 
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 */

get_header(); ?>
	
	<div class="content">
	
		<div class="inner-content ">
	
		    <main class="main" role="main">
			    
			    <section class="banner">
				    <div class="grid-container fluid offset-content">
					    <div class="inner-padding grid-x grid-padding-x">	
					
							<h1 class="cell small-12"><?php the_field('heading');?></h1>	
							
							<?php if ( $subheading = get_field('sub_heading') ):?>
							<h2><?php echo $subheading;?></h2>	
							<?php endif;?>

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
			    
			    <?php if( have_rows('resources') ):?>
			    <section class="resources" data-equalizer data-equalize-on="medium" data-equalize-on-stack="true">
				    <div class="grid-container fluid offset-content left-line">
					    <div class="heading-wrap inner-padding grid-x grid-padding-x">
							<h2 class="cell small-12"><?php the_field('resources_heading');?></h2>
					    </div>
					    
					    <div class="inner-padding box-wrap sm grid-x grid-padding-x">	
						    
					    	<?php while ( have_rows('resources') ) : the_row();?>
					    		
								<?php if( have_rows('single_resource') ):?>
									<?php while ( have_rows('single_resource') ) : the_row();?>	
								
										<?php get_template_part('parts/loop', 'resource-box');?>
									
									<?php endwhile;?>
								<?php endif;?>
					    
					    	<?php endwhile;?>
					    	
					    </div>
				    </div>
			    </section>
			    <?php endif;?>
			    			    					
			</main> <!-- end #main -->

		    <?php get_sidebar(); ?>
		    
		</div> <!-- end #inner-content -->

	</div> <!-- end #content -->
<div class="grid-x grid-margin-x" data-equalizer data-equalize-on="medium" id="test-eq">
  <div class="cell medium-4">
    <div class="callout" data-equalizer-watch>
      <img src= "assets/img/generic/square-1.jpg">
    </div>
  </div>
  <div class="cell medium-4">
    <div class="callout" data-equalizer-watch>
      <p>Pellentesque habitant morbi tristique senectus et netus et, ante.</p>
    </div>
  </div>
  <div class="cell medium-4">
    <div class="callout" data-equalizer-watch>
      <img src= "assets/img/generic/rectangle-1.jpg">
    </div>
  </div>
</div>
<?php get_footer(); ?>