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
	 <p>Title: <input type='text' size='50' name='title' value='{$row['title']}'></p>
	 <input type='hidden' name='tupe' value='r'>
	 <input type='hidden' name='idart' value='$idart'>
	 <p>Body:<br> <textarea cols='80' rows='20' name='body'>{$row['body']}</textarea></p>
	 <p><input type='submit' value='Save'></p>
	</form>";
}
?>
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>

