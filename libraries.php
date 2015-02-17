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
function dbAdd($titleeng, $bodyeng, $titleukr, $bodyukr, $date, $autor, $db){
	$result = $db->exec("INSERT INTO articles (titleeng, bodyeng, titleukr, bodyukr, date, autor) 
                        values ('$titleeng', '$bodyeng', '$titleukr', '$bodyukr', '$date', '$autor')");
	$insertId = $db->lastInsertId();
}
/*************for translite******************/
function mt($word){
  $ses = $_SESSION['leng'];
  $db = dbConnect();
  foreach($db->query("SELECT original, $ses FROM sistemLeng WHERE original = '$word'") as $row) {
  return $word = $row["$ses"];
  }
}
function saveLengSistem($original, $eng, $ukr, $db){
  $stmt = $db->prepare("UPDATE sistemLeng SET eng=?, ukr=? WHERE original=?");
  $stmt->execute(array($eng, $ukr, $original));
  $affected_rows = $stmt->rowCount();
}
function loadLengSistem(){
  $db = dbConnect();
  $i = 0;
  echo "<form action='' method='POST'>
   <p>_________Original_____________________eng_____________________________ukr<br></p>";
  foreach($db->query("SELECT * FROM sistemLeng") as $row) {
    echo "
   <p><label class='lengLabel'>{$row['original']}</label>
    <input type='hidden'  name='original", $i, "' value='",$row['original'] ,"'>
    <input type='text' size='30' name='eng", $i, "' value='",$row['eng'] ,"'>................
    <input type='text' size='30' name='ukr", $i, "' value='",$row['ukr'] ,"'></p>";
    $i ++;
  }
  echo "
  <input type='hidden'  name='i' value='",$i ,"'>
  <p><input type='submit' value='", mt('Save'), "'></p>
  </form>";
}
/*************for translite******************/
/***************login************/
function addm($db){
if(isset($_POST['go'])){
  $login = $_POST['login'];
  foreach($db->query("SELECT * FROM users WHERE login='$login'") as $row){
    if(isset($row['login'])){
      if($row['password'] == md5($_POST['passwd'])){
        $r = $row['login'];
        $rol = chekRoll($r, $db);
        if($rol != 'bloked'){
      $_SESSION['login'] = $_POST['login'];
      }else{
        header('Location: bOut.php');
      }
    }
    }
  }
  if(!isset($_SESSION['login'])){
  echo "<span id='example'>", mt('Wrong input, try again'), "!</span>";
}
}
if(!isset($_SESSION['login'])){
  echo 
  "<div id='login'>
  <form method='POST'>
    ", mt('Login'), ": <input type=text name=login value=''>
    ", mt('Password'), ": <input type=password name=passwd>
    <input class='loginB' type=submit name=go value='",mt('GO') ,"'>
  </form>
  <a href='reg.php'>", mt('Registration'), "</a>
  </div>";
}else{
  $idart = chekID($_SESSION['login'], $db);
  echo "
  <div id='login'>
  ", mt('Profil'), ": <a href='profil.php?idart=$idart'>", $_SESSION['login'], "</a>
  <a href='logout.php'>", mt('Logout'), "</a>
  </div>";
}
}
/***************login************/
function userReg($login, $password, $email, $avatar, $dateReg, $dateLog, $Roll, $db){
  $p = 0;  
  foreach($db->query("SELECT * FROM users") as $row) {
    if($row['login'] != $login){
      if($row['email'] != $email){
        }else{
          $p = 1;
          echo mt('This email address is already in use'), "!";
        }
      }else{
        $p = 1;
        echo mt('This login already exists'), "!";
        break;
      }
  }
  if ($p == 0){
    $result = $db->exec("INSERT INTO users (login, password, email, avatar, dateReg, dateLog, Roll) 
                      values ('$login', '$password', '$email', '$avatar', '$dateReg', '$dateLog', '$Roll')");
  $_SESSION['login'] = $login;
  echo mt('You registered'), "!";
  header("refresh: 2; url='index.php'");
  exit; 
  }
}
function dbRedag($titleeng, $bodyeng, $titleukr, $bodyukr, $date, $autor, $idart, $db){
	$stmt = $db->prepare("UPDATE articles SET titleeng=?, bodyeng=?, titleukr=?, bodyukr=?, date=?, autor=?  WHERE id=?");
	$stmt->execute(array($titleeng, $bodyeng, $titleukr, $bodyukr, $date, $autor, $idart));
	$affected_rows = $stmt->rowCount();
}
function articleDbRead($idart, $db){
	foreach($db->query("SELECT * FROM articles WHERE id=$idart") as $row) {
    	$avtor = $row['autor'];
      $idavt = chekId($avtor, $db);
      $title = 'title'.$_SESSION['leng'];
      $body = 'body'.$_SESSION['leng'];
      echo "
    	<div class='article'>
    	<h2>{$row[$title]}</h2>
      <span class='date'>{$row['date']}</span>
      <span class='autor'><a href='profil.php?idart=$idavt'>{$row['autor']}</a></span>
    	{$row[$body]}<br>";
  if(isset($_SESSION['login'])){
      echo ratingWrite($idart, $db) ,"
      <span class='raitings'>", ratingRead($idart, $db), "</span><br>";
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
      if($_SESSION['login'] == $avtor){ 
        echo 
      "<a href='index.php?idart=$idart&id=redagart'>", mt('Edit'), "</a>
      <a href='index.php?idart=$idart&id=deleteart'>", mt('Delete'), "</a>
          ";
       }else{
        if($roll == 'admin'){
          echo "
        <a href='index.php?idart=$idart&id=redagart'>", mt('Edit'), "</a>
        <a href='index.php?idart=$idart&id=deleteart'>", mt('Delete'), "</a>
          ";
        }
       }
 }
    	echo "</div>";
          if($_SERVER['REQUEST_METHOD'] == 'POST'){
      if( isset($_POST['titlecomment']) or isset($_POST['bodycomment'])){
      $titlecomment = $_POST['titlecomment'];
      $bodycomment = $_POST['bodycomment'];
      $ids = $_POST['ids'];
      $autorcomment = $_POST['autorcomment'];
      $datecomment = $_POST['datecomment'];
      addComents($titlecomment, $bodycomment, $ids, $autorcomment, $datecomment, $_SESSION['leng']);
    }
  }
      if(isset($_SESSION['login'])){
        echo "
      <div id='comments'>
      <h2>", mt('Comments'), "</h2>
      <form action='' method='POST'>
        <p>", mt('Title'), ":<br>
        <input name='titlecomment' type='text' size='35' maxlength='50'></p><br>
        <textarea cols='50' rows='10' name='bodycomment'></textarea>
        <input name='ids' type='hidden' value='", $idart, "'>
        <input name='autorcomment' type='hidden' size='25' value='", $_SESSION['login'], "'>
        <input name='datecomment' type='hidden' size='20' value='", date("d-m-Y"), "'>
        <p><input class='loginR' type='submit' name='submit' value='", mt('Add'),"'>
        </p></form>
        ", showComments($idart, $_SESSION['leng']),"
      </div>"; 
    }else{
	echo "<div id='comments'>
      <h2>", mt('Comments'), "</h2>
      ", showComments($idart, $_SESSION['leng']),"
      </div>";
	}
  }
}
/********************ratings****************************/
function ratingRead($idart, $db){
  $query=$db->query("SELECT COUNT(*) as count FROM ratings WHERE idarticles='$idart'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $row=$query->fetch();
  $countrating=$row['count'];
  if($countrating == 0){
    echo mt('For this item is no vote'), ".";
  }else{
  $k = 0;
  foreach($db->query("SELECT * FROM ratings WHERE idarticles=$idart") as $row) {
    $k = $k+$row['ratingart'];
  }
  $k = $k/$countrating;
  echo mt('The average score of the material'), ": <i style='color: red'>", round($k, 3), "</i> ";
  echo mt('How many votes'), ": <i style='color: red'>$countrating</i>";
  }
}
function ratingWrite($idart, $db){
  $aut = 0;
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
  if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['rat'])) {
  $rat = $_POST['rat'];
  $log = $_SESSION['login'];
  echo mt('Thank you for your vote'), "!";
  $result = $db->exec("INSERT INTO ratings (idarticles, ratingart, ratingautor) 
                      values ('$idart', '$rat', '$log')");

    }
  foreach($db->query("SELECT * FROM ratings WHERE idarticles=$idart") as $row) {
    if($_SESSION['login'] == $row['ratingautor']){
      $aut = 1;
      $id = $row['id'];
      $ocz = $row['ratingart'];
    }
  }
  $query=$db->query("SELECT COUNT(*) as count2 FROM ratings WHERE idarticles='$idart'");
  $query->setFetchMode(PDO::FETCH_ASSOC);
  $row=$query->fetch();
  $cou=$row['count2'];
  if($aut == 1){
    echo "<br><div class='hr'></div>";
    echo mt('Your grade material'), ": $ocz";
    echo "&nbsp&nbsp&nbsp<a href='index.php?idrating=$id&id=deleterait'>", mt('Delete'), "</a>";
  }elseif($roll == 'admin' and $cou !=0){
    echo "<br><div class='hr'></div>";
    echo mt('Delete all ratings'), " - ";
    echo "&nbsp&nbsp&nbsp<a href='index.php?idartr=$idart&id=deleteraitall'>", mt('Delete'), "</a>";
  }else{
  echo "
<br><div class='hr'></div>
<form action='' method='POST'>
<span>
1&nbsp&nbsp&nbsp2&nbsp&nbsp3&nbsp&nbsp&nbsp4&nbsp&nbsp5<br>
<input type='radio' name='rat' value='1'checked>
<input type='radio' name='rat' value='2'>
<input type='radio' name='rat' value='3'>
<input type='radio' name='rat' value='4'>
<input type='radio' name='rat' value='5'>
<input class='loginR' type='submit' name='submit' value='", mt('Vote'), "'>
</span>
</form>
  ";
  }
}
/********************ratings****************************/
function addComents($titlecomment, $bodycomment, $ids, $autorcomment, $datecomment, $leng){
  $db = dbConnect();
  $result = $db->exec("INSERT INTO comments (ids, titlecomment, bodycomment, autorcomment, datecomment, lenguage) 
                        values ('$ids', '$titlecomment', '$bodycomment', '$autorcomment', '$datecomment', '$leng')");
}
function showComments($idcoment, $leng){
	$fcom = 0; 
	$col_article = 10; 
	$to = $fcom + $col_article; 
	$db = dbConnect();
	$query=$db->query("SELECT COUNT(*) as count FROM comments WHERE ids='$idcoment' AND lenguage='$leng' order by id DESC");
	$query->setFetchMode(PDO::FETCH_ASSOC);
	$row=$query->fetch();
	$members=$row['count'];
	if($members<=$col_article){
		showAllComments($idcoment, $leng);
	}else{
	if (isset($_GET['fcom'])){
		$fcom = $_GET['fcom'];
		$to = $_GET['fcom']+$col_article;
	}
	$col_str=$members%$col_article;
	$col_str=$members-$col_str;
	$col_str=($col_str/$col_article)+1;
	foreach($db->query("SELECT * FROM comments WHERE ids='$idcoment' AND lenguage='$leng' order by id DESC limit $fcom, $to") as $row){
  	if (strlen($row['titlecomment']) == 0 or $row['titlecomment'] == ' '){
  	$bo = substr($row['bodycomment'], 0, 15);
  	$i = strlen($bo)-1;
  	$k = 0;
    	while($i>0){
    		if ($bo[$i] == ' '){
    			$k = $i+1;
    			break;
    		}
    		$i --;
    	}
    $title = substr($bo, 0, $k).'...';
  	} else {
  		$title = $row['titlecomment'];
  	}
    $idavt = chekId($row['autorcomment']);
    $id = $row['id'];
      echo "
      <div class='article'>
      <h3>$title</h3>
      <span class='date'>{$row['datecomment']}</span>
      <span class='autor'><a href='profil.php?idart=$idavt'>{$row['autorcomment']}</a></span><br>
      {$row['bodycomment']}<br>";
    if (isset($_SESSION['login'])){ 
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
      if($roll == 'admin'){ 
        echo "
        <a href='index.php?idcom=$id&id=deletecom'>", mt('Delete'), "</a>
          ";
       } 
    } 
   echo "</div>"; 
	}
	echo "<div class='navigation'>";
	for($j = 0; $j < $col_str; $j++)
	{
	 $number = $j + 1;
	 $new_from = $j*$col_article;
	 $new_to = $new_from + $col_article;
	 if($fcom/$col_article != ($number-1)){
		echo "<a href='../mysite/page.php?idart=$idcoment&fcom=$new_from'>$number</a>";
	 }else{
		echo '<span>'.$number.' </span>';
	 }
	}
	echo "</div>";
	}
}
function showAllComments($idcoment, $leng){
  $db = dbConnect();
	foreach($db->query("SELECT * FROM comments WHERE ids='$idcoment' AND lenguage='$leng' order by id DESC") as $row) {
  	if (strlen($row['titlecomment']) == 0 or $row['titlecomment'] == ' '){
  	$bo = substr($row['bodycomment'], 0, 15);
  	$i = strlen($bo)-1;
  	$k = 0;
    	while($i>0){
    		if ($bo[$i] == ' '){
    			$k = $i+1;
    			break;
    		}
    		$i --;
    	}
    $title = substr($bo, 0, $k).'...';
  	} else {
  		$title = $row['titlecomment'];
  	}
    $idavt = chekId($row['autorcomment']);
    $id = $row['id'];
      echo "
      <div class='article'>
      <h3>$title</h3>
      <span class='date'>{$row['datecomment']}</span>
      <span class='autor'><a href='profil.php?idart=$idavt'>{$row['autorcomment']}</a></span><br>
      {$row['bodycomment']}<br>";
    if (isset($_SESSION['login'])){ 
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
      if($roll == 'admin'){ 
        echo "
        <a href='index.php?idcom=$id&id=deletecom'>", mt('Delete'), "</a>
          ";
       } 
    } 
   echo "</div>"; 
  }
}
function addArt($db){
  if(isset($_SESSION['login'])){
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
      if ($roll == 'redactor' or $roll == 'admin'){
      echo "<a href='index.php?id=articleAdd' class='aButton'>", mt('Add article'), "</a>";
     }
   }
}
//ф-я для очищення і захисту введених даних
function cleanStr($data){
	return trim(strip_tags($data));
}
function addDateLog($idus, $dateL, $db){
  $stmt = $db->prepare("UPDATE users SET dateLog=?  WHERE id=?");
  $stmt->execute(array($dateL, $idus));
  $affected_rows = $stmt->rowCount();
}
//ф-я для очищення і захисту введених даних
function writeOllProf($db){
 echo "<div class='article'>";
 foreach($db->query("SELECT id, login, email FROM users") as $row) {
    $idart = $row['id'];
  echo "
      <a href='profil.php?idart=$idart'>{$row['login']}</a>";
      if (isset($_SESSION['login'])){
        $p = $_SESSION['login'];
        $roll = chekRoll($p, $db);
        if($roll == 'admin'){
        echo "
      <span class='prof'>
      <a href='index.php?idart=$idart&id=redagprof'>", mt('Edit profile'), "</a>
      <a href='index.php?idart=$idart&id=deleteprof'>", mt('Delete'), "</a>
      </span><br>";
       }  
     }
 }
 echo "</div>"; 
}
function writeProf($idart, $db){
 foreach($db->query("SELECT * FROM users WHERE id = $idart") as $row) {
echo "
    <h2>{$row['login']}</h2>
    <img class='p150x150' src='{$row['avatar']}'>
    <p>",mt('Surname') ,": {$row['surname']}</p>
    <p>",mt('Name') ,": {$row['name']}</p>
    <p>",mt('Date of registration') ,": {$row['dateReg']}</p>
    <p>",mt('Last login date') ,": {$row['dateLog']}</p>";
    $email = $row['email'];
    $rolUser = $row['Roll'];
    if(isset($_SESSION['login'])){
    $idu = chekId($_SESSION['login']);
      echo "
    <p>Email: $email</p><br>";
      $log = $_SESSION['login'];
      $rol = chekRoll($log, $db);
    if($idu == $idart or $rol == 'admin'){
      echo "
    <p>", mt('Roll'), ": $rolUser</p><br>
    <span class='profButtons'>
      <a href='index.php?idart=$idart&id=redagprof'>", mt('Edit profile'), "</a>
      <a href='index.php?idart=$idart&id=deleteprof'>", mt('Delete'), "</a>
    </span>";}
     }  
 }
}
function profRedag($login, $avatar, $surname, $name, $email, $roll, $idart, $db){
  $stmt = $db->prepare("UPDATE users SET login=?, avatar=?, surname=?, name=?, email=?, Roll=?  WHERE id=?");
  $stmt->execute(array($login, $avatar, $surname, $name, $email, $roll, $idart));
  $affected_rows = $stmt->rowCount();
}
function chekRoll($log, $db){
  foreach($db->query("SELECT * FROM users WHERE login = '$log'") as $row) {
  return $rol = $row['Roll'];
 }
}
function chekId($log){
  $db = dbConnect();
  foreach($db->query("SELECT * FROM users WHERE login = '$log'") as $row) {
  return $id = $row['id'];
 }
}
?>
