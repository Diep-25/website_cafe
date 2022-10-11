<?php




    $sql_list_blog = "SELECT * FROM tbl_blog ORDER BY tbl_blog.id_blog DESC";
	$query_list_blog = mysqli_query($mysql,$sql_list_blog);
	$row = mysqli_fetch_array($query_list_blog);

	$sql_list_thongtin = "SELECT * FROM tbl_thongtin";
	$query_list_thongtin = mysqli_query($mysql,$sql_list_thongtin);

	$sql_list_anhthongtin = "SELECT * FROM tbl_anhthongtin ORDER BY tbl_anhthongtin.id_anhthongtin DESC";
	$query_list_anhthongtin = mysqli_query($mysql,$sql_list_anhthongtin);

?>
<section class="home" id="home">

<div class="content">
    
    <h3>Tôi đếm <span>cuộc đời mình</span> bằng những thìa cà phê</h3>
    <p>Cuộc đời là những giọt cà phê đen, bản thân ta sẽ là những viên đường bé nhỏ.</p>
    <a href="index.php?ql=dat_ban" class="btn">Đặt phòng</a>
</div>

</section>



<div id="menu" class="mid">
                
    
            </div>



            
            <div id="blog" class="mid_blog">
                <img src="img/bg_blog_home.jpg" alt="">
                <div class="mid_blog_menu">
                    <p class="mid_blog_name">Blog</p>
                   <a class="mid_blog_hover" href="index.php?ql=blog">XEM THÊM</a>
                   
                </div>
                <div class="mid_blog_item">
                    <a href="index.php?ql=blog_noidung&id=<?php echo $row['id_blog'] ?>">
                    <img src="admin/quanly_blog/upload/<?php echo $row['anh_blog'] ?>" alt=""></a>
                    <div class="mid_blog_item_title">
                        <p>TIN TỨC</p>
                        <a class="mid_blog_item_btn_title" href="index.php?ql=blog_noidung&id=<?php echo $row['id_blog'] ?>"><?php echo $row['tieude_blog'] ?></a>
                        <div>
                            <a class="mid_blog_item_btn_detais" href="index.php?ql=blog_noidung&id=<?php echo $row['id_blog'] ?>">XEM THÊM</a>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mid_title">
                <div class="mid_title_menu">
                    <p class="mid_title_name">THÔNG TIN</p>
                  
                </div>
                <div class="mid_vitri">
                    <div class="mid_vitri_text">
                        <h2>DDUCKY CAFE</h2>
                        <?php
                        
                         while($row = mysqli_fetch_array($query_list_thongtin)){
  	                     ?>
                        <p><?php echo $row['noidung_thongtin'] ?></p>
                        <?php
                         }
                        ?>
                    </div>
                    <div class="mid_vitri_img">
                    <?php   
                         while($row = mysqli_fetch_array($query_list_anhthongtin)){  
                    ?>
                        <div class="mid_vitri_img-img">
                            <img src="./admin/quanly_thongtin/upload/<?php echo $row['anh_thongtin'] ?>" alt="">
                        </div>
                    <?php
                         }
                    ?>
                        <a class="prev" onclick="plusSlides(-1, 0)">&#10094;</a>
                        <a class="next" onclick="plusSlides(1, 0)">&#10095;</a>
                    </div>
                </div>
            </div>