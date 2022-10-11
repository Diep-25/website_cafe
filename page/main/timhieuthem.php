
<?php
	$sql_chitiet = "SELECT * FROM tbl_sanpham,tbl_menu WHERE tbl_sanpham.id_menu=tbl_menu.id_menu AND tbl_sanpham.id_sanpham='$_GET[id]' LIMIT 1";
	$query_chitiet = mysqli_query($mysql,$sql_chitiet);
	
?>
<div class="main_sanpham">
                
                <div class="main_sanpham_right">

                    <div class="mid_chitietsp">
                        <p class="chitietsp">CHI TIẾT SẢN PHẨM</p>

                    </div>
                    <?php 
                    
                    while($row_chitiet = mysqli_fetch_array($query_chitiet)){

                    ?>
                 
                   <div class="main_chitiet_right_table">
                     
                    <div class="main_chitiet_right_table-img">
                        <div class="main_chitiet_right_table-big">
                            <img id="myimage" src="admin/quanly_sanpham/upload/<?php echo $row_chitiet['anh_sanpham'] ?>" alt="">
                        </div>
                       
                    </div>
                         <div class="chitiet_right">
                            
                         <p><?php echo $row_chitiet['chitiet_sanpham'] ?></p>
                         <div class="main_sanpham_sp_name" style="width:100%;">
                         <h2><?php echo $row_chitiet['ten_sanpham'] ?></h2>
                        </div>
                         <p style="color:#EA8025;"><?php echo number_format($row_chitiet['gia_sanpham']) ?> <sup style="color:red">đ</sup></p>
                        <div>
                        <p>Hiện tại còn : <?php if($row_chitiet['soluongcon']>0){
                            echo $row_chitiet['soluongcon'];
                        }else{
                            echo $row_chitiet['soluong'];
                        }
                        ?> sản phẩm</p>    
                        <span style="font-size:18px;">Số lượng : </span>
                        <input style="margin-bottom:30px;height: 30px;width:80px;" class="soluong input_soluong" name="soluong" id="soluong<?php echo $row_chitiet['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row_chitiet['soluong'];?>" >
                        </div>
                        <input type="hidden" name="anh_sanpham" id="anh_sanpham<?php echo $row_chitiet['id_sanpham'] ?>" value="<?php echo $row_chitiet['anh_sanpham'] ?>" />
            	        <input type="hidden" name="ten_sanpham" id="ten_sanpham<?php echo $row_chitiet['id_sanpham'] ?>" value="<?php echo $row_chitiet['ten_sanpham'] ?>" />
            	        <input type="hidden" name="gia_sanpham" id="gia_sanpham<?php echo $row_chitiet['id_sanpham'] ?>" value="<?php echo $row_chitiet['gia_sanpham'] ?>" />
                            <button name="add_to_cart" id="<?php echo $row_chitiet['id_sanpham'] ?>" class="add_to_cart"  ><a class="chitiet_btn_buy">THÊM VÀO GIỎ HÀNG</a></button>
                         </div>
                    </div>
                  
                   <?php
                        } 
                    ?>
    
                </div>
                
            </div>
        
            <div class="main_sanpham">
            
            <div class="main_sanpham_right">

                <div class="mid_menu">
                    <p class="mid_menu_name">Liên Quan</p>
                </div>
                
                <div class="main_sanpham_right_Wrap">
                    <?php
                    $query = mysqli_query($mysql,"SELECT * FROM tbl_sanpham,tbl_menu WHERE tbl_sanpham.id_menu=tbl_menu.id_menu AND tbl_sanpham.id_sanpham='$_GET[id]'");
                    $row = mysqli_fetch_array($query);
                    $menu = $row['id_menu'];
                    $querys = mysqli_query($mysql,"SELECT * FROM tbl_sanpham WHERE id_menu ='$menu'");
					while($rows = mysqli_fetch_array($querys)){ 
					?>
                    <div class="main_sanpham_sp_title">
                   
                        <div class="main_sanpham_sp_img">
                           <a title="<?php echo $rows['ten_sanpham'] ?>" href="index.php?ql=timhieuthem&id=<?php echo $rows['id_sanpham'] ?>"> 
                               <img src="admin/quanly_sanpham/upload/<?php echo $rows['anh_sanpham'] ?>" alt=""></a>
                            
                        </div>
                        <div class="main_sanpham_sp_name">
                            <a href="index.php?ql=timhieuthem&id=<?php echo $rows['id_sanpham'] ?>"><p><?php echo $rows['ten_sanpham'] ?></p></a>
                        </div>
                        <div class="main_sanpham_sp_price">
                            <p><?php echo number_format($rows['gia_sanpham']) ?><sup style="color:red">đ</sup></p>
                            <input class="soluong input_soluong" name="soluong" id="soluong<?php echo $rows['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $row_pro['soluong'];?>">
                        </div>
                        <input type="hidden" name="anh_sanpham" id="anh_sanpham<?php echo $rows['id_sanpham'] ?>" value="<?php echo $rows['anh_sanpham'] ?>" />
            	        <input type="hidden" name="ten_sanpham" id="ten_sanpham<?php echo $rows['id_sanpham'] ?>" value="<?php echo $rows['ten_sanpham'] ?>" />
            	        <input type="hidden" name="gia_sanpham" id="gia_sanpham<?php echo $rows['id_sanpham'] ?>" value="<?php echo $rows['gia_sanpham'] ?>" />
                        <div class="main_sanpham_sp_btn">
                        <button name="add_to_cart" id="<?php echo $rows['id_sanpham'] ?>" class="add_to_cart"><a class="chitiet_btn_buy">MUA NGAY</a></button>
                           
                        </div>
                    </form>
                    </div>
                    
                    <?php
                    }
                    ?>
                    

                </div>
                
            </div>
                
            </div>
        </div>
        <style>
            .main_sanpham_sp_btn button{
                background:none;
                border:none;
            }
        </style>
       