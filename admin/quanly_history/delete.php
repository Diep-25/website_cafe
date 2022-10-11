<?php
	require_once '../config/config.php';
    
	if(ISSET($_POST['ma_giohang'])){
		mysqli_query($mysql, "DELETE FROM `tbl_giohang` WHERE `ma_giohang` = '$_POST[ma_giohang]'") or die(mysqli_error());
		mysqli_query($mysql, "DELETE FROM `tbl_chitietgiohang` WHERE `ma_giohang` = '$_POST[ma_giohang]'") or die(mysqli_error());
	}
	
	
?>