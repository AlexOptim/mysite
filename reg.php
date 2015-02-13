<?php
  session_start();
include 'libraries.php';
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
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  $login = $_POST['login'];
	  $password = $_POST['password'];
	  $passwordRep = $_POST['passwordRep'];
	  $email = $_POST['email'];
	  $avatar = $_POST['avatar'];
	  $dateReg = $_POST['dateReg'];
	  $dateLog = $_POST['dateLog'];
	  $Roll = $_POST['Roll'];
	  if (isset($login) and isset($password) and isset($passwordRep) and isset($email) and $password != ''){
		if ($password != $passwordRep){
		  echo "Не співпадають паролі";
		  }else{
		  	 $db = dbConnect();
			 userReg($login, $password, $email, $avatar, $dateReg, $dateLog, $Roll, $db);
		  }
	  }else{
		echo "Заповнено не всі поля";
	  }
  }else{
	  $login = '';
	  $email = '';
  }
  ?>
  <form id = "loginForm" action="" method="post">
    <p><label>Логін:<br></label>
    <input name="login" type="text" size="15" maxlength="15" value="<?php echo $login;?>"></p>
    <p><label>Пароль:<br></label>
    <input name="password" type="password" size="15" maxlength="15"></p>
    <p><label>Повторіть пароль:<br></label>
    <input name="passwordRep" type="password" size="15" maxlength="15"></p>
    <p><label>Ваш e-mail:<br></label>
    <input name="email" type="text" size="20" maxlength="20" value="<?php echo $email;?>"</p>
    <input name="avatar" type="hidden" value="images/avatar.png">
    <input name="dateReg" type="hidden" size="20" value='<?php echo date("d-m-Y");?>'>
    <input name="dateLog" type="hidden" size="20" value="<?php echo date('d-m-Y');?>">
    <input name="Roll" type="hidden" size="20" value='user'>
    <p><input class='loginR' type="submit" name="submit" value="Зареєструваться">
    </p></form>
  </section>
  <aside>
       <?php 
        $db = dbConnect();
       addArt($db);
       ?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>