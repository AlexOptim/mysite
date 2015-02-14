<?php
	session_start();
	if(!isset($_SESSION['leng'])){
		$_SESSION['leng'] = 'ukr';
	}else{
	if($_SERVER['REQUEST_METHOD'] == 'GET'){
		if(isset($_GET['leng'])){
				$_SESSION['leng'] = $_GET['leng'];
			}
		}
	}
include 'libraries.php';
$r = 0;
$db = dbConnect();
if($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_SESSION['login']) and isset($_SESSION['passwd'])){
	   foreach($db->query("SELECT * FROM users") as $row) {
    		if($row['login'] == $_SESSION['login'] && $row['password'] == $_SESSION['passwd']){
      		$r = 1;
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
</head>
<body>
<header>
  <a href="index.php"><h1><?php echo mt('Site title');?></h1></a>
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
	<li><a href="index.php"><?php echo mt('Menu tab1');?></a></li>
	<li><a href="profillist.php"><?php echo mt('Menu tab2');?></a></li>
</ul> 
</nav>

<?php //print_r($_SERVER);?>