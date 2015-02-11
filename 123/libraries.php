<?php
function dbConect(){
 # підключаємося до бази даних 
$user = 'root';
$pass = '111';
try {
    $dbh = new PDO('mysql:host=localhost;dbname=test_alex', $user, $pass);
    $dbh->beginTransaction();
    $dbh->exec("INSERT INTO articles (title, body, date, autor) values ('Hello!', 'qwertyuiopasdfghjkl', '12.10.1986', 'Alex')");
    $dbh->commit();
    
    } catch (PDOException $e) {
    print "Error!: " . $e->getMessage() . "<br/>";
    die();
    }
}

function addm(){
  header('Content-Type: text/html; charset=UTF-8');
  session_start();
  if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
    if ($_SESSION['login']=="admin" && 
      $_SESSION['passwd']=="123456789"){}
        else {
          if (!isset($_GET['go'])){
            echo "
              <div id='login'>
              <form>
                Login: <input type=text name=login>
                Password: <input type=password name=passwd>
                <input type=submit name=go value='GO'>
              </form>
              </div>";
              }
          else 
              {
             $_SESSION['login']=$_GET['login']; 
             $_SESSION['passwd']=$_GET['passwd']; 

              if ($_GET['login']=="admin" && 
                  $_GET['passwd']=="123456789") {
                  Header("Location: login.php"); 
              }else echo "
              <div id='example'><br>Wrong input, try again<br></div>";
         }
       }
  }                       
  else {
          if (!isset($_GET['go'])){
            echo "
            <div id='login'>
            <form>
              Login: <input type=text name=login>
              Password: <input type=password name=passwd>
              <input type=submit name=go value='GO'>
            </form>
            </div>";
          }else {
             $_SESSION['login']=$_GET['login']; 
             $_SESSION['passwd']=$_GET['passwd']; 

              if ($_GET['login']=="admin" && 
                  $_GET['passwd']=="123456789") {
                  Header("Location: login.php"); 
              }else echo "
              <div id='example'><br>Wrong input, try again<br></div>";
          }
  }
         
}
function addArt(){
    if (isset($_SESSION['login']) and isset($_SESSION['passwd'])){ 
                     if ($_SESSION['login']=="admin" && 
                          $_SESSION['passwd']=="123456789"){
                      echo "<a href='articleAdd.php' class='aButton'>Add article</a>";
                     }
  }
}
?>