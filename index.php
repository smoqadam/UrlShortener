<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
		<title> کوتاه کننده لینک </title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
		<script src="js/jquery.min.js"></script>
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
	</head>
	<body>
	<div class="title">
		<H1> کوتاه کننده لینک </h1>
	</div>
	    <div class="main">
			<form id="frm1" action="" method="post">
				<h2>لینک را در کادر زیر وارد کنید : </h2> <br>
				<input type="text" id="url" name="url" /><br />
				<button class="btn">ساخت آدرس </button>
			</form>
	    </div>
		<div class="result">
		</div>
		<div class="footer">
			<div>Created By : <a href="http://cotint.ir" target="_blank" > COTINT.ir </a></div>
		</div>
	</body>
</html>