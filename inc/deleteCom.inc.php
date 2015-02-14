<?php
echo mt('Comment delete'), "!<br>
<a href='{$_SERVER['HTTP_REFERER']}'>", mt('Back'), "</a>";
$id = $_GET['idcom'];
$db = dbConnect();
$stmt = $db->prepare("DELETE FROM comments WHERE id=:id");
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
