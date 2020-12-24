<?php
/**
 * The off-canvas menu uses the Off-Canvas Component
 *
 * For more info: http://jointswp.com/docs/responsive-navigation/
 */
?>

<div class="top-bar" id="main-menu">
	<div class="top-bar-left">
		<ul class="menu">
			<li class="show-for-sr"><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></li>
			<li>
				<a class="pinned-logo" href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo_just_text', 'options');
					if( !empty( $image ) ): ?>
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>				
				</a>
				<a class="load-logo" href="<?php echo home_url(); ?>">
					<?php 
					$image = get_field('header_logo', 'options');
					if( !empty( $image ) ): ?>
					    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
					<?php endif; ?>					
				</a>
			</li>		
		</ul>
	</div>
	<div class="top-bar-right">
		<?php joints_top_nav(); ?>
	</div>
</div>