<?php
	if(isset($_POST['timkiem'])){
		$tukhoa = $_POST['tukhoa'];
	}
	$sql_pro = "SELECT * FROM tbl_sanpham WHERE tbl_sanpham.ten_sanpham LIKE '%".$tukhoa."%'";
	$query_pro = mysqli_query($mysql,$sql_pro);
	
?>



<div class="main_sanpham">
            
            <div class="main_sanpham_right">

                <div class="mid_menu">
                    <p class="mid_menu_name"><?php echo $_POST['tukhoa']; ?></p>
                </div>
                <div class="main_sanpham_right_Wrap">
                    <?php
                     if(mysqli_num_rows($query_pro) > 0){
					while($row = mysqli_fetch_array($query_pro)){ 
					?>
                    <div class="main_sanpham_sp_title">

                        <div class="main_sanpham_sp_img">
                           <a title="<?php echo $row['ten_sanpham'] ?>" href="index.php?ql=timhieuthem&id=<?php echo $row['id_sanpham'] ?>"> 
                               <img src="admin/quanly_sanpham/upload/<?php echo $row['anh_sanpham'] ?>" alt=""></a>
                            
                        </div>
                        <div class="main_sanpham_sp_name">
                            <a href="index.php?ql=timhieuthem&id=<?php echo $row['id_sanpham'] ?>"><p><?php echo $row['ten_sanpham'] ?></p></a>
                        </div>
                        <div class="main_sanpham_sp_price">
                            <p><?php echo number_format($row['gia_sanpham'],0,',','.') ?><sup style="color:red">đ</sup></p>
                            <input class="soluong input_soluong" name="soluong" id="soluong<?php echo $row['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row['soluong'];?>" >
                        </div>
                       
                        <input type="hidden" name="anh_sanpham" id="anh_sanpham<?php echo $row['id_sanpham'] ?>" value="<?php echo $row['anh_sanpham'] ?>" />
            	        <input type="hidden" name="ten_sanpham" id="ten_sanpham<?php echo $row['id_sanpham'] ?>" value="<?php echo $row['ten_sanpham'] ?>" />
            	        <input type="hidden" name="gia_sanpham" id="gia_sanpham<?php echo $row['id_sanpham'] ?>" value="<?php echo $row['gia_sanpham'] ?>" />
                        <div class="main_sanpham_sp_btn">
                        <button style="background:none;border:none;" name="add_to_cart" id="<?php echo $row['id_sanpham'] ?>" class="add_to_cart" type="submit"><a class="chitiet_btn_buy">MUA NGAY</a></button>
                           
                        </div>
                    
                    </div>
                    <?php
					} 
                }else{
                    $errro = 'Không có sản phẩm bạn mong muốn?';
                    ?>
                    <p class="mid_menu_name mid_menu_errrr" style = ""><?php echo $errro ?></p>
                    <?php
                }
					?>
                    
                    
                    
                </div>
            </div>
        </div>
        <style>
            .mid_menu_errrr{
                color:#000033;
                font-size:20px;
            }
        </style>