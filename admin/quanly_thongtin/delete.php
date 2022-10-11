<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_anhthongtin'])){
		mysqli_query($mysql, "DELETE FROM `tbl_anhthongtin` WHERE `id_anhthongtin` = '$_POST[id_anhthongtin]'") or die(mysqli_error());
	}
	
	
?>