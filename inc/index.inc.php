<div id="wraper">
  <section>
<?php include 'inc/pagenavi.inc.php';?>
  </section>
  <aside>
       <?php 
        $db = dbConnect();
       addArt($db);
       ?>
  </aside>
</div>