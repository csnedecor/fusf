<?php
// Enqueue Scripts
function fusf_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', '', '2.0');
  wp_enqueue_style( 'jquery-flexslider', get_template_directory_uri() . '/css/flexslider.css', '', '2.0');
}
add_action( 'wp_enqueue_scripts', 'fusf_enqueue_styles' );

/*
 * Register summary tab for Membership purchases
 */
function woo_summary_tab( $tabs ) {
  global $post;
  if($post->ID == 484){
    $tabs['summary_tab'] = array(
        'title' => __('Purchase','woocommerce'),
        'priority' => 9,
        'callback' => 'woo_summary_tab_content'
    );
  }
    return $tabs;
}
/*
 * Place summary content in custom tab
 */

function woo_summary_tab_content() {
  do_action( 'woocommerce_single_product_summary' );
}
add_filter( 'woocommerce_product_tabs', 'woo_summary_tab' );


// Register Menu for History Pages
function register_fusf_menus() {
  register_nav_menu('history-menu',__( 'History Menu' ));
  register_nav_menu('ccc-life-menu',__( 'CCC Life Menu' ));
}
add_action( 'init', 'register_fusf_menus' );

/**
 * Revise the Custom Header feature
 */
function fusf_custom_header_setup() {

  $args = array(
      'default-image'          => '',
      'default-text-color'     => 'FFF',
      'width'                  => 1400,
      'height'                 => 300,
      'flex-height'            => true,
      'wp-head-callback'       => 'adamos_header_style',
      'admin-head-callback'    => 'adamos_admin_header_style',
      'admin-preview-callback' => 'adamos_admin_header_image',
    );

    $args = apply_filters( 'fusf_custom_header_args', $args );

    if ( function_exists( 'wp_get_theme' ) ) {
      add_theme_support( 'custom-header', $args );
  }

}
add_action( 'after_setup_theme', 'fusf_custom_header_setup' );

// Theme Options
include('functions/customizer_settings.php');
