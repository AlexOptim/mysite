<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<link href="style.css" rel="stylesheet" type="text/css" />
</head>
<body>
<div id="header"><h1>Login for PHP</h1></div>
<div id="example">Проект 1.1</div>
<div id="content">
<h1>----------------------------------------------</h1>

 <form action="scripts/action.php" method="post">
  Логін:
 <input type="text" size="30" name="login" /><br>
  Пароль: 
  <input type="text" size="20" name="pass" /><br>
   <p>Вибрати БД:</p>
   <select size="1" name="dbName">
		<option selected value="project">project</option>
		<option value="project_1">project_1</option>
   </select>
  <p><input type="submit" value="Вхід"></p>
 </form>

</div>
<div id="footer"></div>
</body>
</html>