﻿<html>
<head>
    <title> کوتاه کننده لینک </title>
    <meta property="og:site_name" content="Cotint Shorten Url"/>
    <meta property="og:description" content="سرویس کوتاه کننده لینک کوتینت جهت استفاده در شبکه های اجتماعی و سایر موارد"/>
    <meta property="og:image" content="images/cotint-logo.jpg" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, user-scalable=0">
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="css/demo.css" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script>document.documentElement.className = 'js';</script>
</head>
<body class="demo-6">
<div class="box-img">
    <img class="center-img" src="images/logo.png">
</div>
<main class="main main--demo-6">
    <div class="content content--demo-6">
        <div class="hamburger hamburger--demo-6 js-hover">
            <div class="hamburger__line hamburger__line--01">
                <div class="hamburger__line-in hamburger__line-in--01 hamburger__line-in--demo-5"></div>
            </div>
            <div class="hamburger__line hamburger__line--02">
                <div class="hamburger__line-in hamburger__line-in--02 hamburger__line-in--demo-5"></div>
            </div>
            <div class="hamburger__line hamburger__line--03">
                <div class="hamburger__line-in hamburger__line-in--03 hamburger__line-in--demo-5"></div>
            </div>
            <div class="hamburger__line hamburger__line--cross01">
                <div class="hamburger__line-in hamburger__line-in--cross01 hamburger__line-in--demo-5"></div>
            </div>
            <div class="hamburger__line hamburger__line--cross02">
                <div class="hamburger__line-in hamburger__line-in--cross02 hamburger__line-in--demo-5"></div>
            </div>
        </div>
        <div class="global-menu">
            <div class="global-menu__wrap">
                <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/"  target="_blank"> کوتینت</a>
                <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/features/"  target="_blank">خدمات</a>
                <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/about-us/" target="_blank">درباره ما</a>
                <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/contact/"  target="_blank">ارتباط با ما</a>
            </div>
        </div>
        <svg class="shape-overlays" viewBox="0 0 100 100" preserveAspectRatio="none">
            <defs>
                <linearGradient id="gradient1" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%"   stop-color="#00c99b"/>
                    <stop offset="100%" stop-color="#ff0ea1"/>
                </linearGradient>
                <linearGradient id="gradient2" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%"   stop-color="#ffd392"/>
                    <stop offset="100%" stop-color="#ff3898"/>
                </linearGradient>
                <linearGradient id="gradient3" x1="0%" y1="0%" x2="0%" y2="100%">
                    <stop offset="0%"   stop-color="#110046"/>
                    <stop offset="100%" stop-color="#32004a"/>
                </linearGradient>
            </defs>
            <path class="shape-overlays__path"></path>
            <path class="shape-overlays__path"></path>
            <path class="shape-overlays__path"></path>
        </svg>
    </div>
    <div class="box">

        <form class="form-cont" id="frm1" action="" method="post">
            <h2 class="center">لینک را در کادر زیر وارد کنید  </h2>
            <input  class="contoroler " type="text" id="url" name="url" placeholder="http://cotint.ir" />
            <button class="btn">ساخت آدرس </button>
        </form>
        <button id="color-btn" data-clipboard-target=".result">کپی</button>
        <div class="demo">
            <div class="result"></div>
        </div>
    </div>
    <div class="tag-p">
        <p> ... There Is No Tomorrow</p>
    </div>
    <div class="footer">
        <p class="cotint">Powered By Cotint</p>
        <div class="footer-bord">
            <ul>
                <a href="http://cotint.ir/contact/" target="_blank"><li class="click-bord">ارتباط با ما</li></a>
                <a href="http://cotint.ir/about-us/" target="_blank"><li>درباره ما</li></a>
                <a href="http://cotint.ir/features/" target="_blank"><li>خدمات</li></a>
                <a href="http://cotint.ir/" target="_blank"><li>کوتینت</li></a>
            </ul>
        </div>
    </div>
</main>

<script src="js/jquery.min.js"></script>
<script src="js/demo.js"></script>
<script src="js/easings.js"></script>
<script src="js/demo6.js"></script>
<script src="js/jquery.copy-to-clipboard.js"></script>
<script>
    $('#color-btn').click(function(){
        $(this).css("background-color","#239963");
        $(this).css("color","#fff");
    });
</script>
<script>
    $('button').click(function(){
        $(this).CopyToClipboard();
    });
</script>
<script>
    $(document).ready(function(){
        $('.btn').live('click',function(e){
            e.preventDefault();
            var url = $('#url').val();
            $('.result').html('<img src="images/loading.gif" />');
            $.post('shortener.php',{url: url},function(data){
                if(data.short != 'invalid')
                    $('.result').html('<a href="'+data.short+'" target="_blank" >'+data.short+'</a>');
                else
                    $('.result').html('<p class="error">http://cotint.ir/about : نمونه درست </p>');
            },'json');
        });
    });
</script>
</body>
</html>