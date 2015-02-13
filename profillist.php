<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section>
  <?php
  $db = dbConnect();
  writeOllProf($db);
  ?>
  </section>
  <aside>
       <?php addArt($db);?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>