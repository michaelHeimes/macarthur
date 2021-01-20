<?php
function site_scripts() {
  global $wp_styles; // Call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way

  	// Adding Barba CDN
    wp_enqueue_script( 'barba-js', '//cdn.jsdelivr.net/npm/@barba/core', array( 'jquery' ), true );

  	// Adding GSAP CDN
    wp_enqueue_script( 'gsap-js', '//cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/gsap.min.js', array( 'jquery' ), true );

  	// Adding GSAP ScrollTrigger CDN
    wp_enqueue_script( 'scroll-trigger-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.5.1/ScrollTrigger.min.js', array( 'jquery' ), true );

  	// Adding Slick Slider JS CDN
    wp_enqueue_script( 'slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', array( 'jquery' ), true );
        
    // Adding scripts file in the footer
    wp_enqueue_script( 'site-js', get_template_directory_uri() . '/assets/scripts/scripts.js', array( 'jquery' ), filemtime(get_template_directory() . '/assets/scripts/js'), true );

    // Register Slick Slider stylesheet
    wp_enqueue_style( 'slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css', array(), 'all' );
   
    // Register main stylesheet
    wp_enqueue_style( 'site-css', get_template_directory_uri() . '/assets/styles/style.css', array(), filemtime(get_template_directory() . '/assets/styles/scss'), 'all' );

    // Comment reply script for threaded comments
    if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
      wp_enqueue_script( 'comment-reply' );
    }
}
add_action('wp_enqueue_scripts', 'site_scripts', 999);






