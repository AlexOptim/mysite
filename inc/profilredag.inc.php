<div id="wraper">
  <section class='loginFon'>
  <?php
  $db = dbConnect();
  $idart = 2;
  if ($_SERVER['REQUEST_METHOD'] == 'GET' and isset($_GET['idart'])){
  $idart = $_GET['idart'];
}else{
    $idart = 2;
}
 foreach($db->query("SELECT * FROM users WHERE id = $idart") as $row) {
  echo "
  <form action='profil.php' enctype='multipart/form-data' method='POST'>
  <p>", mt('Login'), ":<br>
  <input name='login' type='text' size='15' maxlength='15' value='{$row['login']}'></p>";
  $log = $_SESSION['login'];
  if( chekRoll($log, $db) == 'admin'){
  echo "<p>", mt('Roll now'), ": {$row['Roll']}<br>
  ", mt('Select new roll'), ": <br>
  <input type='hidden' name='roll' value='{$row['Roll']}'>
  <input type='radio' name='roll' value='user'> user<Br>
  <input type='radio' name='roll' value='redactor'> redactor<Br>
  <input type='radio' name='roll' value='bloked'> bloked<Br>
  <input type='radio' name='roll' value='admin'> admin<Br></p>";
 }else{
  echo "<input name='roll' type='hidden' value='{$row['Roll']}'>";
 }
  echo "<p>", mt('Avatar'), ":<br> 
  <input name='avatar' type='file' multiple accept='image/*,image/jpeg,image/png' value='{$row['avatar']}'></p>
  <input name='avatarstab' type='hidden' value='{$row['avatar']}'>
  <p>",mt('Surname') ,":<br>
  <input name='surname' type='text' size='30' maxlength='50' value='{$row['surname']}'></p>
  <p>",mt('Name') ,":<br>
  <input name='name' type='text' size='30' maxlength='50' value='{$row['name']}'></p>
  <p>Email:<br>
  <input name='email' type='text' size='30' maxlength='30' value='{$row['email']}'></p>
  <input type='hidden' name='tupe' value='r'>
  <input type='hidden' name='idart' value='$idart'>
 <p><input type='submit' value='", mt('Save'), "'></p>
</form>
  ";
}
  ?>
  </section>
  <aside>
       <?php addArt($db);?>
  </aside>
</div>
