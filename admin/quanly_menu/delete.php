<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_menu'])){
		
		mysqli_query($mysql, "DELETE FROM `tbl_sanpham` WHERE `id_menu` = '$_POST[id_menu]'") or die(mysqli_error());
		mysqli_query($mysql, "DELETE FROM `tbl_menu` WHERE `id_menu` = '$_POST[id_menu]'") or die(mysqli_error());
	}
	
	
?>