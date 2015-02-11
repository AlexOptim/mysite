<?php
$dbUser='root';
$dbPass='111';
$db = new PDO('mysql:host=localhost;dbname=test_alex;charset=utf8', $dbUser, $dbPass);
try {
  $db->query('Hello!'); 
} catch(PDOException $ex) {
    echo "An Error occured!";
    some_logging_function($ex->getMessage());
}
//////////////////////////////////////////////////
/*foreach($db->query('SELECT * FROM articles') as $row) {
    echo $row['title'].' '.$row['autor']; 
}*/
/////////////////////////////////////////////////
/*$title = 1;
$body = 2;
$date = 3;
$autor = 4;
$result = $db->exec("INSERT INTO articles (title, body, date, autor) values ('$title', '$body', '$date', '$autor')");
$insertId = $db->lastInsertId();
echo $insertId;*/
///////////////////////////////////////////////////
/*$title = 1;
$body = 2;
$date = 3;
$autor2 = 10;
$id = 64;
$stmt = $db->prepare("UPDATE articles SET autor=? WHERE id=?");
$stmt->execute(array($autor2, $id));
$affected_rows = $stmt->rowCount();*/
////////////////////////////////////////////////////////
/*$id = 64;
$stmt = $db->prepare("DELETE FROM articles WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->execute();
$affected_rows = $stmt->rowCount();*/
?>