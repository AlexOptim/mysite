<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section class="addFon">
  <?php
  loadLengSistem();
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
      $i = $_POST['i'];
      $j = 0;
    while($j<$i){
          $orj = 'original'.$j;
          $engj = 'eng'.$j;
          $ukrj = 'ukr'.$j;
          $original = $_POST[$orj];
          $eng = $_POST[$engj];
          $ukr = $_POST[$ukrj];
          saveLengSistem($original, $eng, $ukr); 
          $j ++;
    }
  }
  ?>
  </section>
  <aside>
       <?php 
        $db = dbConnect();
       addArt($db);
       ?>
  </aside>
<?php
include 'inc/footer.inc.php';
?>