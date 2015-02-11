<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section>
  <?php
  $db = dbConnect();
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $title=$_POST['title'];
    $body=$_POST['body']; 
    $createData = date('d-m-Y');
    @$tupe = $_POST['tupe'];
    @$idart = $_POST['idart'];
    //add on DB
    $db = dbConnect();
    switch ($tupe){ 
      case 'r':
        dbRedag($title, $body, $createData, $_SESSION['login'], $idart, $db);
        break;
      default:
        dbAdd($title, $body, $createData, $_SESSION['login'], $db);
    }
    //add on DB
    }
      $db = dbConnect();
      frontdbRead($db);
include 'inc/pagenavi.inc.php';
    ?> 
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>