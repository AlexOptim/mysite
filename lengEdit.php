<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section class="addFon">
  <form action='' method='POST'>
   <p>Original:<br><input type='text' size='30' name='original'></p>
   <p>ukr:<br><input type='text' size='30' name='ukr'></p>
   <p><input type='submit' value='Save'></p>
  </form>
  <?php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $original = $_POST['original'];
    $ukr = $_POST['ukr'];
   saveLengSistem($original, $ukr); 
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