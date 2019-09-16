<?php

add_action( 'wp_enqueue_scripts', 'get_theme_styles' );
function get_theme_styles() {
  wp_enqueue_style( 'style', get_stylesheet_uri() );
  wp_enqueue_style( 'default', get_template_directory_uri() . '/assets/css/default.css' );
  wp_enqueue_style( 'layout', get_template_directory_uri() . '/assets/css/layout.css' );
  wp_enqueue_style( 'media-queries', get_template_directory_uri() . '/assets/css/media-queries.css' );
  wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');
}

add_action( 'wp_footer', 'get_theme_scripts' );
function get_theme_scripts() {
  wp_enqueue_script( 'jquery' );
  wp_enqueue_script( 'init', get_template_directory_uri() . '/assets/js/init.js');
  wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js');
  wp_enqueue_script( 'doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js');
} 

add_action( 'after_setup_theme', 'register_theme_menus' );
function register_theme_menus() {
  register_nav_menu( 'header_menu', 'Меню в шапке сайта' );
  register_nav_menu( 'footer_menu', 'Меню в футере сайта' );
  register_nav_menu( 'footer_socials', 'Социальные иконки в футере' );
}
