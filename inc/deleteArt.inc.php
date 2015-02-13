<?php
echo "Article delete!<br>
<a href='{$_SERVER['HTTP_REFERER']}'>Back</a>";
$idart = $_GET['idart'];
$db = dbConnect();
$stmt = $db->prepare("DELETE FROM articles WHERE id=:id");
$stmt->bindValue(':id', $idart, PDO::PARAM_STR);
$stmt->execute();
//$affected_rows = $stmt->rowCount();

?>
  </section>
  <aside>
       <?php 
        $db = dbConnect();
       addArt($db);
       ?>
  </aside>
</div>

