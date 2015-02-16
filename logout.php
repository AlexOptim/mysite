<?php
session_start ('local');
$_SESSION['login'] = '';
$_SESSION['passwd'] = '';
$_SESSION['leng'] = '';
session_destroy();
header("Location: index.php"); 
?>