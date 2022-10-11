<?php
	$sql_pro = "SELECT * FROM tbl_sanpham";
	$query_pro = mysqli_query($mysql,$sql_pro);

?>
<div class="main_sanpham">
            
            <div class="main_sanpham_right">

                <div class="mid_menu">
                    <p class="mid_menu_name">Tất Cả Sản Phẩm</p>
                </div>
                <div class="main_sanpham_right_Wrap">
                    <?php
					while($row_pro = mysqli_fetch_array($query_pro)){ 
					?>
                    <div class="main_sanpham_sp_title">

                        <div class="main_sanpham_sp_img">
                           <a title="<?php echo $row_pro['ten_sanpham'] ?>" href="index.php?ql=timhieuthem&id=<?php echo $row_pro['id_sanpham'] ?>"> 
                               <img src="admin/quanly_sanpham/upload/<?php echo $row_pro['anh_sanpham'] ?>" alt=""></a>
                            
                        </div>
                        <div class="main_sanpham_sp_name">
                            <a href="index.php?ql=timhieuthem&id=<?php echo $row_pro['id_sanpham'] ?>"><p><?php echo $row_pro['ten_sanpham'] ?></p></a>
                        </div>
                        <div class="main_sanpham_sp_price">
                            <p><?php echo number_format($row_pro['gia_sanpham'],0,',','.') ?><sup style="color:red">đ</sup></p>
                            <input class="soluong input_soluong" name="soluong" id="soluong<?php echo $row_pro['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row_pro['soluong'];?>" >
                        </div>
                       
                        <input type="hidden" name="anh_sanpham" id="anh_sanpham<?php echo $row_pro['id_sanpham'] ?>" value="<?php echo $row_pro['anh_sanpham'] ?>" />
            	        <input type="hidden" name="ten_sanpham" id="ten_sanpham<?php echo $row_pro['id_sanpham'] ?>" value="<?php echo $row_pro['ten_sanpham'] ?>" />
            	        <input type="hidden" name="gia_sanpham" id="gia_sanpham<?php echo $row_pro['id_sanpham'] ?>" value="<?php echo $row_pro['gia_sanpham'] ?>" />
                        <div class="main_sanpham_sp_btn">
                        <button style="" name="add_to_cart" id="<?php echo $row_pro['id_sanpham'] ?>" class="add_to_cart" type="submit"><a class="chitiet_btn_buy">MUA NGAY</a></button>
                           
                        </div>
                    
                    </div>
                    
                    <?php
                    }
                    ?>
                    

                </div>
            </div>
        </div>
        <style>
            .main_sanpham_sp_btn button{
                background:none;
                border:none;
            }
        </style>

