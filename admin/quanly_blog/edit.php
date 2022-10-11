<?php
	require_once '../config/config.php';
	
	if(ISSET($_POST['sua'])){
        $id = $_POST['id_blog'];
        $ten = $_POST['tieude_blog'];
		$noidung = $_POST['noidung_blog'];
		$tomtat = $_POST['tomtatnoidung_blog'];
        $anh = $_FILES['anh_blog']['name'];
		$anh_tmp = $_FILES['anh_blog']['tmp_name'];
		


        if($anh!=''){
            move_uploaded_file($anh_tmp,'upload/'.$anh);
            $upanh = "UPDATE `tbl_blog` SET `anh_blog` = '$anh', `tieude_blog` = '$ten', `noidung_blog` = '$noidung', `tomtatnoidung_blog` = '$tomtat' WHERE `id_blog` = '$id'";
            
            $seanh = mysqli_query($mysql, "SELECT * FROM tbl_blog WHERE id_blog = '$id'") or die(mysqli_error());
            
            
            while($row = mysqli_fetch_array($seanh)){
                unlink('upload/'.$row['anh_blog']);
            }
    
        }else{
            $upanh = "UPDATE `tbl_blog` SET `tieude_blog` = '$ten', `noidung_blog` = '$noidung', `tomtatnoidung_blog` = '$tomtat' WHERE `id_blog` = '$id'";
        }
        mysqli_query($mysql,$upanh);
        move_uploaded_file($anh_tmp,'upload/'.$anh);
        echo "<script>alert('Cập nhật thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>