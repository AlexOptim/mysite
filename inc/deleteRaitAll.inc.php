<?php
echo mt('All ratings delete'), "!<br>
<a href='{$_SERVER['HTTP_REFERER']}'>", mt('Back'), "</a>";
$id = $_GET['idartr'];
$db = dbConnect();
$stmt = $db->prepare("DELETE FROM ratings WHERE idarticles=:id");
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
