<?php
	session_start();
include 'libraries.php';
if($_SERVER['REQUEST_METHOD'] == 'GET' and 
	isset($_SESSION['login']) and isset($_SESSION['passwd']) and
	$_SESSION['login']=="admin" && 
		$_SESSION['passwd']=="123456789"){
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
  <a href="index.php"><h1>PHP & MySQL: My project</h1></a>
	<?php
  	$db = dbConnect();
	addm();
	?>
</header>
<nav>
<ul class="menu">
	<li><a href="index.php">Home page</a></li>
</ul> 
</nav>