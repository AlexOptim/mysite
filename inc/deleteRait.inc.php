<?php
echo mt('Rating delete'), "!<br>
<a href='{$_SERVER['HTTP_REFERER']}'>", mt('Back'), "</a>";
$id = $_GET['idrating'];
$db = dbConnect();
$stmt = $db->prepare("DELETE FROM ratings WHERE id=:id");
$stmt->bindValue(':id', $id, PDO::PARAM_STR);
$stmt->execute();

?>
  </section>
  <aside>
	   <?php 
		$db = dbConnect();
	   addArt($db);
	   ?>
  </aside>
</div>
