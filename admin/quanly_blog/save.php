<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['save'])){
		$ten = $_POST['tieude_blog'];
		$noidung = $_POST['noidung_blog'];
		$tomtat = $_POST['tomtatnoidung_blog'];
        $anh = $_FILES['anh_blog']['name'];
		$anh_tmp = $_FILES['anh_blog']['tmp_name'];
		$anh = time().'_'.$anh;

		
		
		mysqli_query($mysql, "INSERT INTO `tbl_blog` VALUES('', '$anh', '$ten', '$noidung', '$tomtat')") or die(mysqli_error($mysql));
		move_uploaded_file($anh_tmp,'upload/'.$anh);
		echo "<script>alert('Thêm thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>