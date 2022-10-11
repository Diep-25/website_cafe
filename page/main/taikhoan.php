           

<?php
 include "./admin/config/config.php";

if(isset($_POST['luu'])){
    
$tenkhachhang = $_POST['ten_taikhoan'];
$diachi = $_POST['diachi'];
$dienthoai = $_POST['dienthoai'];
$hinhanh = $_FILES['anh']['name'];
$hinhanh_tmp = $_FILES['anh']['tmp_name'];

	if($hinhanh!=''){
		move_uploaded_file($hinhanh_tmp,'./page/main/upload/'.$hinhanh);
		
		$sql_update = "UPDATE tbl_taikhoan SET ten_taikhoan='".$tenkhachhang."',diachi='".$diachi."',dienthoai='".$dienthoai."',anh='".$hinhanh."' WHERE  `email` = '$_SESSION[email]'";
		$sql = "SELECT * FROM tbl_taikhoan WHERE  `email` = '$_SESSION[email]' LIMIT 1";
		$query = mysqli_query($mysql,$sql);
	}else{
		$sql_update = "UPDATE tbl_taikhoan SET ten_taikhoan='".$tenkhachhang."',diachi='".$diachi."',dienthoai='".$dienthoai."' WHERE  `email` = '$_SESSION[email]'";
	}
	mysqli_query($mysql,$sql_update);
	
}

?>
<?php
    
	$sql_cate = "SELECT * FROM `tbl_taikhoan` WHERE `email` = '$_SESSION[email]' LIMIT 1";
	$query_cate = mysqli_query($mysql,$sql_cate);
	$row = mysqli_fetch_array($query_cate);
?>

                <div class="main_datban">
                    <h2>Thông Tin Của Tôi</h2>
                    <form action="" method="POST" autocomplete="off" enctype="multipart/form-data">
                    
                        <div class="taikhoan">
                            <div class="taikhoan_form">
                                <div class="taikhoan_form-name">
                                    <p>Email Đăng Nhập</p>
                                    <p>Tên Của Tôi</p>
                                    <p>Địa Chỉ</p>
                                    <p>Số Điện Thoại</p>
                                    <p>Điểm tích lũy</p>
                                   
                                </div>
                               
                                <div class="taikhoan_form-name">
                               
                                    <div class="taikhoan_form-name-input">
                                    
                                        <h3><?php echo $row['email'] ?></h3>
                                        <input type="text" name="ten_taikhoan" value="<?php echo $row['ten_taikhoan'] ?>" required>
                                        <input type="text" name="diachi" value="<?php echo $row['diachi'] ?>" required>
                                        <input type="text" name="dienthoai" value="<?php echo $row['dienthoai'] ?>" required>
                                        <?php if($row['soluotmua'] == ''){
                                            $diem = 0;
                                            $dieminfo = "Vì bạn là khách hàng mới nên Dducky cafe gửi tặng bạn mã giảm 30% : q8b5x";
                                        }else{
                                            $diem = $row['soluotmua'];
                                            $dieminfo = "5 điểm sẽ có mã giảm 10% , 10 điểm có mã giảm 20%";
                                        } ?>
                                        <h3 style="margin-top:10px;"><?php echo $diem ?> Điểm </h3>
                                        <p style="font-size: 12px;width: 250%;" >(<?php echo $dieminfo ?>)</p>
                                    </div>
                                   
                                </div>
                                <div class="taikhoan_form-anh">
                                    <td><img id = "output" src="<?php
                                        if($row['anh'] == ''){
                                            echo 'img/default-user-image.png';
                                        }else{
                                            echo 'page/main/upload/'.$row['anh'];
                                        }
                                    ?>
                                    
                                    " alt="hiện không có ảnh">
                                        <input name="anh" type="file" value="page/main/upload/<?php echo $row['anh'] ?>" onchange="loadFile(event)"></td>
                                </div>
                                
                            </div>
                            
                        </div>
                        <button class="taikhoan_btn" name="luu" type="submit"><a class="mid_sp_btn_buy">Lưu</a></button>
                        <button class="taikhoan_btn"><a href="index.php?ql=doimatkhau" class="mid_sp_btn_buy">Đổi Mật Khẩu</a></button>
                        <button class="taikhoan_btn"><a href="index.php?ql=donhang_user" class="mid_sp_btn_buy">Đơn hàng</a></button>

                        
                   </form>

                </div>
                <style>
                    .main_datban .taikhoan_btn{
                        border: none;
                        background: none;
                        margin-bottom:20px;
                    }
                </style>