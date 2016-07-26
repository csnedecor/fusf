<?php
// Enqueue Scripts
function fusf_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'fusf_enqueue_styles' );

// Theme Options
include('functions/customizer_settings.php');
?>
