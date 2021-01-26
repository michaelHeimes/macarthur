<div class="cell box sm small-12 medium-6 tablet-4">
	
	<div class="inner" data-equalizer-watch>
		
		<div class="top">
	
			<div class="date-tag small-caps">
				<?php the_sub_field('date_or_tag');?>
			</div>
			
			<h3><?php the_sub_field('title');?></h3>
			
			<?php if ( $description = get_sub_field('short_description') ):?>
			<div class="description">
				<?php echo $description;?>
			</div>
			<?php endif;?>
			
		</div>
			
		<div class="link-wrap">
			<?php 
			$link = get_sub_field('link');
			if( $link ): 
			    $link_url = $link['url'];
			    $link_title = $link['title'];
			    $link_target = $link['target'] ? $link['target'] : '_self';
			    ?>
			    <a class="arrow-link small-caps" href="<?php echo esc_url( $link_url ); ?>" target="<?php echo esc_attr( $link_target ); ?>"><span class="small-caps underline"><?php echo esc_html( $link_title ); ?></span><img src="<?php echo get_template_directory_uri(); ?>/assets/images/CTA-Arrow.svg" alt="right arrow"/></a>
			<?php endif; ?>
		</div>
		
	<div class="bottom-line"></div>
											
	</div>
										
</div>
