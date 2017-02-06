<?php
$images = array();
for ($i = 1; $i < 14; $i++) {
    $images[] = 'img'.$i.'.jpg';

}

?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Porfolio</title>
    <link rel="stylesheet" type="text/css" href="http://yui.yahooapis.com/3.18.1/build/cssreset/cssreset-min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/swipebox.css" />
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
    <script type="text/javascript" src="js/jquery.swipebox.min.js"></script>
</head>
<body class="portfolio-page">
    <header>
        <div class="container">
            <div id="responsive-menu-bar">
                <div class="fa fa-navicon"></div>
            </div>
            <div class="header-left">
                <div class="logo">
                    <a href="./">Atsushi Yagishita<span class="sub-logo">Photographer</span></a>
                </div>
            </div>
            <div class="header-right">
                <ul>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./portfolio.php">Portfolio</a></li>
                    <li><a href="./blog.php">Blog</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="#"><span class="fa fa-twitter-square fa-lg"></span></a></li>
                    <li><a href="#"><span class="fa fa-facebook-official fa-lg"></span></a></li>
                </ul>
            </div>

            <!-- レスポンシブメニュー -->
            <div id="responsive-menu">
                <ul>
                    <li><a href="./about.php">About</a></li>
                    <li><a href="./portfolio.php">Portfolio</a></li>
                    <li><a href="./blog.php">Blog</a></li>
                    <li><a href="./contact.php">Contact</a></li>
                    <li><a href="#"><span class="fa fa-twitter-square fa-lg"></span> Twitter</a></li>
                    <li><a href="#"><span class="fa fa-facebook-official fa-lg"></span> Facebook</a></li>
                </ul>
            </div>
        </div>
    </header>
    <div class="portfolio-wrapper fade-in">
        <div class="container">
             <?php foreach ($images as $img): ?>
                
                <div class="portfolio-box">
                    <a href="./img/<?php echo $img; ?>" class="swipebox" rel="portfolio"><img src="./img/<?php echo $img; ?>" alt="<?php echo $img; ?>"></a>
                </div>
             <?php endforeach;?>
             <div style="clear:both;"></div>
        </div>
    </div>
    <div class="pagination-wrapper">
        <div class="pagination">
            <ol>
                <li class="pagination-current">1</li>
                <li><a href="">2</a></li>
                <li><a href="">3</a></li>
                <li><a href="">4</a></li>
                <li><a href="">5</a></li>
            </ol>
        </div>
    </div>


<script type="text/javascript">
$(document).ready(function() {
    $('.swipebox' ).swipebox({
        'removeBarsOnMobile': false
    });
});
</script>

</body>
</html>
