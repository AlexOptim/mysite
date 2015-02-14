<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section>
  <?php
  $db = dbConnect();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $titleeng=$_POST['titleeng'];
    $titleukr=$_POST['titleukr'];
    $bodyeng=$_POST['bodyeng']; 
    $bodyukr=$_POST['bodyukr']; 
    $createData = date('d-m-Y');
    @$tupe = $_POST['tupe'];
    @$idart = $_POST['idart'];
    //add on DB
    $db = dbConnect();
    switch ($tupe){ 
      case 'r':
        dbRedag($titleeng, $bodyeng, $titleukr, $bodyukr, $createData, $_SESSION['login'], $idart, $db);
        break;
      default:
        dbAdd($titleeng, $bodyeng, $titleukr, $bodyukr, $createData, $_SESSION['login'], $db);
    }
    //add on DB
    }
      $db = dbConnect();
      frontdbRead($db);
include 'inc/pagenavi.inc.php';
    ?> 
  </section>
  <aside>
       <?php addArt($db);?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>