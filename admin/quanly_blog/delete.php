<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_blog'])){
		mysqli_query($mysql, "DELETE FROM `tbl_blog` WHERE `id_blog` = '$_POST[id_blog]'") or die(mysqli_error());
	}
	
	
?>