<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['sua'])){
        $id = $_POST['id_anhthongtin'];
        $anh = $_FILES['anh_thongtin']['name'];
		$anh_tmp = $_FILES['anh_thongtin']['tmp_name'];
		// $anh = time().'_'.$anh;


        if($anh!=''){
            move_uploaded_file($anh_tmp,'upload/'.$anh);
            $upanh = "UPDATE `tbl_anhthongtin` SET `anh_thongtin` = '$anh' WHERE `id_anhthongtin` = '$id'";
            
            $seanh = mysqli_query($mysql, "SELECT * FROM tbl_anhthongtin WHERE id_anhthongtin = '$id'") or die(mysqli_error());
            
            
            while($row = mysqli_fetch_array($seanh)){
                unlink('upload/'.$row['anh_thongtin']);
            }
    
        }else{
            
            $upanh = "UPDATE `tbl_anhthongtin` WHERE `id_anhthongtin` = '$id'";
        }
        mysqli_query($mysql,$upanh);
        move_uploaded_file($anh_tmp,'upload/'.$anh);
        echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	};
    if(ISSET($_POST['capnhat'])){
        $id = $_POST['id_thongtin'];
		$noidung = $_POST['noidung_thongtin'];
		
		
		mysqli_query($mysql, "UPDATE `tbl_thongtin` SET `noidung_thongtin` = '$noidung' WHERE `id_thongtin` = '$id'") or die(mysqli_error());
		
		echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>