<?php

get_header();

$post_type = (get_query_var('post_type')) ? get_query_var('post_type') : '';
$paged     = (get_query_var('paged')) ? get_query_var('paged') : 1;

switch ($post_type) {
    case 'portfolio':
        $wp_query = findPortfolio($paged);
        include(TEMPLATEPATH . '/templates/template-portfolio.php');
        break;

    default:
        include(TEMPLATEPATH . '/templates/template-blog.php');
        break;
}

get_footer();