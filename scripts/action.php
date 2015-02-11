<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="../style.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<div id="header"><h1>PHP & MySQL: My project</h1></div>
	<div id="example"></div>
	<div id="content">
<?php
	include "mysql_connect.php";
?>
<h1>------------------------------------------------------------------</h1>
<?php
/*//виборка таблиць
$table = mysql_query("SHOW TABLES;");
if (!$table){
		die(mysql_error());
}
while ($row = mysql_fetch_row($table)){
	echo "{$row[0]}<br>";

}*/
//показати вміст таблиці START
echo "
<div id='show_table'>
<form method='post' action=''> 
Виберить таблицю: <select size='1' name='dbTtable'>", 
		$table_form = mysql_query('SHOW TABLES;');
		if (!$table_form){
				die(mysql_error());
		}
		while($row = mysql_fetch_row($table_form)){
			echo "<option value='{$row[0]}'>{$row[0]}</option>";
			}
		echo "</select><br>
<input type='hidden' name='dbName' value='$dbName' />
<input type='submit' value='Переглянути таблицю'>
</form>";

	$dbTtable = $_REQUEST['dbTtable'];
	if ($dbTtable == false){
		$table = mysql_query("SHOW TABLES;");
		$row = mysql_fetch_row($table);
		$dbTtable = $row[0];
		}
		
	$result = mysql_query("SELECT * FROM $dbTtable");
echo "<table>";
echo "<tr class='tabG'><td>id</td><td>Ім'я</td><td>Прізвище</td></tr>";
while ($myrow = mysql_fetch_array($result)){
	echo "<tr>";
	echo "<td class='tabG'>", $myrow['id'], "</td>", "<td>", $myrow['first_name'], "</td>", "<td>", $myrow['last_name'], "</td><br>";
	echo "</tr>";
} 
echo "</table>";

//показати вміст таблиці FINISH
//додаємо запис до БД START
echo "</div><div id='edit'><h3>Добавити запис в БД</h3>
	<form method='post' action='add_in_table.php'> 
		Виберить таблицю: <select size='1' name='dbTtable'>", 
		$table_form = mysql_query('SHOW TABLES;');
		if (!$table_form){
				die(mysql_error());
		}
		while($row = mysql_fetch_row($table_form)){
			echo "<option value='{$row[0]}'>{$row[0]}</option>";
			}
		echo "</select><br>
		Введіть і'мя:
		<input type='text' size='30' name='first_name' /><br>
		Введіть прізвище: 
		<input type='text' size='30' name='last_name' /><br>
		<input type='hidden' name='dbName' value='$dbName' />
		<input type='submit' value='Добавити запис'>
		<input type='reset' value='Очистити і перезапустити' />
	</form>";
//додаємо запис до БД FINISH
//редагуємо записи в таблицях START
echo "<h3>Редагувати запис в БД</h3>", 
	"<form method='post' action='redag_table.php'> 
		Виберить таблицю: <select size='1' name='dbTtable'>", 
		$table_form = mysql_query('SHOW TABLES;');
		if (!$table_form){
				die(mysql_error());
		}
		while($row = mysql_fetch_row($table_form)){
			echo "<option value='{$row[0]}'>{$row[0]}</option>";
			}
		echo "</select><br>
		Введіть id:
		<input type='text' size='5' name='id' /><br>
		Введіть нове і'мя:
		<input type='text' size='30' name='first_name' /><br>
		Введіть нове прізвище: 
		<input type='text' size='30' name='last_name' /><br>
		<input type='hidden' name='dbName' value='$dbName' />
		<input type='submit' value='Змінити запис'>
		<input type='reset' value='Очистити і перезапустити' />
	</form>";
//редагуємо записи в таблицях FINISH
//видаляємо запис START
echo "<h3>Видалити запис з БД</h3>", 
	"<form method='post' action='delete_in_table.php'> 
		Виберить таблицю: <select size='1' name='dbTtable'>", 
		$table_form = mysql_query('SHOW TABLES;');
		if (!$table_form){
				die(mysql_error());
		}
		while($row = mysql_fetch_row($table_form)){
			echo "<option value='{$row[0]}'>{$row[0]}</option>";
			}
		echo "</select><br>
		Введіть id для видалення запису:
		<input type='text' size='5' name='id' /><br>
		<input type='hidden' name='dbName' value='$dbName' />
		<input type='submit' value='Видалити запис'>
		<input type='reset' value='Очистити і перезапустити' />
	</form></div>";
//видаляємо запис FINISH

mysql_close($myConnect);
?>


</div>
<div id="footer"></div>
</body>
</html>
