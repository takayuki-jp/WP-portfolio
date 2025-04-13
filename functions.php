<?php
error_log(get_template_directory_uri() . '/js/toppage.js');
error_log('Script path: ' . get_template_directory_uri() . '/js/toppage.js');
error_log('my_enqueue_scripts is being executed'); // デバッグ用ログ
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
    error_log('toppage.js is being loaded'); // デバッグ用ログ
    wp_enqueue_script('splide', 'https://cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);
    wp_enqueue_script('toppage', get_template_directory_uri() . '/js/toppage.js', array('splide'), null, true);
  }

  //serviceページのみのjSファイル読み込み（service）
  if (is_page('service')) {
    wp_enqueue_script('service', get_template_directory_uri() . '/js/service.js', array(), null, true);
  }

  //archiveページのみのjSファイル読み込み（archive）
  if (is_archive()) {
    wp_enqueue_script('archive', get_template_directory_uri() . '/js/archive.js', array(), null, true);
  }
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


// /********** Breadcrumb NavXTによるアーカイブページのタイトル変更 ***********/
function my_static_breadcrumb_adder($breadcrumb_trail) {
  // デフォルトの投稿一覧ページの場合
  if (is_post_type_archive('post')) {
    $item = new bcn_breadcrumb('制作作品の一覧', null, array('post'));
  } 
  // デフォルトの投稿ページの場合
  elseif (get_post_type() === 'post') {
    $item = new bcn_breadcrumb('制作作品の一覧', null, array('post'), home_url('archive/'), null, true);
  }
  // 該当しないページは処理をスキップ
  else {
    return;
  }

  $stuck = array_pop($breadcrumb_trail->breadcrumbs); // HOME 一時退避
  $breadcrumb_trail->breadcrumbs[] = $item; // 任意の名前を追加
  $breadcrumb_trail->breadcrumbs[] = $stuck; // HOME 戻す
}
add_action('bcn_after_fill', 'my_static_breadcrumb_adder');



/********** サムネイルの有効化 ***********/
add_theme_support('post-thumbnails');


/********** contact form7 改行禁止 ***********/
add_filter('wpcf7_autop_or_not', '__return_false');



/********** サムネイル画像にライトボックス機能を追加 ***********/
add_filter('post_thumbnail_html', 'add_lightbox_to_featured_image', 10, 5);
function add_lightbox_to_featured_image($html, $post_id, $post_thumbnail_id, $size, $attr) {
    // single.php（個別投稿ページ）のみで実行
    if (is_singular('post')) {
    $full_image_url = wp_get_attachment_image_src($post_thumbnail_id, 'full');
    $html = str_replace('<img', '<img data-lightbox="featured-image"', $html);
    $html = '<a href="' . $full_image_url[0] . '" data-lightbox="featured-image">' . $html . '</a>';
    }
    return $html;
}


/**
 * Contact Form 7 をお問い合わせページだけで読み込むようにする
 * これをしないと ReCAPTCHA も全ページで読み込まれてしまい
 * 余計なリクエストが発生するため
 */
function cf7_enqueue_scripts_and_styles()
{
    // CF7を読み込ませる固定ページを定義する
    $pages = ['contact','entry'];
    if (is_page($pages)){
        if ( function_exists( 'wpcf7_enqueue_scripts' ) ) {
            wpcf7_enqueue_scripts();
        }

        if ( function_exists( 'wpcf7_enqueue_styles' ) ) {
            wpcf7_enqueue_styles();
        }
    }
    else {
        wp_deregister_script('google-recaptcha');
        wp_deregister_script('wpcf7-recaptcha');
    }
}
add_filter('wpcf7_load_js', '__return_false');
add_filter('wpcf7_load_css', '__return_false');
add_action('wp_enqueue_scripts', 'cf7_enqueue_scripts_and_styles', 100, 0);



/*********************
OGPタグ/Twitterカード設定を出力
*********************/
function my_meta_ogp() {
  if( is_front_page() || is_home() || is_singular() ){
    global $post;
    $ogp_title = '';
    $ogp_descr = '';
    $ogp_url = '';
    $ogp_img = '';
    $insert = '';

    if( is_singular() ) { //記事＆固定ページ
       setup_postdata($post);
       $ogp_title = $post->post_title;
       $ogp_descr = mb_substr(get_the_excerpt(), 0, 100);
       $ogp_url = get_permalink();
       wp_reset_postdata();
    } elseif ( is_front_page() || is_home() ) { //トップページ
       $ogp_title = get_bloginfo('name');
       $ogp_descr = get_bloginfo('description');
       $ogp_url = home_url();
    }

    //og:type
    $ogp_type = ( is_front_page() || is_home() ) ? 'website' : 'article';

    //og:image
    if ( is_singular() && has_post_thumbnail() ) {
       $ps_thumb = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
       $ogp_img = $ps_thumb[0];
    } else {
     $ogp_img = 'http://takayuki-portfolio.com/wp-content/uploads/2025/04/mainVisual-pf.webp';
    }

    //出力するOGPタグをまとめる
    $insert .= '<meta property="og:title" content="'.esc_attr($ogp_title).'" />' . "\n";
    $insert .= '<meta property="og:description" content="'.esc_attr($ogp_descr).'" />' . "\n";
    $insert .= '<meta property="og:type" content="'.$ogp_type.'" />' . "\n";
    $insert .= '<meta property="og:url" content="'.esc_url($ogp_url).'" />' . "\n";
    $insert .= '<meta property="og:image" content="'.esc_url($ogp_img).'" />' . "\n";
    $insert .= '<meta property="og:site_name" content="'.esc_attr(get_bloginfo('name')).'" />' . "\n";
    $insert .= '<meta name="twitter:card" content="summary_large_image" />' . "\n";
    $insert .= '<meta name="twitter:site" content="TakayukiTech" />' . "\n";
    $insert .= '<meta property="og:locale" content="ja_JP" />' . "\n";



    echo $insert;
  }
} //END my_meta_ogp

add_action('wp_head','my_meta_ogp');//headにOGPを出力
