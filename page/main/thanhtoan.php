<?php

	$sql = "SELECT * FROM tbl_taikhoan WHERE email = '$_SESSION[email]'";
    $run_Sql = mysqli_query($mysql, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
    }
	session_start();
    $total_price = 0;
    $total_item = 0; 
?>
<div class="main_sanpham">
                
                <div class="main_sanpham_right">

                    <div class="mid_chitietsp">
                        <p class="chitietsp">Thanh Toán</p>

                    </div>
                    
                    
                    <div class="main_sanpham_right_thanhtoan">
                        <div class="main_sanpham_right_thanhtoan_thongtin">
                            <p>Thông Tin Đặt Hàng Và Thanh Toán</p>

                            <?php
                            include "page/main/xuly/xulytaikhoan.php";
                             ?>
							<?php
                    
				    if(isset($_SESSION['email'])){ 

					?>
                    <form action="" method="post">
                             <label for="">Họ Tên <sup style="color:red">*</sup></label>
                             <div class="main_sanpham_right_thanhtoan_input">
                                 
                                 <input name="ten_taikhoan" value="<?php 
                                 if(isset($_SESSION['nameDh'])){
                                     echo $_SESSION['nameDh'];
                                 }else{
                                     echo $fetch_info['ten_taikhoan'] ;
                                 }
                                 ?>" type="text" required>
                             </div>
                             <label for="">Email <sup style="color:red">*</sup></label>
                             <div class="main_sanpham_right_thanhtoan_input">
                                 
                                 <input name="emailHo" type="email" value="
                                 <?php 
                                 if(isset($_SESSION["emailHo"])){
                                     echo $_SESSION["emailHo"];
                                 }
                                 else{
                                     echo $fetch_info['email'];
                                 }
                                  ?>" required>
                             </div>
                             <label for="">Số Điện Thoại <sup style="color:red">*</sup></label>
                             <div class="main_sanpham_right_thanhtoan_input">
                                 
                                 <input name="dienthoai"  value="<?php 
                                 if(isset($_SESSION['dienthoaiDh'])){
                                     echo $_SESSION['dienthoaiDh'];
                                 }else{
                                     echo $fetch_info['dienthoai'];
                                 }
                                 ?>" type="number" required>
                             </div>
                             
                             <label for="">Địa Chỉ <sup style="color:red">*</sup></label>
                             <div class="main_sanpham_right_thanhtoan_input">
                                 
                                 <input name="diachi"  value="<?php 
                                 if(isset($_SESSION['diachiDh'])){
                                     echo $_SESSION['diachiDh'];
                                 }else{
                                     echo $fetch_info['diachi'] ;
                                 }
                                 ?>" type="text" required>
                             </div>
                             <label for="">Phương Thức Giao Hàng </label>
                             <div class="main_sanpham_right_thanhtoan_input_radio">
                                 <input checked="checked" type="radio">
                                 <p>Thanh Toán Khi Nhận Hàng</p>
                               
                             </div>
                             <button name="updata_tk" type="submit" style="border:none;background:none;margin-bottom: 40px;" ><a class="chitiet_btn_buy">Cập Nhật Thông Tin</a></button>
                             </form>
							 <?php
					}
							 ?>
                        </div>
                        <?php
                            include "page/main/xuly/xuly_magiamgia.php";
                             ?>
                        <div class="main_sanpham_right_thanhtoan_don">
                        <label for="">Nhập mã giảm giá ( kiểm tra email để lấy mã )</label><br>
                        <?php
                             if(count($errors) > 0){
                            ?>
                                <span style="color:red;">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </span>
                        <?php
                    }
                                ?>
                        
                         <div>
                            <form action="" method="post">
                                <input type="text" name="ma" value="" placeholder="Nhập mã giảm giá">
                                <button name="nhapma" type="submit">Cập nhật mã</button>
                            </form>
                        </div>
                             <p>Thông Tin Đơn hàng</p>
                             <table>
                                 <tr>
                                     <th>Sản phẩm</th>
                                     <th>Số Lượng</th>
                                     <th>Tổng Tiền</th>
                                 </tr>
								<?php
                                if(isset($_SESSION['giam'])){
                                    $giam = $_SESSION['giam'];
                                   
                                }
                                else{
                                    $giam = 0;
                                    

                                }
								 if(!empty($_SESSION["shopping_cart"]))
								 {
									 foreach($_SESSION["shopping_cart"] as $keys => $values)
									 {
										 $total_price = $total_price + ($values["soluong"] * $values["gia_sanpham"]);
										 $total_item = $total_item + 1;
                                         $tong_giamgia = ($total_price * $giam)/100;
                                         $tong = $total_price -$tong_giamgia;
								?>
                                 <tr>
                                     <td><?php echo $values['ten_sanpham'] ?></td>
                                     <td><?php echo $values['soluong'] ?></td>
                                     <td><?php echo number_format($values["soluong"] * $values["gia_sanpham"]) ?> <sup style="color:red">đ</sup></td>
                                 </tr>
								 <?php
									 }
								 ?>
                                 <tr>
                                     <th colspan="3">Tổng Tiền Hàng  :  <?php echo number_format($total_price) ?> <sup style="color:red">đ</sup></th>
                                 </tr>
                                 <tr>
                                    <th colspan="3">Mã (<?php if(isset($_SESSION['ma'])){
                                        echo $_SESSION['ma'];
                                    }else{
                                        echo "Trống";
                                    } ?>) giảm : <?php if(isset($_SESSION['giam'])){
                                        echo $_SESSION['giam'];
                                     }else{
                                        echo "0";
                                     } ?> %</th>
                                </tr>
                                 <tr>
                                     <th colspan="3">Tổng Thanh Toán : <?php echo number_format($tong) ?> <sup style="color:red">đ</sup></th>
                                 </tr>
								<?php
								 }
								?>
                             </table>
                        </div>
                     </div>
                         
                     <button name="updata_tk" type="submit" style="border:none;background:none;" ><a href="page/main/xuly/xulythanhtoan.php" class="chitiet_btn_buy">Thanh Toán</a></button>
                    
                  </div>
                    </div>
                   
                   
                  
                </div>
                
            </div>
            <style>
                .main_sanpham_right_thanhtoan_don label{
    font-size: 18px;
    
}
.main_sanpham_right_thanhtoan_don input{
    height: 30px;
    font-size: 18px;
    padding: 0 10px;
    margin-top: 5px;
    border: 1px solid #888;
    border-radius: 4px;
    color: #EA8025;
}
.main_sanpham_right_thanhtoan_don button{
    height: 30px;
    background: #ff7800;
    border: 1px solid #EA8025;
    border-radius: 4px;
    color: var(--white);
    font-weight: 700;
    padding: 0 10px;
    cursor: pointer;
    transition: all 0.3s;
}
.main_sanpham_right_thanhtoan_don button:hover{
    background: #000033;
    color: #EA8025;
}
            </style>