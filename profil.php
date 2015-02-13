<?php
include 'inc/header.inc.php';
?>
<div id="wraper">
  <section>
  <?php
  $db = dbConnect();
  $idart = 1;
  if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['idart'])){
  $idart = $_GET['idart'];
}else{
    $idart = 1;
}
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $login=$_POST['login'];
    $surname=$_POST['surname']; 
    $name=$_POST['name']; 
    $email=$_POST['email'];
    $avatarstab=$_POST['avatarstab']; 
    $roll = $_POST['roll'];
    @$tupe = $_POST['tupe'];
    @$idart = $_POST['idart'];
       // Проверяем загружен ли файл
   if(is_uploaded_file($_FILES["avatar"]["tmp_name"]))
   {
     // Если файл загружен успешно, перемещаем его
     // из временной директории в конечную
     move_uploaded_file($_FILES["avatar"]["tmp_name"], "avatars/".$_FILES["avatar"]["name"]);
     $avatar = "avatars/".$_FILES["avatar"]["name"];
   } else {
      $avatar = $avatarstab;
   }

     if($tupe == 'r'){
      profRedag($login, $avatar, $surname, $name, $email, $roll, $idart, $db);
     }


    //add on DB
    /*switch ($tupe){ 
      case 'r':
        dbRedag($title, $body, $createData, $_SESSION['login'], $idart, $db);
        break;
      default:
        dbAdd($title, $body, $createData, $_SESSION['login'], $db);
    }*/
    //add on DB
    }



  writeProf($idart, $db);
  ?>
  </section>
  <aside>
       <?php addArt($db);?>
  </aside>
</div>
<?php
include 'inc/footer.inc.php';
?>