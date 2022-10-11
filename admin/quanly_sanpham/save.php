<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['save'])){
		$ten = $_POST['ten_sanpham'];
		$gia = $_POST['gia_sanpham'];
        $soluong = $_POST['soluong'];
		$chitiet = $_POST['chitiet_sanpham'];
        $id_menu = $_POST['menu'];
        $anh = $_FILES['anh_sanpham']['name'];
		$anh_tmp = $_FILES['anh_sanpham']['tmp_name'];
		$anh = time().'_'.$anh;

		
		
		mysqli_query($mysql, "INSERT INTO `tbl_sanpham` VALUES('','$ten', '$gia', '$soluong','','', '$chitiet', '$id_menu', '$anh')") or die(mysqli_error($mysql));
		move_uploaded_file($anh_tmp,'upload/'.$anh);
		echo "<script>alert('Thêm thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>