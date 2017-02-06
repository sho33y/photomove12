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
    <script type="text/javascript" src="js/jquery-2.2.3.min.js"></script>
    <script type="text/javascript" src="js/jquery.bgswitcher.js"></script>
    <script type="text/javascript" src="js/common.js"></script>
</head>
<body class="contact-page">
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
    <div class="contact-wrapper fade-in">
        <div class="container">
            <div class="contact-description">
                <h2>お問い合わせ</h2>
                <p>お仕事のご依頼などは下記のメールフォームからお気軽にお問い合わせくださいませ。</p>
                <p>後日、担当者よりご連絡させて頂きます。</p>
            </div>

            <div class="contact-form">
                <form action="contact.php" method="post">
                    <p>お名前<span class="attention">(必須)</span></p>
                    <input type="text" name="name">

                    <p>メールアドレス<span class="attention">(必須)</span></p>
                    <input type="email" name="email">

                    <p>件名<span class="attention">(必須)</span></p>
                    <input type="text" name="subject">

                    <p>メッセージ本文<span class="attention">(必須)</span></p>
                    <textarea name="message" cols="30" rows="8"></textarea>
                    
                    <div class="btn-wrapper">
                        <input type="submit" class="btn btn-send" value="送信">
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
