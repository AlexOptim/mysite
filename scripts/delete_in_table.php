<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
	 $id = $_REQUEST['id'];
	 $table = $_REQUEST['dbTtable'];
	 $dbName = $_REQUEST['dbName'];
include "mysql_connect.php";
	 //додаємо записи в базу
	 mysql_query("DELETE FROM $table WHERE id=$id");
echo "Запис успішно видалено!";
?>
