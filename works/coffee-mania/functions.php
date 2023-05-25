<?php
// 外部ファイルの読み込み
function add_files()
{
  wp_enqueue_style('font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css');
  wp_enqueue_style('main-style', get_stylesheet_uri());
  wp_enqueue_script('main-script', get_theme_file_uri('/js/script.js'), array(), '', true);
}
add_action('wp_enqueue_scripts', 'add_files');

// タイトルタグ
function theme_setup()
{
  add_theme_support('title-tag');
  add_theme_support('post-thumbnails');
}
add_action('after_setup_theme', 'theme_setup');
function my_document_title_separator($separator)
{
  $separator = '|';
  return $separator;
}
add_filter('document_title_separator', 'my_document_title_separator');

// ナビゲーション
function register_my_menus()
{
  register_nav_menus(
    array(
      'header-menu' => 'ヘッダーメニュー',
      'footer-menu' => 'フッターメニュー',
    )
  );
}
add_action('init', 'register_my_menus');
