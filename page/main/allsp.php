<?php
include '../../admin/config/config.php';
$record_per_page = 8;  
$page = '';  
$output = '';  
if(isset($_POST["page"]))  
{  
     $page = $_POST["page"];  
}  
else  
{  
     $page = 1;  
}  
$start_from = ($page - 1)*$record_per_page;  
$query = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC LIMIT $start_from, $record_per_page";  
$result = mysqli_query($mysql, $query);
 ?> 
<div class="mid_menu">
            <p class="mid_menu_name">Sản Phẩm</p>

        </div>       
        <div  class="mid_sp"> 
            <?php

                    while($rowsp = mysqli_fetch_array($result)){
             ?>           
                       
                        <div class="mid_sp_title">
                        
                    
                        <div class="mid_sp_img">
                           <a title="<?php echo $rowsp['ten_sanpham'] ?>" href="index.php?ql=timhieuthem&id=<?php echo $rowsp['id_sanpham']?>">
                                <img src="admin/quanly_sanpham/upload/<?php echo $rowsp['anh_sanpham'] ?>" alt=""></a>
                            
                        </div>
                        <div class="mid_sp_name">
                            <a href="index.php?ql=timhieuthem&id=<?php echo $rowsp['id_sanpham']?>"><p><?php echo $rowsp['ten_sanpham'] ?></p></a>
                        </div>
                        <div class="mid_sp_price">
                            <p><?php echo number_format($rowsp['gia_sanpham'])?> <sup style="color:red">đ</sup></p>
                            <input class="soluong input_soluong" name="soluong" id="soluong<?php echo $rowsp['id_sanpham'] ?>" type="number" value="1" min="1" max="<?php echo $rowsp['soluong'];?>" >
                        </div>
                        <input type="hidden" name="anh_sanpham" id="anh_sanpham<?php echo $rowsp['id_sanpham'] ?>" value="<?php echo $rowsp['anh_sanpham'] ?>" />
            	        <input type="hidden" name="ten_sanpham" id="ten_sanpham<?php echo $rowsp['id_sanpham'] ?>" value="<?php echo $rowsp['ten_sanpham'] ?>" />
            	        <input type="hidden" name="gia_sanpham" id="gia_sanpham<?php echo $rowsp['id_sanpham'] ?>" value="<?php echo $rowsp['gia_sanpham'] ?>" />
                        <div class="mid_sp_btn">
                            <button name="add_to_cart" class="add_to_cart" id="<?php echo $rowsp['id_sanpham'] ?>" ><a class="mid_sp_btn_buy">MUA NGAY</a></button>
                            <a class="mid_sp_btn_details" href="index.php?ql=timhieuthem&id=<?php echo $rowsp['id_sanpham']?>">TÌM HIỂU THÊM</a>
                        </div>
                        
                      </div>
                    <?php    
                    }
                    ?>
                    </div>
               <?php
                    $page_query = "SELECT * FROM tbl_sanpham ORDER BY id_sanpham DESC";  
                    $page_result = mysqli_query($mysql, $page_query);  
                    $total_records = mysqli_num_rows($page_result);  
                    $total_pages = ceil($total_records/$record_per_page); 
                   
                   ?>
                        <div class="mid_list">
                        <ul>
                       <?php 
                        for($i=1; $i<=$total_pages; $i++)  {
                        ?>
                        <li><a style="cursor:pointer;" class="listt <?php if($i == $page){echo "list";}else{echo ""; }?>"  id="<?php echo $i?>" ><?php echo $i?></a></li>
                        <?php
                            }
                        ?> 
                            </ul>
                        </div>
                        
                        
