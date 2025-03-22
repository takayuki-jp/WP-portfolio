<?php

/**************************************************
CSSファイルの読み込み
**************************************************/
function my_enqueue_styles() {
  wp_enqueue_style('ress', 'https://unpkg.com/ress/dist/ress.min.css', array(), null, 'all');
  wp_enqueue_style('fontawesome', 'https://use.fontawesome.com/releases/v6.7.1/css/all.css', array('ress'), null, 'all');
  wp_enqueue_style('splide-core', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/css/splide.min.css', array('ress'), null, 'all');
  wp_enqueue_style('theme-style', get_stylesheet_uri(), array('ress', 'fontawesome', 'splide-core'), null, 'all');
  wp_enqueue_style('style', get_template_directory_uri() . '/css/style.css', array('ress', 'fontawesome', 'splide-core', 'theme-style'), filemtime(get_template_directory() . '/css/style.css'), 'all');
}
add_action('wp_enqueue_scripts', 'my_enqueue_styles');


/**************************************************
JSファイルの読み込み
**************************************************/
function my_enqueue_scripts() {
  // 全ページで読み込み(fontAwesome // common)
  wp_enqueue_script('fontawesome', 'https://kit.fontawesome.com/6f9cf09e6e.js', array(), null, true);
  wp_enqueue_script('main', get_template_directory_uri() . '/js/main.js', array(), null, true);

  //topページ用のJSファイルの読み込み（splide // toppage)
  if (is_home() || is_front_page()) {
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);
    wp_enqueue_script('topPage', get_template_directory_uri() . '/js/topPage.js', array('splide'), null, true);
  }

  //serviceページのみのjSファイル読み込み（service）
  // if (is_page('service')) {
  //   error_log('Serviceページです'); // デバッグ用
    wp_enqueue_script('service', get_template_directory_uri() . '/js/service.js', array(), null, true);
//   }
}

add_action('wp_enqueue_scripts', 'my_enqueue_scripts');


/**************************************************
　OGPの設定
**************************************************/
function add_ogp_meta_tags() {
  $site_name = get_bloginfo('name');
  $title = wp_get_document_title();
  $description = get_the_excerpt() ? get_the_excerpt() : get_bloginfo('description');
  $url = get_permalink();
  $image = has_post_thumbnail() ? get_the_post_thumbnail_url() : get_template_directory_uri() . '/img/fv01.png';
  $locale = get_locale();

  echo '<meta property="og:site_name" content="' . esc_attr($site_name) . '">' . "\n";
  echo '<meta property="og:title" content="' . esc_attr($title) . '">' . "\n";
  echo '<meta property="og:description" content="' . esc_attr($description) . '">' . "\n";
  echo '<meta property="og:type" content="article">' . "\n";
  echo '<meta property="og:url" content="' . esc_url($url) . '">' . "\n";
  echo '<meta property="og:image" content="' . esc_url($image) . '">' . "\n";
  echo '<meta property="og:locale" content="' . esc_attr($locale) . '">' . "\n";
}

add_action('wp_head', 'add_ogp_meta_tags');


/********** archive.php有効化（アーカイブページURLの設定） ***********/
function post_has_archive($args, $post_type) {
  if ('post' === $post_type) {
    $args['rewrite'] = true;
    $args['has_archive'] = 'archive';
  }
  return $args;
}

add_filter('register_post_type_args', 'post_has_archive', 10, 2);


/********** サムネイルの有効化 ***********/
add_theme_support('post-thumbnails');


/********** contact form7 改行禁止 ***********/
add_filter('wpcf7_autop_or_not', '__return_false');

?>