<?php
$from = 0; 
$col_article = 10; 
$to = $from + $col_article; 
$db = dbConnect();
$query=$db->query("SELECT COUNT(*) as count FROM articles");
$query->setFetchMode(PDO::FETCH_ASSOC);
$row=$query->fetch();
$members=$row['count'];
if($members<=$col_article){
	frontdbRead($db);
}else{
if (isset($_GET['from']) and isset($_GET['to'])){
	$from = $_GET['from'];
	$to = $_GET['to'];
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
  	if($row['title']!=null)
  	{
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
echo "<div class='navigation'>";
for($j = 0; $j < $col_str; $j++)
{
 $number = $j + 1;
 $new_from = $j*$col_article;
 $new_to = $new_from + $col_article;
 if($from/$col_article != ($number-1)){
 	echo '<a href="../mysite/index.php?from='.$new_from.'&to='.$new_to.'">'.$number.' </a>';
 }else{
 	echo '<span>'.$number.' </span>';
 }
}
echo "</div>";
}
?>
