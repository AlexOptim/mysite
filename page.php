<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section>
	<?php
	$db = dbConnect();
	$idart = $_GET['idart'];
	articleDbRead($idart, $db);
	?>
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>