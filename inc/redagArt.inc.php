<?php
$idart = $_GET['idart'];
$db = dbConnect();
foreach($db->query("SELECT * FROM articles WHERE id = $idart") as $row) {
	echo "
	<nav>
	</nav>
	<div id='wraper'>
	<section class='addFon'>
	<form action='node.php' method='POST'>
	<div id='dualArt'>
	<div class='Art'>
	<h2>English</h2>
	 <p>Title:<br><input type='text' size='50' name='titleeng' value='{$row['titleeng']}'></p>
	 <p>Body:<br> <textarea cols='80' rows='20' name='bodyeng'>{$row['bodyeng']}</textarea></p>
 	</div>
 	<div class='Art'>
 	<h2>Українська</h2>
	 <p>Заголовок:<br><input type='text' size='50' name='titleukr' value='{$row['titleukr']}'></p>
	 <p>Тіло:<br> <textarea cols='80' rows='20' name='bodyukr'>{$row['bodyukr']}</textarea></p>
 	</div>
	</div>
	<input type='hidden' name='tupe' value='r'>
	<input type='hidden' name='idart' value='$idart'>
	 <p><input type='submit' value='", mt('Save'), "'></p>
	</form>";
}
?>
  </section>
  <aside>
       <?php 
        $db = dbConnect();
       addArt($db);
       ?>
  </aside>
</div>

