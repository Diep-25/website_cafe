<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['sua'])){
        $id = $_POST['id_sanpham'];
		$ten = $_POST['ten_sanpham'];
		$gia = $_POST['gia_sanpham'];
        $soluong = $_POST['soluong'];
        $chitiet = $_POST['chitiet_sanpham'];
        $id_menu = $_POST['menu'];
        $anh = $_FILES['anh_sanpham']['name'];
		$anh_tmp = $_FILES['anh_sanpham']['tmp_name'];
		

		
		// mysqli_query($mysql, "UPDATE `tbl_sanpham` SET `ten_sanpham` = '$ten', `gia_sanpham` = '$gia', `soluong` = '$soluong', `id_menu` = '$id_menu', `anh_sanpham` = '$anh' WHERE `id_sanpham` = '$id'") or die(mysqli_error());
		
		
        if($anh!=''){
            move_uploaded_file($anh_tmp,'upload/'.$anh);
            $upanh = "UPDATE `tbl_sanpham` SET `ten_sanpham` = '$ten', `gia_sanpham` = '$gia', `soluong` = '$soluong', `chitiet_sanpham` = '$chitiet', `id_menu` = '$id_menu', `anh_sanpham` = '$anh' WHERE `id_sanpham` = '$id'";
            
            $seanh = mysqli_query($mysql, "SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id'") or die(mysqli_error());
            
            
            while($row = mysqli_fetch_array($seanh)){
                unlink('upload/'.$row['anh_sanpham']);
            }
    
        }else{
            $upanh = "UPDATE `tbl_sanpham` SET `ten_sanpham` = '$ten', `gia_sanpham` = '$gia', `soluong` = '$soluong', `chitiet_sanpham` = '$chitiet', `id_menu` = '$id_menu' WHERE `id_sanpham` = '$id'";
        }
        mysqli_query($mysql,$upanh);
        move_uploaded_file($anh_tmp,'upload/'.$anh);
        echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>