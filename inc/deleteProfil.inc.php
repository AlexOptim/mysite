<?php
echo mt('Your profile delete'), "!<br>
<a href='index.php'>", mt('Back home page'), "</a>";
$idart = $_GET['idart'];
$db = dbConnect();
$stmt = $db->prepare("DELETE FROM users WHERE id=:id");
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

