<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['sua'])){
        $id = $_POST['id_menu'];
		$tenmenu = $_POST['tenmenu'];
		$parent = $_POST['parent_id'];
		
		mysqli_query($mysql, "UPDATE `tbl_menu` SET `tenmenu` = '$tenmenu', `parent_id` = '$parent' WHERE `id_menu` = '$id'") or die(mysqli_error());
		
		echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>