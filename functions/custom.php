<?php

/**
 * Enqueue Google fonts.
 */
function wpb_add_google_fonts() {
	wp_enqueue_style( 'wpb-google-fonts', 'https://fonts.googleapis.com/css2?family=EB+Garamond&display=swap" rel="stylesheet', false ); 
}

// ACF Options
add_action( 'after_setup_theme', 'joints_theme_support' );

if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page();
	
}

if( function_exists('acf_set_options_page_title') ) {
    acf_set_options_page_title( __('Theme Options') );
}

// Change gravity forms Submit input to a button and add 'sm' class
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    return "<button class='button gform_button sm' id='gform_submit_button_{$form['id']}'><span>Submit</span></button>";
}