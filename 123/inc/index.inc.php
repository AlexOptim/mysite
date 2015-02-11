<nav>
  
</nav>
<div id="wraper">
  <section>
    <article>
      
    </article>
    <article>
      <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  
    $title=$_POST['title'];
    $body=$_POST['body']; 
    echo "<h2>$title</h2>";
    echo "<p>$body</p>";
    }?> 
    </article>
  </section>
  <aside>
       <?php addArt();?>
  </aside>
</div>