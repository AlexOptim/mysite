<!DOCTYPE html>
<html>
<head>
	<title>Новий сайт для відеокурса </title>
	<meta charset="UTF-8">
	<link href="style.css" rel="stylesheet" type="text/css">
	<link href="css/left_panel.css" rel="stylesheet" type="text/css">
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
	<!-- begin gallery  -->
		<div class="formHide">Згорнути форму</div>
				<div class="formHide" style="display:none;">Розгорнути форму</div>
				<div id="slide">
				<div id="front_bottom">
					<div class="port_front">
					<a href="images/up.jpg"><img id="ing_logo_1" src="images/up.jpg" alt="Web studio ALove"/></a></div>
					<div class="port_front">
					<a href="images/nemo.jpg"><img id="ing_logo_2" src="images/nemo.jpg" alt="Web studio ALove"/></a></div>
					<div class="port_front">
					<a href="images/walle.jpg"><img id="ing_logo_3" src="images/walle.jpg" alt="Web studio ALove"/></a></div>
					<div class="port_front">
					<a href="images/toystory.jpg"><img id="ing_logo_4" src="images/toystory.jpg" alt="Web studio ALove"/></a></div>
				</div>
				<div id="galerry">
			<img id="ing_slide" src="images/kino.jpg" alt="Web studio ALove"/>
			</div>
			</div>
			<!-- end gallery -->
		<div id="about">
								
	</div>
	<div id="content">	
			<div id="section" class="front">
				<div id="circles">
				<div class="circle"><br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan varius venenatis.</div>
				<div class="circle"><br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan varius venenatis.</div>
				<div class="circle"><br><br>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan varius venenatis.</div>
				</div>
				
				<div id="front_midle">
				Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam accumsan varius venenatis. Aliquam consequat rutrum lacus, ac eleifend augue. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas. Phasellus sed auctor metus. Sed dui diam, iaculis vel venenatis eget, ullamcorper blandit mauris. Nulla sed ultricies ante. Suspendisse ut laoreet arcu. Praesent ante libero, volutpat quis ligula in, luctus pellentesque dui. Fusce scelerisque porttitor tincidunt. Vivamus pellentesque urna dui, a ultrices nibh suscipit vitae. Nulla dapibus lobortis scelerisque.

				Sed sapien mauris, elementum tincidunt lacus nec, accumsan ornare metus. Phasellus imperdiet augue at vehicula mattis. Cras sit amet ipsum imperdiet mauris suscipit rutrum. Etiam ac sapien feugiat, adipiscing augue et, feugiat purus. Sed semper eget ligula et elementum. Sed eu quam neque. Aliquam sagittis, velit fermentum consequat tincidunt, dui mi pretium orci, id placerat urna turpis sed sapien. Cras pretium et urna vel faucibus. Aliquam nec commodo augue. Aliquam blandit feugiat mauris quis semper. Fusce tristique iaculis turpis vestibulum sollicitudin. Aliquam eu velit vitae nibh gravida varius vitae et massa. Morbi bibendum quam arcu, et condimentum mauris ornare ut. Mauris sagittis nec mi id blandit. Nulla vestibulum arcu quis commodo consequat. Morbi nec magna ultricies, consequat sapien ac, fringilla justo.

				Aenean sed quam quis eros lobortis semper eget vel dolor. Sed a ipsum dignissim, bibendum dolor sit amet, tempus diam. Nulla tristique id magna nec vestibulum. Fusce ut massa odio. Etiam nec tempor sapien. In scelerisque consectetur sem, placerat lobortis ante suscipit nec. Sed non interdum augue. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. In facilisis lacinia leo, laoreet pretium purus convallis quis. Proin sed augue ut velit vehicula tincidunt eu sit amet orci. Nunc ut risus ullamcorper, elementum tellus in, sodales felis. Vivamus malesuada sollicitudin urna, sed dapibus nisi posuere at. Fusce tempus est felis, quis eleifend metus iaculis a. Vestibulum pharetra magna nec neque interdum, id condimentum diam eleifend.
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