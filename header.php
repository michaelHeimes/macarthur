<?php
/**
 * The template for displaying the header
 *
 * This is the template that displays all of the <head> section
 *
 */
?>

<!doctype html>

  <html class="no-js"  <?php language_attributes(); ?>>

	<head>
		<meta charset="utf-8">
		
		<!-- Force IE to use the latest rendering engine available -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<!-- Mobile Meta -->
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<meta class="foundation-mq">
		
		<!-- If Site Icon isn't set in customizer -->
		<?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
			<!-- Icons & Favicons -->
			<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
<!-- 			<link href="<?php echo get_template_directory_uri(); ?>/assets/images/apple-icon-touch.png" rel="apple-touch-icon" />	 -->
	    <?php } ?>

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<?php wp_head(); ?>

	</head>
			
	<body <?php body_class(); ?>>
		
		<?php if( is_front_page() ):?>
		
		<div id="preloader" class="preloader" style="display: none;">
			<div class="bg" style="background-image: url(<?php the_field('loader_background_image', 'options');?>)"></div>
			
			<?php 
			$image = get_field('loader_logo', 'option');
			if( !empty( $image ) ): ?>
			<div class="img-wrap">
			    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
			    <div class="vertical-line" style="opacity: 0"><div class="circ"></div></div>
			</div>
			<?php endif; ?>
			
		</div>
		
		<?php endif;?>

		<div class="off-canvas-wrapper">
			
			<!-- Load off-canvas container. Feel free to remove if not using. -->			
			<?php get_template_part( 'parts/content', 'offcanvas' ); ?>
			
			<div class="off-canvas-content" <?php if( is_front_page() ):?>style="opacity: 0;"<?php endif;?> data-off-canvas-content>
				
				<header class="header" role="banner" data-sticky data-margin-top="0" data-sticky-on="small">
							
					 <!-- This navs will be applied to the topbar, above all content 
						  To see additional nav styles, visit the /parts directory -->
					 <?php get_template_part( 'parts/nav', 'topbar' ); ?>
	 	
				</header> <!-- end .header -->