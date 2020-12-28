<?php if( get_post_type(get_the_ID()) == 'post'):?>
	
	<div class="article-card cell box sm small-12 medium-6 tablet-4" data-id="inspiration_cards" data-category="<?php $categories = get_the_category();
	if ( ! empty( $categories ) ) {
	    echo esc_html( $categories[0]->slug );   
	} ?>"
	>
				
		<div class="inner" data-equalizer-watch>
			
			<div class="top">
			
				<div class="date-tag">
					<span class="small-caps">
						<?php $categories = get_the_category();
						if ( ! empty( $categories ) ) {
						    echo esc_html( $categories[0]->name );   
						} ?>
					</span>
				</div>
		
				<h3><?php the_title();?></h3>
				
			</div>
			
			<a class="arrow-link small-caps" href="<?php echo get_permalink(); ?>"><span class="small-caps underline">Read More</span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg"/></a>
			
			<div class="bottom-line"></div>
	
		</div>
		
	</div>
	
<?php endif;?>

<?php if( get_post_type(get_the_ID()) == 'podcast_post'):?>

	<article class="single-podcast box full cell small-12 medium-6 tablet-4">
		
		<div class="inner" data-equalizer-watch>
	    		
			<h3>
				<span><?php echo $alm_item ;?>.</span>
				<?php the_title();?>
			</h3>
			
			<div class="date small-caps">
				<?php 
				$format_in = 'd/m/Y'; // the format your value is saved in (set in the field options)
				$format_out = 'M, d Y'; // the format you want to end up with
				
				$date = DateTime::createFromFormat($format_in, get_field('date'));
				
				echo $date->format( $format_out );
					
				?>
			</div>	
			
			<div class="excerpt-wrap">
				<?php the_field('description');?>
			</div>
					
			<button class="button no-style" data-episode="<?php the_field('episode_id');?>"><img src="<?php echo get_template_directory_uri(); ?>/assets/images/pod-play.svg"/><span class="small-caps underline">Listen Now</span></button>
		
		<div class="bottom-line"></div>	
			
		</div>
	
	</article>

<?php endif;?>