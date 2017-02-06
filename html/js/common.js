$(function(){
    $('.fade-in').fadeIn(1000);

    // レスポンシブメニュー
    $("#responsive-menu-bar").click(function(){
        $("#responsive-menu").slideToggle();
        return false;
    });

    // ウィンドウの幅リサイズ時
    $(window).resize(function(){
        var win = $(window).width();
        var p = 1023;
        if(win > p){
            $("#responsive-menu").hide();
        }
    });

    if ($('body').hasClass('top-page')) {
        // トッブページ画像
        $("document").ready(function(){
            $(".top-page").bgswitcher({
                images: ["./img/wedding.jpg",
                         "./img/wedding2.jpg",
                         "./img/img2.jpg",
                         "./img/img11.jpg",
                         "./img/img12.jpg"]
            });
        });
    }
});