<?php 
/**
 * Template Name: Single Workshop Page
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
					
							<h1 class="cell small-12"><?php the_title();?></h1>
							
							<div class="cell small-12 info-wrap small-caps">
								<div>Date: <?php the_field('date');?></div>
								<div>Time: <?php the_field('time');?></div>
								<div>Location: <?php the_field('location');?></div>
							</div>
						
					    </div>
													
				    </div>
				
			    </section>	
			    

				<section class="copy entry-content">

					<div class="grid-container fluid offset-content left-line">
						<div class="inner-padding grid-x grid-padding-x">
							
							<?php the_field('copy');?>
							
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