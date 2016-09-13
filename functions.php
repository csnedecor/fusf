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

// Theme Options
include('functions/customizer_settings.php');
?>
