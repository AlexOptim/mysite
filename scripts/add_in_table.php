<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<?php

	 $first_name = $_REQUEST['first_name'];
	 $last_name = $_REQUEST['last_name'];
	 $table = $_REQUEST['dbTtable'];
	 $dbName = $_REQUEST['dbName'];
include "mysql_connect.php";
	 //додаємо записи в базу 
	 mysql_query("INSERT INTO $table(first_name, last_name) 
	 VALUES('$first_name','$last_name')");
echo "Запис успішно добавлено!";
?>