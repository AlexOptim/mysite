<!DOCTYPE html>
<html>
<head>
	<title>Новий сайт для відеокурса </title>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="css/left_panel.css" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Roboto+Condensed:400,700&amp;subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
	<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<script src="js/main.js" type="text/javascript"></script>
	<script src="js/speed.js" type="text/javascript"></script>
	<script src="js/gallery.js" type="text/javascript"></script>
	<script src="js/hide_window.js" type="text/javascript"></script>
	<script src="js/left_panel.js" type="text/javascript"></script>
	
	<link rel="stylesheet" href="css/slide.css" type="text/css" media="screen" />

<!--[if lte IE 6]>
<script type="text/javascript" src="js/pngfix/supersleight-min.js"></script>
<![endif]-->

<script src="js/slide.js" type="text/javascript"></script>
	
		
</head>
<body>

<!-- Panel -->
<div id="toppanel">
	<div id="panel">
		<div class="content clearfix">
			<div class="left">
				<h1>Welcome to Web-Kreation</h1>
				<h2>Sliding login panel Demo with jQuery</h2>		
				<p class="grey">You can put anything you want in this sliding panel: videos, audio, images, forms... The only limit is your imagination!</p>
				<h2>Download</h2>
				<p class="grey">To download this script go back to <a href="http://web-kreation.com/index.php/tutorials/nice-clean-sliding-login-panel-built-with-jquery" title="Download">article &raquo;</a></p>
			</div>
			<div class="left">
				<!-- Login Form -->
				<form class="clearfix" action="#" method="post">
					<h1>Member Login</h1>
					<label class="grey" for="log">Username:</label>
					<input class="field" type="text" name="log" id="log" value="" size="23" />
					<label class="grey" for="pwd">Password:</label>
					<input class="field" type="password" name="pwd" id="pwd" size="23" />
	            	<label><input name="rememberme" id="rememberme" type="checkbox" checked="checked" value="forever" /> &nbsp;Remember me</label>
        			<div class="clear"></div>
					<input type="submit" name="submit" value="Login" class="bt_login" />
					<a class="lost-pwd" href="#">Lost your password?</a>
				</form>
			</div>
			<div class="left right">			
				<!-- Register Form -->
				<form action="#" method="post">
					<h1>Not a member yet? Sign Up!</h1>				
					<label class="grey" for="signup">Username:</label>
					<input class="field" type="text" name="signup" id="signup" value="" size="23" />
					<label class="grey" for="email">Email:</label>
					<input class="field" type="text" name="email" id="email" size="23" />
					<label>A password will be e-mailed to you.</label>
					<input type="submit" name="submit" value="Register" class="bt_register" />
				</form>
			</div>
		</div>
	</div> <!-- /login -->	

    <!-- The tab on top -->	
	<div class="tab">
		<ul class="login">
	    	<li class="left">&nbsp;</li>
	        <li>Hello Guest!</li>
			<li class="sep">|</li>
			<li id="toggle">
				<a id="open" class="open" href="#">Log In | Register</a>
				<a id="close" style="display: none;" class="close" href="#">Close Panel</a>			
			</li>
	    	<li class="right">&nbsp;</li>
		</ul> 
	</div> <!-- / top -->
	
</div> <!--panel -->
<!--left_panel start -->
<div id="right_small_div">	<!-- Маленький	блок, в котором находится кнопка показа/скрытия панели -->	
	<div id="main_big_div"> <!-- Большой блок, в котором находится форма для ввода и отправки информации -->
	
		<!-- Форма для ввода и отправки информации -->
		<!-- При изменении ширины (или высоты) формы автоматически изменяется ширина (или высота) блока -->
		<form name="form1" method="post">
			<table style="width:410px; margin:25px 25px 25px 25px; text-align:right">
				<tbody>
					<tr><td style="width:165px">Ваше ім'я:</td><td style="width:245px"><input type="text" name="username"/></td></tr>
					<tr><td>Місто:</td><td><input type="text" name="city"/></td></tr>
					<tr><td>E-mail:</td><td><input type="text" name="email"/></td></tr>
					<tr><td>Skype:</td><td><input type="text" name="skypeicq"/></td></tr>
					<tr><td>Адреса ВКонтакті:</td><td><input type="text" name="url"/></td></tr>
					<tr><td>Контактний телефон:</td><td><input type="text" name="phone"/></td></tr>
					<tr style="vertical-align:top"><td>Текст повідомлення:</td><td><textarea name="messagetext"></textarea></td></tr>
					<tr><td colspan="2">
					<input class="buttonForm" type="submit" name="send" value="Надіслати"/>
					<input class="buttonForm" type="reset" style="width:90px" value="Очистити"/></td></tr>
				</tbody>
			</table>
		</form>
		<!-- Конец формы -->
		
	</div>
	<img id="SlideButton" src="images/feedback.png" alt="Обратная связь" onclick="Slide()"/> <!-- Кнопка показа/cкрытия панели -->

</div>
<!--left_panel finish -->

		<div id="navigation">
		<div id="logo"> 
			<a href="#"><img id="ing_logo" src="images/logo.png" alt="Web studio ALove"/></a>
			</div>	
			<ul id="nav">
				<li><a href="index.php">ГОЛОВНА</a></li>
				<li><a href="#">ЗАМОВИТИ САЙТ</a></li>
				<li><a href="blog.php">БЛОГ</a></li>
			</ul>
			
		</div>
<div id="wraper">
		
	<div id="header">
		<div id="about">
		<p>Для перевырки шрифту потрыбно пыдыбрати текст, котрий зможе забезпечити як найкращу читабельнысть та розумыння змысту матерыалу та деъ, котры намагаэться донести автор поста.</p>
		</div>
						
	</div>
	<div id="content">	
		
<div id="section">
				<div id="wrap">
				<div id="date">17.08.2013</div>
				<a href="#"><h2>The crafted Post Title here</h2></a>
				<img id="img_wrap" src="images/fotolia.png" alt="" >
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis erat a felis commodo aliquam placerat ligula pulvinar. Etiam nibh metus, rhoncus adipiscing tristique non, gravida at est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 

					Vivamus et tellus quis velit blandit ornare. Vivamus diam felis, tincidunt vel vulputate consectetur, ultrices rhoncus tortor. 
					Ut dapibus ante non lectus ornare vehicula fermentum sodales nulla, in fermentum dui pretium non.</p>
				<button id="read_more">Читати далі . . .</button>
			</div>
			<div id="wrap">
				<div id="date">17.08.2013</div>
				<a href="#"><h2>The crafted Post Title here</h2></a>
				<img id="img_wrap" src="images/fotolia.png" alt="" >
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis erat a felis commodo aliquam placerat ligula pulvinar. Etiam nibh metus, rhoncus adipiscing tristique non, gravida at est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 

					Vivamus et tellus quis velit blandit ornare. Vivamus diam felis, tincidunt vel vulputate consectetur, ultrices rhoncus tortor. 
					Ut dapibus ante non lectus ornare vehicula fermentum sodales nulla, in fermentum dui pretium non.</p>
				<button id="read_more">Читати далі . . .</button>
			</div>
			<div id="wrap">
				<div id="date">17.08.2013</div>
				<a href="#"><h2>The crafted Post Title here</h2></a>
				<img id="img_wrap" src="images/fotolia.png" alt="" >
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. In lobortis erat a felis commodo aliquam placerat ligula pulvinar. Etiam nibh metus, rhoncus adipiscing tristique non, gravida at est. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. 

					Vivamus et tellus quis velit blandit ornare. Vivamus diam felis, tincidunt vel vulputate consectetur, ultrices rhoncus tortor. 
					Ut dapibus ante non lectus ornare vehicula fermentum sodales nulla, in fermentum dui pretium non.</p>
				<button id="read_more">Читати далі . . .</button>
			</div>
			<div id="navigation"></div>
		</div>
			
			<div id="sidebar_second">
				<div id="block">
					<h2 class="zag">Ціни</h2>
					<p class="p_nav">
					<b>Сайт "Візитка"</b><br> (мінімальний набір) - від <b>300</b> гр.
					 <br><br>Сайт "Візитка"+домен+хостинг - від 500 гр.
					 <br>Термін виконання від 7 днів.
					<br><br>
					 <b>Сайт "Блог"</b><br> (стандартний набір) - від <b>500</b> гр.
					 <br><br>Сайт "Блог"+домен+хостинг - від 700 гр.
					 <br>Термін виконання від 14 днів.
					 </p>
				</div>
				<div id="block">
				<h2 class="zag">Новини</h2>
				Morbi cursus magna non erat malesuada porttitor. Fusce interdum non neque at rutrum. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer aliquet sem elit, ut tempor dolor lobortis id. Nulla facilisi. In molestie justo ac adipiscing auctor. Fusce lacinia suscipit nunc id facilisis.
				</div>
				<div id="block">
				<h2 class="zag">Нове на сайті</h2>
				Cras vitae vestibulum quam. Curabitur interdum at tellus vel placerat. Vestibulum condimentum nibh non tincidunt convallis. Cras ornare porttitor lorem, a iaculis erat consectetur ac. Morbi porttitor nisl vel libero auctor, et fermentum est egestas. Ut congue arcu vitae lacus suscipit rutrum. Nullam ut mi a ipsum consequat pretium. Aliquam et convallis purus. Mauris quis suscipit nulla. Donec a sollicitudin enim. Suspendisse et iaculis tortor. Phasellus enim nulla, blandit a sapien quis, rhoncus porttitor nisl. Nam blandit at mauris vel sagittis.
				</div>	
			</div>
	</div>

		
</div>
</div>
<div id="footer">
		<div id="copyright">
		Виконано <a href="http://alove.besaba.com">Web studio ALove</a> © 2014
		</div>
</div>

</body>
</html>