<?php
session_start ('local');
$_SESSION['login'] = '';
$_SESSION['passwd'] = '';
session_destroy();
$a = $_SERVER['HTTP_REFERER'];
header("Location: index.php"); 
?>