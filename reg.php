<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section class='loginFon'>
  <?php
  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	  $login = $_POST['login'];
	  $password = md5($_POST['password']);
	  $passwordRep = md5($_POST['passwordRep']);
	  $email = $_POST['email'];
	  $avatar = $_POST['avatar'];
	  $dateReg = $_POST['dateReg'];
	  $dateLog = $_POST['dateLog'];
	  $Roll = $_POST['Roll'];
	  if (isset($login) and isset($password) and isset($passwordRep) and isset($email) and $password != ''){
		if ($password != $passwordRep){
		  echo mt('Passwords do not match');
		  }else{
		  	 $db = dbConnect();
			 userReg($login, $password, $email, $avatar, $dateReg, $dateLog, $Roll, $db);
		  }
	  }else{
		echo mt('Completed, not all fields');
	  }
  }else{
	  $login = '';
	  $email = '';
  }
  ?>
  <form id = "loginForm" action="" method="post">
    <p><label><?php echo mt('Login')?>:<br></label>
    <input name="login" type="text" size="15" maxlength="15" value="<?php echo $login;?>"></p>
    <p><label><?php echo mt('Password')?>:<br></label>
    <input name="password" type="password" size="15" maxlength="15"></p>
    <p><label><?php echo mt('Repeat password')?>:<br></label>
    <input name="passwordRep" type="password" size="15" maxlength="15"></p>
    <p><label><?php echo mt('Your e-mail')?>:<br></label>
    <input name="email" type="text" size="20" maxlength="20" value="<?php echo $email;?>"</p>
    <input name="avatar" type="hidden" value="images/avatar.png">
    <input name="dateReg" type="hidden" size="20" value='<?php echo date("d-m-Y");?>'>
    <input name="dateLog" type="hidden" size="20" value="<?php echo date('d-m-Y');?>">
    <input name="Roll" type="hidden" size="20" value='user'>
    <p><input class='loginR' type="submit" name="submit" value="<?php echo mt('Sign up')?>">
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