<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Porfolio</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <?php wp_head(); ?>
</head>
<body class="<?php echo getWrapperClass(); ?>">
    <header class="<?php if(is_front_page()) echo "top-header"; ?>">
        <div class="container">
            <div id="responsive-menu-bar">
                <div class="fa fa-navicon"></div>
            </div>
            <div class="header-left">
                <div class="logo">
                    <a href="<?php echo esc_url(home_url()); ?>">Atsushi Yagishita<span class="sub-logo">Photographer</span></a>
                </div>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="<?php echo esc_url(home_url()); ?>/about">About</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/portfolio">Portfolio</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/price">Price</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/blog">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/contact">Contact</a></li>
                    <li><a href="https://www.instagram.com/__photomove12/?hl=ja" target="_blank"><span class="fa fa-instagram fa-lg"></span></a></li>
                    <li><a href="https://www.facebook.com/atsushi.yagishita.3?fref=ts" target="_blank"><span class="fa fa-facebook-official fa-lg"></span></a></li>
                </ul>
            </div>

            <!-- レスポンシブメニュー -->
            <div id="responsive-menu">
                <ul>
                    <li><a href="<?php echo esc_url(home_url()); ?>/about">About</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/portfolio">Portfolio</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/price">Price</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/blog">Blog</a></li>
                    <li><a href="<?php echo esc_url(home_url()); ?>/contact">Contact</a></li>
                    <li><a href="https://www.instagram.com/__photomove12/?hl=ja" target="_blank"><span class="fa fa-instagram fa-lg"></span> Instagram</a></li>
                    <li><a href="https://www.facebook.com/atsushi.yagishita.3?fref=ts" target="_blank"><span class="fa fa-facebook-official fa-lg"></span> Facebook</a></li>
                </ul>
            </div>
        </div>
    </header>