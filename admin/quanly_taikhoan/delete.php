<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_taikhoan'])){
		mysqli_query($mysql, "DELETE FROM `tbl_taikhoan` WHERE `id_taikhoan` = '$_POST[id_taikhoan]'") or die(mysqli_error());
	}
	
	
?>