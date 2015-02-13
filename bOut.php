<?php
session_start ('local');
$_SESSION['login'] = '';
$_SESSION['passwd'] = '';
session_destroy();
header("Location: bloketOut.php"); 
?>