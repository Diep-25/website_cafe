<?php
	 
     $sql_list_blog = "SELECT * FROM tbl_blog ORDER BY id_blog DESC";
     $query_list_blog = mysqli_query($mysql,$sql_list_blog);
	
     
	$sql_cate = "SELECT * FROM tbl_blog WHERE tbl_blog.id_blog='$_GET[id]' LIMIT 1";
	$query_cate = mysqli_query($mysql,$sql_cate);
	$row_title = mysqli_fetch_array($query_cate);
?>
<div class="main_sanpham">
            
            <div class="main_sanpham_right">

                <div class="mid_blog_noidung">
                    <p class="mid_blog_noidung_name"><?php echo $row_title['tieude_blog'] ?></p>
                </div>
                    
                <div class="blog_noidung">
                    <p> <?php echo $row_title['noidung_blog'] ?></p>
                </div>
                    

            </div>
        </div>