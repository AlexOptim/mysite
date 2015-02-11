<?php
 # підключаємося до бази даних 
function dbConnect(){
	$dbUser='root';
	$dbPass='111';
	$db = new PDO('mysql:host=localhost;dbname=test_alex;charset=utf8', $dbUser, $dbPass);
	try {
	  $db->query(''); 
	  return $db;
	} catch(PDOException $ex) {
	    echo "An Error occured!";
	    some_logging_function($ex->getMessage());
	}
}
 # підключаємося до бази даних 
function dbAdd($title, $body, $date, $autor, $db){
	$result = $db->exec("INSERT INTO articles (title, body, date, autor) values ('$title', '$body', '$date', '$autor')");
	$insertId = $db->lastInsertId();
	//echo $insertId;    
}
function dbRedag($title, $body, $date, $autor, $idart, $db){
	$stmt = $db->prepare("UPDATE articles SET title=?, body=?, date=?, autor=?  WHERE id=?");
	$stmt->execute(array($title, $body, $date, $autor, $idart));
	$affected_rows = $stmt->rowCount();
}
function articleDbRead($idart, $db){
	foreach($db->query("SELECT * FROM articles WHERE id=$idart") as $row) {
    	echo "
    	<div class='article'>
    	{$row['title']}<br>
    	<span class='date'>{$row['date']}</span>
    	<span class='autor'>{$row['autor']}</span><br>
    	{$row['body']}<br>";
    if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
       if ($_SESSION['login']=="admin" && 
          $_SESSION['passwd']=="123456789"){
        echo "
      <a href='index.php?idart=$idart&id=redagart'>Edit</a>
      <a href='index.php?idart=$idart&id=deleteart'>Delete</a>
  			";
       }  
    }  	
    	echo "</div>"; 
    }
}
function frontdbRead($db){
	foreach($db->query('SELECT * FROM articles order by id DESC') as $row) {
  	$idart = $row['id'];
  	if (strlen($row['body'])>150){
  	$bo = substr($row['body'], 0, 150);
  	$i = strlen($bo)-1;
  	$k = 0;
    	while($i>0){
    		if ($bo[$i] == '.'){
    			$k = $i+1;
    			break;
    		}
    		$i --;
    	}
    $bod = substr($row['body'], 0, $k).'..';
  	} else {
  		$bod = $row['body'];
  	}
  	echo "
  	<div class='lineFav'>
  	<a href='page.php?idart=$idart'>{$row['title']}</a><br>
  	<span class='date'>{$row['date']}</span>
  	<span class='autor'>{$row['autor']}</span><br>
  	$bod<br>";
  if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
     if ($_SESSION['login']=="admin" && 
        $_SESSION['passwd']=="123456789"){
        echo "
  			<a href='index.php?idart=$idart&id=redagart'>Edit</a>
        <a href='index.php?idart=$idart&id=deleteart'>Delete</a>
    			";
         }  
     }
    echo "<a href='page.php?idart=$idart' class='readMore'>Read More</a><br>";
  	echo "</div>"; 
  }
}
function addm(){
  if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
  if ($_SESSION['login']=="admin" && $_SESSION['passwd']=="123456789"){}
  else {
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
		 $_SESSION['login']=$_GET['login']; 
		 $_SESSION['passwd']=$_GET['passwd']; 
		  if ($_GET['login']=="admin" && 
			  $_GET['passwd']=="123456789") {
		} else {
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
     $_SESSION['login']=$_GET['login']; 
     $_SESSION['passwd']=$_GET['passwd']; 
      if ($_GET['login']=="admin" && 
          $_GET['passwd']=="123456789") {       
      }else {
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
}
function addArt(){
    if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
     if ($_SESSION['login']=="admin" && 
          $_SESSION['passwd']=="123456789"){
      echo "<a href='index.php?id=articleAdd' class='aButton'>Add article</a>";
     }
  }
}
//ф-я для очищення і захисту введених даних
function cleanStr($data){
	return trim(strip_tags($data));
}
//ф-я для очищення і захисту введених даних
?>