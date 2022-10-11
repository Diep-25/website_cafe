<?php
    
	$sql_list_blog = "SELECT * FROM tbl_blog ORDER BY id_blog DESC";
	$query_list_blog = mysqli_query($mysql,$sql_list_blog);
?>
<div class="main_blog">
                    <h2>Blog</h2>
                    <div class="main_blog-title">
                        <h3>Những Blog Nổi Bật</h3>
                        <?php 
                            while($row = mysqli_fetch_array($query_list_blog)){
                        ?>
                        <div class="main_blog-title-img">
                          <div >
                            <a href="index.php?ql=blog_noidung&id=<?php echo $row['id_blog'] ?>"><img src="admin/quanly_blog/upload/<?php echo $row['anh_blog'] ?>" alt=""></a>
                          </div>
                          <div class="main_blog-title-text">
                              <a href="index.php?ql=blog_noidung&id=<?php echo $row['id_blog'] ?>"><p class="tieude"><?php echo $row['tieude_blog'] ?></p></a>
                              <p><?php echo $row['tomtatnoidung_blog'] ?></p>
                          </div>
                           
                        </div>
                          <?php
                            }
                          ?>
                       
                    </div>
                </div>