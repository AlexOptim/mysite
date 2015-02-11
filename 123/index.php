<?php
include 'libraries.php';
dbConect();
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
    <article>
      <pre>
      <?php
      print_r(PDO::getAvailableDrivers());
      ?>
    </article>
    <article>

    </article>
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>
<footer>
</footer>
</body>
</html>