<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['id_sanpham'])){
		mysqli_query($mysql, "DELETE FROM `tbl_sanpham` WHERE `id_sanpham` = '$_POST[id_sanpham]'") or die(mysqli_error());
	}
	
	
?>