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
</header>
<nav>
<ul class="menu">
  <li><a href="index.php">Home page</a></li>
</ul> 
</nav>
<div id="wraper">
  <section class='loginFon'>
  <form id = "loginForm"action="save_user.php" method="post">
    <p><label>Логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15"></p>
    <p><label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15"></p>
    <p><label>Повторіть пароль:<br></label>
    <input name="password" type="passwordRep" size="15" maxlength="15"></p>
    <p><label>Ваш e-mail:<br></label>
    <input name="email" type="text" size="20" maxlength="20"></p>
    <p><input class='loginR' type="submit" name="submit" value="Зареєструваться">
    </p></form>
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>