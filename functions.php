<?php

add_action('wp_enqueue_scripts', 'get_theme_styles');
function get_theme_styles()
{
    wp_enqueue_style('style', get_stylesheet_uri());
    wp_enqueue_style('default', get_template_directory_uri() . '/assets/css/default.css');
    wp_enqueue_style('layout', get_template_directory_uri() . '/assets/css/layout.css');
    wp_enqueue_style('media-queries', get_template_directory_uri() . '/assets/css/media-queries.css');
    wp_enqueue_script('modernizr', get_template_directory_uri() . '/assets/js/modernizr.js');
}

add_action('wp_footer', 'get_theme_scripts');
function get_theme_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('init', get_template_directory_uri() . '/assets/js/init.js');
    wp_enqueue_script('flexslider', get_template_directory_uri() . '/assets/js/jquery.flexslider.js');
    wp_enqueue_script('doubletaptogo', get_template_directory_uri() . '/assets/js/doubletaptogo.js');
}

add_action('after_setup_theme', 'register_theme_supports');
function register_theme_supports()
{
    register_nav_menu('header_menu', 'Меню в шапке сайта');
    register_nav_menu('footer_menu', 'Меню в футере сайта');
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    add_image_size('post-thumb', 1300, 600, true);
    add_filter('excerpt_more', 'new_excerpt_more');
    function new_excerpt_more($more)
    {
        global $post;
        return '<a href="'. get_permalink($post) . '">... Read more</a>';
    }
}

add_action("widgets_init", 'register_theme_sidebars');
function register_theme_sidebars()
{
    register_sidebar(array(
  'name'          => 'Правый сайдбар',
  'id'            => "sidebar-right",
  'description'   => 'Правая боковая панель с виджетами на странице',
  'class'         => '',
  'before_widget' => '<div class="widget %2$s">',
  'after_widget'  => "</div>\n",
  'before_title'  => '<h5 class="widget-title">',
  'after_title'   => "</h5>\n",
  ));
};
