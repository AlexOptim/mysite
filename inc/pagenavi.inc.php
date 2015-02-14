<?php
$from = 0; 
$col_article = 10; 
$to = $from + 10; 
$db = dbConnect();
$query=$db->query("SELECT COUNT(*) as count FROM articles");
$query->setFetchMode(PDO::FETCH_ASSOC);
$row=$query->fetch();
$members=$row['count'];
if($members<=$col_article){
	frontdbRead($db);
}else{
if (isset($_GET['from'])){
	$from = $_GET['from'];
	$to = $_GET['from']+10;
}
$col_str = $members / $col_article;
$col_str=$members%$col_article;;
$col_str=$members-$col_str;
$col_str=($col_str/$col_article)+1;
$result = $db->query("SELECT * FROM articles order by id DESC limit $from, $to");
for($z = 0; $z < ($to - $from); $z++)
{
 $row = $result->fetch();
  	$idart = $row['id'];
    $title = 'title'.$_SESSION['leng'];
    $body = 'body'.$_SESSION['leng'];
  	if($row[$title]!=null)
  	{
  	if (strlen($row[$body])>150){
  	$bo = substr($row[$body], 0, 150);
  	$i = strlen($bo)-1;
  	$k = 0;
    	while($i>0){
    		if ($bo[$i] == '.' or $bo[$i] == ' '){
    			$k = $i+1;
    			break;
    		}
    		$i --;
    	}
    $bod = substr($row[$body], 0, $k).'...';
  	} else {
  		$bod = $row[$body];
  	}
    $avtor = $row['autor'];
    $idavt = chekId($avtor, $db);
  	echo "
  	<div class='lineFav'>
  	<h3><a class='th3' href='page.php?idart=$idart'>{$row[$title]}</a></h3>
  	<span class='date'>{$row['date']}</span>
    <span class='autor'><a href='profil.php?idart=$idavt'>{$row['autor']}</a></span><br>
  	$bod<br>";
      $r = 0;
    if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
       foreach($db->query("SELECT * FROM users") as $row) {
    if($row['login'] == $_SESSION['login'] 
    && $row['password'] == $_SESSION['passwd']){
      $r = 1; 
  }}
  $l = $_SESSION['login'];
  $roll = chekRoll($l, $db);
      if($r == 1 && $_SESSION['login'] == $avtor){ 
        echo "
  			<a href='index.php?idart=$idart&id=redagart'>", mt('Edit'), "</a>
        <a href='index.php?idart=$idart&id=deleteart'>", mt('Delete'), "</a>
    			";
       }else{
        if($r == 1 && $roll == 'admin'){
          echo "
        <a href='index.php?idart=$idart&id=redagart'>", mt('Edit'), "</a>
        <a href='index.php?idart=$idart&id=deleteart'>", mt('Delete'), "</a>
          ";
        }
       }
     }
    echo "<a href='page.php?idart=$idart' class='readMore'>", mt('Read More'), "</a><br>";
  	echo "</div>";
}

}
echo "<div class='navigation'>";
for($j = 0; $j < $col_str; $j++)
{
 $number = $j + 1;
 $new_from = $j*$col_article;
 $new_to = $new_from + $col_article;
 if($from/$col_article != ($number-1)){
 	echo '<a href="../mysite/index.php?from='.$new_from.'">'.$number.' </a>';
 }else{
 	echo '<span>'.$number.' </span>';
 }
}
echo "</div>";
}
?>
