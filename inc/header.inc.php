<?php
	session_start();
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
  <a href="index.php"><h1>PHP & MySQL: My project</h1></a>
	<?php
	addm($db);
	?>
</header>
<nav>
<ul class="menu">
	<li><a href="index.php">Home page</a></li>
	<li><a href="profillist.php">Profils</a></li>
</ul> 
</nav>