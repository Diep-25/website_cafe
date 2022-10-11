<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_magiam'])){
		mysqli_query($mysql, "DELETE FROM `tbl_magiam` WHERE `id_magiam` = '$_POST[id_magiam]'") or die(mysqli_error());
	}
	
	
?>