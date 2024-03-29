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
    add_image_size('portfolio-thumb', 280, 280, true);
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
};

add_action( 'init', 'register_post_types' );
function register_post_types(){
	register_post_type('portfolio', array(
		'label'  => null,
		'labels' => array(
			'name'               => 'Портфолио', // основное название для типа записи
			'singular_name'      => 'Работа', // название для одной записи этого типа
			'add_new'            => 'Добавить работу', // для добавления новой записи
			'add_new_item'       => 'Добавление работы', // заголовка у вновь создаваемой записи в админ-панели.
			'edit_item'          => 'Редактирование работы', // для редактирования типа записи
			'new_item'           => 'Новая работа', // текст новой записи
			'view_item'          => 'Смотреть работы', // для просмотра записи этого типа.
			'search_items'       => 'Искать работу', // для поиска по этим типам записи
			'not_found'          => 'Не найдено работ', // если в результате поиска ничего не было найдено
			'not_found_in_trash' => 'Не найдено в корзине', // если не было найдено в корзине
			'parent_item_colon'  => '', // для родителей (у древовидных типов)
			'menu_name'          => 'Портфолио', // название меню
		),
		'description'         => 'Работы наших фотографов',
		'public'              => true,
		'publicly_queryable'  => true, // зависит от public
		'exclude_from_search' => true, // зависит от public
		'show_ui'             => true, // зависит от public
		'show_in_nav_menus'   => true, // зависит от public
		'show_in_menu'        => true, // показывать ли в меню адмнки
		'show_in_admin_bar'   => true, // зависит от show_in_menu
		'show_in_rest'        => true, // добавить в REST API. C WP 4.7
		'rest_base'           => null, // $post_type. C WP 4.7
		'menu_position'       => 4,
		'menu_icon'           => 'dashicons-portfolio',
		//'capability_type'   => 'post',
		//'capabilities'      => 'post', // массив дополнительных прав для этого типа записи
		//'map_meta_cap'      => null, // Ставим true чтобы включить дефолтный обработчик специальных прав
		'hierarchical'        => false,
		'supports'            => [ 'title', 'editor', 'author', 'thumbnail', 'excerpt'], // 'title','editor','author','thumbnail','excerpt','trackbacks','custom-fields','comments','revisions','page-attributes','post-formats'
		'taxonomies'          => ['skills'],
		'has_archive'         => false,
		'rewrite'             => true,
		'query_var'           => true,
	) );
};

// хук для регистрации
add_action( 'init', 'create_taxonomy' );
function create_taxonomy(){

	// список параметров: wp-kama.ru/function/get_taxonomy_labels
	register_taxonomy( 'skills', [ 'portfolio' ], [
		'label'                 => '', // определяется параметром $labels->name
		'labels'                => [
			'name'              => 'Навыки',
			'singular_name'     => 'Навык',
			'search_items'      => 'Найти навыки',
			'all_items'         => 'Все навыки',
			'view_item '        => 'Посмотреть навык',
			'parent_item'       => 'Родительский навык',
			'parent_item_colon' => 'Родительский навык:',
			'edit_item'         => 'Редактировать навык',
			'update_item'       => 'Обновить навык',
			'add_new_item'      => 'Добавить новый навык',
			'new_item_name'     => 'Имя нового навыка',
			'menu_name'         => 'Навыки',
		],
		'description'           => '', // описание таксономии
		'public'                => true,
		'hierarchical'          => false,
		'rewrite'               => true,
		//'query_var'             => $taxonomy, // название параметра запроса
		'capabilities'          => array(),
		'meta_box_cb'           => null, // html метабокса. callback: `post_categories_meta_box` или `post_tags_meta_box`. false — метабокс отключен.
		'show_admin_column'     => false, // авто-создание колонки таксы в таблице ассоциированного типа записи. (с версии 3.5)
		'show_in_rest'          => null, // добавить в REST API
		'rest_base'             => null, // $taxonomy
		// '_builtin'              => false,
		//'update_count_callback' => '_update_post_term_count',
	] );
}
