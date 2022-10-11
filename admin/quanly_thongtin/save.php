<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['save'])){
        $anh = $_FILES['anh_thongtin']['name'];
		$anh_tmp = $_FILES['anh_thongtin']['tmp_name'];
		$anh = time().'_'.$anh;

		
		
		mysqli_query($mysql, "INSERT INTO `tbl_anhthongtin` VALUES('', '$anh')") or die(mysqli_error($mysql));
		move_uploaded_file($anh_tmp,'upload/'.$anh);
		echo "<script>alert('Thêm thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>