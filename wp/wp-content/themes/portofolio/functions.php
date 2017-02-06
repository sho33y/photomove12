<?php
// スクリプトを読み込む
function porfolio_original__scripts() {
    wp_enqueue_style('porfolio_original__stylecss', get_stylesheet_uri());
    wp_enqueue_style('porfolio_original__responsive', get_template_directory_uri() . '/css/responsive.css');
    wp_enqueue_style('porfolio_original__swipebox', get_template_directory_uri() . '/css/swipebox.css');

    wp_deregister_script('jquery');
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-2.2.3.min.js', array(), '2.2.3');
    wp_enqueue_script('porfolio_original__bgswitcher', get_template_directory_uri() . '/js/jquery.bgswitcher.js');
    wp_enqueue_script('porfolio_original__swipeboxjs', get_template_directory_uri() . '/js/jquery.swipebox.min.js');
    wp_enqueue_script('porfolio_original__commonjs', get_template_directory_uri() . '/js/common.js');
}
add_action('wp_enqueue_scripts', 'porfolio_original__scripts');

add_theme_support('menus');
add_theme_support('post-thumbnails');

// 記事本文から抜粋する文字数
function custom_excerpt_length($length) {
     return 120;
}
add_filter('excerpt_length', 'custom_excerpt_length', 999);

// ページごとのclassを取得
function getWrapperClass() {
    if(is_front_page())      { echo "top fade-in"; }
    if(is_page("about"))     { echo "about"; }
    if(is_page("portfolio")) { echo "portfolio"; }
    if(is_page("price"))     { echo "price"; }
    if(is_page("blog"))      { echo "blog"; }
    if(is_page("contact"))   { echo "contact"; }
}

add_action('init', 'add_portfolio_post');
function add_portfolio_post() {
    $params = array(
            'labels' => array(
                    'name' => 'ポートフォリオ',
                    'singular_name' => 'ポートフォリオ',
                    'add_new' => '新規追加',
                    'add_new_item' => '新規ポートフォリオを追加',
                    'edit_item' => '編集する',
                    'new_item' => '新規ポートフォリオ',
                    'all_items' => 'ポートフォリオ一覧',
                    'view_item' => 'ポートフォリオを表示',
                    'search_items' => '検索する',
                    'not_found' => 'ページが見つかりませんでした。',
                    'not_found_in_trash' => 'ゴミ箱内にポートフォリオが見つかりませんでした。'
            ),
            'public' => true,
            'has_archive' => true,
            'supports' => array(
                    'title',
                    'editor',
                    'author',
                    'thumbnail',
                    'comments',
                    'custom-fields',
            ),
            'taxonomies' => array('portfolio_category', 'portfolio_tag'),
            'menu_position' => 5, // 管理画面メニューの場所
    );
    register_post_type('portfolio', $params);
}

function findPortfolio($paged) {
    $args = array(
        'order'          => 'ASC',
        'post_type'      => 'portfolio',
        'posts_per_page' => 12,
        'paged'          => $paged
    );

    return new WP_Query($args);
}

function pagination($pages = '', $range = 2) {
    // 表示するページ数
    $showitems = ($range * 2) + 1;

    // 全ページ数
    if ($pages == '') $pages = 1;

    // 現在のページ値
    global $paged;
    if (empty($paged)) $paged = 1;

    // 全ページが１でない場合はページネーションを表示する
    if (1 != $pages) {
        echo "<div class=\"pagination\">\n";
        echo "<ol>\n";
        for ($i = 1; $i <= $pages; $i++) {
            if (1 != $pages && (!($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems)) {
                // 三項演算子での条件分岐
                echo ($paged == $i) ? "<li class=\"pagination-current\">".$i."</li>\n" : "<li><a href='".get_pagenum_link($i)."'>".$i."</a></li>\n";
            }
         }
        echo "</ol>\n";
        echo "</div>\n";
    }
}


