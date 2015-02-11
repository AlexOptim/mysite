<?php
$dbHost='localhost';
$dbName=$_REQUEST['dbName'];
$dbUser='root';
$dbPass='';


$myConnect = mysql_connect($dbHost, $dbUser, $dbPass)
or die("<p>Ошибка подключения к базе данных: " .
mysql_error() . "</p>");

mysql_select_db($dbName,$myConnect);//вибираємо нашу базу
echo "Базу: <b>$dbName</b> підключено.<br>";
?>