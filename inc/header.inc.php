<?php
	session_start();
	if(!isset($_SESSION['leng'])){
		$_SESSION['leng'] = 'eng';
	}else{
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['leng'])){
			if($_GET['leng'] == 'ukr' or $_GET['leng'] == 'eng'){
				$_SESSION['leng'] = $_GET['leng'];
			}
			}
		}
	}
include 'libraries.php';
$r = 0;
$db = dbConnect();
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_SESSION['login'])){
	$r = 1;
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
  		$st = explode('&', $_SERVER['QUERY_STRING']);
  		$st =  array_unique($st);
  		$st = implode("&", $st);
   	echo "<a href='{$_SERVER['SCRIPT_NAME']}?$st&leng=ukr'><img src='images/ukr.png' alt='ukr'></a>
  		  <a href='{$_SERVER['SCRIPT_NAME']}?$st&leng=eng'><img src='images/eng.png' alt='eng'></a>"; 		
  		}else{
  	echo "<a href='{$_SERVER['SCRIPT_NAME']}?leng=ukr'><img src='images/ukr.png' alt='ukr'></a>
  		  <a href='{$_SERVER['SCRIPT_NAME']}?leng=eng'><img src='images/eng.png' alt='eng'></a>
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
	if(isset($_SESSION['login'])){
		$ml = $_SESSION['login'];
	if(chekRoll($ml, $db) == 'admin'){
	echo "<li><a href='lengEdit.php?leng={$_SESSION['leng']}'>", mt('Menu tab3'), "</a></li>";
		}
	}
	?>
</ul> 
</nav>
<?php if(!isset($_SESSION['login'])){
	if($_SERVER['SCRIPT_NAME'] != '/mysite/reg.php'){
echo
"<div id='right_small_div'>		
	<div id='main_big_div'> 
		 <form name='form1' action='reg.php' method='post'>
			<table style='width:250px; text-align:right'>
				<tbody>
					<p><label>", mt('Login'), ":<br></label>
				    <input name='login' type='text' size='15' maxlength='15' value=''></p>
				    <p><label>", mt('Password'), ":<br></label>
				    <input name='password' type='password' size='15' maxlength='15'></p>
				    <p><label>", mt('Repeat password'), ":<br></label>
				    <input name='passwordRep' type='password' size='15' maxlength='15'></p>
				    <p><label>", mt('Your e-mail'), ":<br></label>
				    <input name='email' type='text' size='20' maxlength='20' value=''</p>
				    <input name='avatar' type='hidden' value='images/avatar.png'>
				    <input name='dateReg' type='hidden' size='20' value='", date('d-m-Y'), "'>
				    <input name='dateLog' type='hidden' size='20' value='", date('d-m-Y'), "'>
				    <input name='Roll' type='hidden' size='20' value='user'>
				    <p><input class='loginR' type='submit' name='submit' value='", mt('Sign up'), "'>
				</tbody>
			</table>
		</form> 
		
	</div>
	<div id='SlideButton' onclick='Slide()'>", mt('Registration'), "</div>  

</div>";
}
}?>

<pre>
<?php //print_r($_SERVER);?>
</pre>