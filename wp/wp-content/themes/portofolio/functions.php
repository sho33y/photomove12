<?php
// ビジュアルリッチエディタを非表示
add_filter('user_can_richedit' , create_function('' , 'return false;') , 50);
// wordpress本体の更新通知を非表示
add_filter('pre_site_transient_update_core', '__return_zero');
// プラグインの更新通知を非表示
remove_action('load-update-core.php', 'wp_update_plugins');
add_filter('pre_site_transient_update_plugins', '__return_zero');
// テーマ更新通知を非表示
remove_action('load-update-core.php', 'wp_update_themes');
add_filter('pre_site_transient_update_themes', '__return_zero');

// wp_headが出力する不要なタグを削除
remove_action('wp_head', 'rsd_link');                         // 外部のブログ投稿ツール
remove_action('wp_head', 'wlwmanifest_link');                 // 外部のブログ投稿ツール
remove_action('wp_head', 'wp_generator');                     // wordpressのバージョン
remove_action('wp_head', 'wp_shortlink_wp_head');             // ショートリンクのURL
remove_action('wp_head', 'adjacent_posts_rel_link_wp_head');  // 前後の記事リンク
remove_action('wp_head', 'feed_links_extra', 3);              // RSSフィードのURL

add_theme_support('menus');
add_theme_support('post-thumbnails');

function get_ogp_image() {
    // デフォルトの OGP 用画像
    $image = get_template_directory_uri() . '/img/common/ogp.png';

    if (is_single()) {
        global $post;
        $postID = $post->ID;
        $content_str = $post->post_content;
    } else {
        global $posts;
        $postID = $posts[0]->ID;
        $content_str = $posts[0]->post_content;
    }

    // 投稿記事に画像があるか調べるための正規表現パターン
    $img_pattern = '/<img.*?src=(["\'])(.+?)\1.*?>/i';

    if (has_post_thumbnail()) {
        // アイキャッチ画像がある場合
        $eyecatch_id = get_post_thumbnail_id();
        $eyecatch = wp_get_attachment_image_src($eyecatch_id, 'full');
        $image = $eyecatch[0];
    } elseif (preg_match($img_pattern, $content_str, $matches)) {
        //アイキャッチ画像はないが記事内に画像がある場合
        $image = $matches[2];
    }

    return $image;
}
function get_meta_description() {
    $data = '';
    if (is_single()) {
        global $post;
        $data = $post;

    } else {
        global $posts;
        $data = $posts[0];
    }

    $description = "";
    if (is_single()) {
        if ($data->post_excerpt) {
            // 記事本文から抜粋を取得
            $description = $data->post_excerpt;
        } else {
            // post_excerpt で取れない時は、自力で記事の冒頭100文字を抜粋して取得
            $description = strip_tags($data->post_content);
            $description = str_replace("\n", "", $description);
            $description = str_replace("\r", "", $description);
            $description = mb_substr($description, 0, 100) . "...";
        }

    } else {
        $description = get_bloginfo('description');
    }

    return $description;
}
function get_ogp_tags() {
    $title = '';
    $type  = '';
    $url   = '';
    $image = get_ogp_image();
    $description = get_meta_description();
    $site_name   = get_bloginfo('name');
    $facebook_app_id = '';
    $twitter_account = '';

    if (is_single()) {
        $title = get_the_title();
        $type  = 'article';
        $url   = get_permalink();
    } else {
        $title = get_bloginfo('name');
        $type  = 'website';
        $url   = home_url();
    }

    $ogp_tags = <<< EOF
<meta property="og:title" content="$title" />
<meta property="og:type" content="$type" />
<meta property="og:url" content="$url" />
<meta property="og:image" content="$image" />
<meta property="og:description" content="$description" />
<meta property="og:site_name" content="$site_name" />
<meta name="twitter:card" content="summary_large_image" />
<meta name="twitter:site" content="" />
<meta name="twitter:title" content="$title" />
<meta name="twitter:description" content="$description" />
<meta name="twitter:image" content="$image" />
EOF;

    return $ogp_tags;
}
function echo_ogp_tags() {
    echo get_ogp_tags();
}

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


