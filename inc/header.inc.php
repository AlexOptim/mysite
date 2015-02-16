<?php
	session_start();
	if(!isset($_SESSION['leng'])){
		$_SESSION['leng'] = 'eng';
	}else{
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['leng'])){
				$_SESSION['leng'] = $_GET['leng'];
			}
		}
	}
	if(!isset($_SESSION['reg'])){
		$_SESSION['reg'] = 0;
	}
include 'libraries.php';
$r = 0;
$ml = '';
$db = dbConnect();
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_SESSION['login']) and isset($_SESSION['passwd'])){
	   foreach($db->query("SELECT * FROM users") as $row) {
    		if($row['login'] == $_SESSION['login'] && $row['password'] == $_SESSION['passwd']){
      		$r = 1;
      		$ml = $_SESSION['login'];
  		}
	}
}
if ($r == 1){
	@$id = strtolower(cleanStr($_GET['id']));
	}
	else $id='';
?>
<html>
<head>
 <meta http-equiv="content-type" charset="utf-8" />
 <link href="style.css" rel="stylesheet" />
 <link href="css/left_panel.css" rel="stylesheet" type="text/css">
 <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="js/main.js" type="text/javascript"></script>
<script src="js/left_panel.js" type="text/javascript"></script>
</head>
<body>
<header>
  <a href='index.php<?php echo "?leng={$_SESSION['leng']}";?>'><h1><?php echo mt('Site title');?></h1></a>
  <div id='leng'>
  	<?php echo $_SESSION['leng'];
  	if($_SERVER['QUERY_STRING'] != ''){
   	echo "<a href='{$_SERVER['REQUEST_URI']}&leng=ukr'><img src='images/ukr.png' alt='ukr'></a>
  	<a href='{$_SERVER['REQUEST_URI']}&leng=eng'><img src='images/eng.png' alt='eng'></a>"; 		
  		}else{
  	echo "<a href='{$_SERVER['REQUEST_URI']}?leng=ukr'><img src='images/ukr.png' alt='ukr'></a>
  	<a href='{$_SERVER['REQUEST_URI']}?leng=eng'><img src='images/eng.png' alt='eng'></a>
  </div>";}?>
  </div>
	<?php
	addm($db);
	?>
</header>
<nav>
<ul class="menu">
	<li><a href='index.php<?php echo "?leng={$_SESSION['leng']}";?>'><?php echo mt('Menu tab1');?></a></li>
	<li><a href="profillist.php<?php echo "?leng={$_SESSION['leng']}";?>"><?php echo mt('Menu tab2');?></a></li>
	<?php
	if(chekRoll($ml, $db) == 'admin'){
	echo "<li><a href='lengEdit.php?leng={$_SESSION['leng']}'>", mt('Menu tab3'), "</a></li>";
	}
	?>
</ul> 
</nav>
<!--left_panel start -->
<div id="right_small_div">	<!-- Маленький	блок, в котором находится кнопка показа/скрытия панели -->	
	<div id="main_big_div"> <!-- Большой блок, в котором находится форма для ввода и отправки информации -->
		 <form name="form1" action="reg.php" method="post">
			<table style="width:250px; text-align:right">
				<tbody>
					<p><label><?php echo mt('Login');?>:<br></label>
				    <input name="login" type="text" size="15" maxlength="15" value=""></p>
				    <p><label><?php echo mt('Password')?>:<br></label>
				    <input name="password" type="password" size="15" maxlength="15"></p>
				    <p><label><?php echo mt('Repeat password')?>:<br></label>
				    <input name="passwordRep" type="password" size="15" maxlength="15"></p>
				    <p><label><?php echo mt('Your e-mail')?>:<br></label>
				    <input name="email" type="text" size="20" maxlength="20" value=""</p>
				    <input name="avatar" type="hidden" value="images/avatar.png">
				    <input name="dateReg" type="hidden" size="20" value='<?php echo date("d-m-Y");?>'>
				    <input name="dateLog" type="hidden" size="20" value="<?php echo date('d-m-Y');?>">
				    <input name="Roll" type="hidden" size="20" value='user'>
				    <p><input class='loginR' type="submit" name="submit" value="<?php echo mt('Sign up')?>">
				</tbody>
			</table>
		</form> 
		<!-- Конец формы -->
		
	</div>
	<img id="SlideButton" src="images/feedback.png" alt="Обратная связь" onclick="Slide()"/> <!-- Кнопка показа/cкрытия панели -->

</div>
<!--left_panel finish -->

<?php //print_r($_SESSION);?>