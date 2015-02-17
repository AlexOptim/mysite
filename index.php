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
			include 'inc/deleteArt.inc.php'; break;
		case 'deleteprof':
			include 'inc/deleteProfil.inc.php'; break;
		case 'deletecom':
			include 'inc/deleteCom.inc.php'; break;
		case 'deleterait':
			include 'inc/deleteRait.inc.php'; break;
		case 'deleteraitall':
			include 'inc/deleteRaitAll.inc.php'; break;
		case 'lengedit':
			include 'inc/lengEdit.inc.php'; break;
		case 'redagprof':
			include 'inc/profilredag.inc.php'; break;
		default: include 'inc/index.inc.php';
	}
?>
<?php
include 'inc/footer.inc.php';
?>