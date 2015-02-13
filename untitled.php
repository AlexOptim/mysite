<?
	 if (!isset($_GET['go'])){
		echo "
		<div id='login'>
		<form>
		  Login: <input type=text name=login value='{$_SESSION['login']}'>
		  Password: <input type=password name=passwd>
		  <input class='loginB' type=submit name=go value='GO'>
		</form>
    <a href='reg.php'>Registration</a>
		</div>";
  	} else {
      $r = 0;
       foreach($db->query("SELECT * FROM users") as $row) {
        if($row['login'] == $_GET['login'] && $row['password'] == $_GET['passwd']){$r = 1;}}
      if ($r == 1){} 
        else {
			echo "
				<div id='login'>
				<form>
				  Login: <input type=text name=login value='{$_SESSION['login']}'>
				  Password: <input type=password name=passwd>
				  <input class='loginB' type=submit name=go value='GO'>
				</form>
        <a href='reg.php'>Registration</a>
				</div>";
			echo "<div id='example'><br>Wroning input, try again<br></div>";
		    }
			}
		}         
  else {
  if (!isset($_GET['go'])){
    echo "
    <div id='login'>
    <form>
      Login: <input type=text name=login>
      Password: <input type=password name=passwd>
      <input class='loginB' type=submit name=go value='GO'>
    </form>
    <a href='reg.php'>Registration</a>
    </div>";
  }else {
      $r = 0;
       foreach($db->query("SELECT * FROM users") as $row) {
        if($row['login'] == $_GET['login'] && $row['password'] == $_GET['passwd']){$r = 1;}}
      if ($r == 1){} 
        else {
      echo "
    <div id='login'>
    <form>
      Login: <input type=text name=login value='{$_SESSION['login']}'>
      Password: <input type=password name=passwd>
      <input class='loginB' type=submit name=go value='GO'>
    </form>
    <a href='reg.php'>Registration</a>
    </div>";
      	echo "<div id='example'><br>Wroning input, try again<br></div>";
     }
   }   
  }      
  ?>