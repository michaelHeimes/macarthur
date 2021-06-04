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

// Style Strip Add-on input
add_filter( 'gform_stripe_elements_style', 'set_stripe_styles', 10, 2 );
function set_stripe_styles( $cardStyles, $formId){

     $cardStyles['base'] = [
          'color'          => '#fff',
          'fontSize'       => '',
          'fontFamily'     => '',
          'fontSmoothing'  => '',
          'fontStyle'      => '',
          'fontVariant'    => '',
          'fontWeight'     => '',
          'iconColor'      => '',
          'lineHeight'     => '',
          'letterSpacing'  => '',
          'textAlign'      => '',
          'padding'        => '',
          'textDecoration' => '',
          'textShadow'     => '',
          'textTransform'  => '',

          ':hover' => [
               'color' => '',
          ],

          ':focus' => [
               'color' => '',
          ],

          '::placeholder' => [
               'color' => '#71777a',
          ],

          '::selection' => [
               'color' => '',
          ],

          ':-webkit-autofill' => [
               'color' => '#fff',
          ],

          ':disabled' => [
               'color' => '',
          ],
     ];

     $cardStyles['complete'] = [

     ];

     $cardStyles['empty'] = [

     ];

     $cardStyles['invalid'] = [
	 		'color' => '#eb1c26',
     ];

     return $cardStyles;

}


