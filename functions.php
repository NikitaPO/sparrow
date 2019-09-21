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
    add_theme_support( 'post-formats', array( 'aside', 'video' ) );
    add_image_size('post-thumb', 1300, 600, true);
    add_filter('excerpt_more', 'new_excerpt_more');
    function new_excerpt_more($more)
    {
        global $post;
        return '<a href="'.get_permalink($post).'" target="_blank">...</a>';
    }
    add_filter('navigation_markup_template', 'my_navigation_template', 10, 2);
    function my_navigation_template($template, $class)
    {
        return
      '<nav class="navigation %1$s" role="navigation">
		     <div class="nav-links">%3$s</div>
	     </nav>';
    }
    add_filter('document_title_separator', 'change_doc_separator');
    function change_doc_separator($sep)
    {
        $sep = ' | ';
        return $sep;
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

add_shortcode('map', 'generate_yandex_map');
function generate_yandex_map($atts) {
  $atts = shortcode_atts( array(
    'src'    => 'https://yandex.ru/map-widget/v1/?um=constructor%3Af88901ee6fb4c336877ca041e30c90b9fded09ddfd8e4a6c377eb543381b6ae5&amp;source=constructor',
    'height' => '400',
    'width'  => '500'
  ), $atts );
  return '<iframe src="'.$atts["src"].'" width="'.$atts["width"].'" height="'.$atts["height"].'" frameborder="0"></iframe>';
}
