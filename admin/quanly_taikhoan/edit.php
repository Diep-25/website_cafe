<?php
require '../chung.php';
	require_once '../config/config.php';
	
	if(ISSET($_POST['sua'])){
        $id = $_POST['id_taikhoan'];
		$ten = $_POST['ten_taikhoan'];
		$dienthoai = $_POST['dienthoai'];
		$diachi = $_POST['diachi'];
        $quyen = $_POST['quyen'];
		
		mysqli_query($mysql, "UPDATE `tbl_taikhoan` SET `ten_taikhoan` = '$ten', `dienthoai` = '$dienthoai', `diachi` = '$diachi', `quyen` = '$quyen' WHERE `id_taikhoan` = '$id'") or die(mysqli_error());
		
		echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>