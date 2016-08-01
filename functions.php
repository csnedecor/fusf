<?php
// Enqueue Scripts
function fusf_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '2.0');
  wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() . '/css/flexslider.css', '', '2.0');
}
add_action( 'wp_enqueue_scripts', 'fusf_enqueue_styles' );

// Theme Options
include('functions/customizer_settings.php');
?>
