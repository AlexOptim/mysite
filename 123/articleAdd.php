<?php
include 'libraries.php';
?><html>
<head>
  <meta http-equiv="content-type" charset="utf-8" />
  <link href="style.css" rel="stylesheet" />
</head>
<body>
<header>
  <h1>PHP & MySQL: My project</h1>
  <?php
addm();
?>
</header>
<nav>
  
</nav>
<div id="wraper">
  <section>
<form action="" method="POST">
 <p>Title: <input type="text" size="50" name="title"></p>

 <p>Body:<br> <textarea cols="80" rows="20" name="body"></textarea></p>
 <p><input type="submit" value="Додати"></p>
</form>
  <article>
  <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
    $title=$_POST['title'];
    $body=$_POST['body']; 
    echo "<h2>$title</h2>";
    echo "<p>$body</p>";
  }?>     
  </article>

  </section>
  <aside>

  </aside>
</div>
<footer>
</footer>
</body>
</html>