<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php
	 $id = $_REQUEST['id'];
	 $first_name = $_REQUEST['first_name'];
	 $last_name = $_REQUEST['last_name'];
	 $table = $_REQUEST['dbTtable'];
	 $dbName = $_REQUEST['dbName'];
include "mysql_connect.php";
	 //додаємо записи в базу 
	 mysql_query("UPDATE $table SET first_name='$first_name', 
	 last_name='$last_name' WHERE id=$id");
echo "Запис успішно змінено!;
?>
