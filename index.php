<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> کوتاه کننده لینک </title>
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
                    <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/about-us/">درباره ما</a>
                    <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/contact/">تماس باما</a>
                    <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/">سایت کوتینت</a>
                    <a class="global-menu__item global-menu__item--demo-6" href="http://cotint.ir/features/">خدمات</a>
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
                <input  class="contoroler " type="text" id="url" name="url" placeholder="لطفا لینک خود را وارد کنید" />
                <button class="btn">ساخت آدرس </button>
            </form>
            <div class="result"></div>
        </div>
        <div class="tag-p">
                <p>
                     There is no tomorrow
                </p>
        </div>
    </main>
		<div class="footer">
			<p class="cotint">Powered By Cotint</p>
            <div class="footer-bord">
                <ul>
                    <a href="http://cotint.ir/about-us/"><li>درباره ما</li></a>
                    <a href="http://cotint.ir/contact/"><li>تماس باما</li></a>
                    <a href="http://cotint.ir/"><li>سایت کوتینت</li></a>
                    <a href="http://cotint.ir/features/"><li>خدمات</li></a>
                </ul>
            </div>
		</div>

    <script src="js/jquery.min.js"></script>
    <script src="js/demo.js"></script>
    <script src="js/easings.js"></script>
    <script src="js/demo6.js"></script>
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
                        $('.result').html('<div class="error">لینک را درست وارد کنید</div>');
                },'json');
            });
        });
    </script>
	</body>
</html>