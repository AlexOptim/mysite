<?php
include 'inc/header.inc.php';
?>
<?php
	switch($id){
		case 'articleadd':
			include 'inc/articleAdd.inc.php'; break;
		case 'redagart':
			include 'inc/redagArt.inc.php'; break;
		case 'deleteart':
			include 'inc/redagArt.inc.php'; break;
		case 'deleteprof':
			include 'inc/deleteProfil.inc.php'; break;
		default: include 'inc/index.inc.php';
	}
?>
<?php
include 'inc/footer.inc.php';
?>