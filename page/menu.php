<?php require_once "page/main/xuly/xuly.php"; ?>
<?php	
	$sql_menu = "SELECT * FROM tbl_menu";
	$query_menu = mysqli_query($mysql,$sql_menu);	    		

$cart = (isset($_SESSION["shopping_cart"]))? $_SESSION["shopping_cart"] : [];


if(isset($_SESSION['email'])){

    $sql = "SELECT * FROM tbl_taikhoan WHERE email = '$_SESSION[email]'";
    $run_Sql = mysqli_query($mysql, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        
   
    }
}

$menu = array();

 
while ($row = mysqli_fetch_assoc($query_menu)){
    $menu[] = $row;
   
}
function showCategories($menu, $parent_id = 0, $char = '')
{
    $cate_child = array();
    foreach ($menu as $key => $item)
    {
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($menu[$key]);
        }
    }
     
    if ($cate_child)
    {
        echo '<ul>';
        foreach ($cate_child as $key => $item)
        {
            
            echo '<li><a href="index.php?ql=sanpham&id='.$item['id_menu'].'">'.$item['tenmenu'].'</a>';
            showCategories($menu, $item['id_menu'], $char.'');
           
            echo '</li>';
        }
        echo '</ul>';
    }
}
?>


<header class="header">
<form action="" class="login-form">
                    
                     
                <?php
				    if(isset($_SESSION['email'])){ 
                        
				?>
                        <h3><?php echo $fetch_info['ten_taikhoan'] ?></h3>
                     <div class="login-form_login">
                        <a href="index.php?ql=taikhoan&id_dangky=<?php echo $fetch_info['id_taikhoan'] ?>" ><i class="fas fa-user"></i>Tài Khoản</a>
                    </div>
                    
                    <div class="login-form_login">
                        <a href="index.php?ql=doimatkhau"> <i class="fas fa-key"></i>Đổi Mật Khẩu</a>
                    </div>
                    <?php 
                        if($fetch_info['quyen'] == 1){    
                    ?>
                        <div class="login-form_login">
                            <a href="admin"> <i class="fa fa-cog"></i>Admin</a>
                        </div>
                    <?php
                        }
                    ?>
                    <div class="login-form_login">  
                         <a href="page/main/dangxuat.php"><i class="fas fa-sign-in-alt"></i>Đăng Xuất</a>
                    </div>
                    
                <?php    
                }else{ 
			    ?>
                    <div class="login-form_login">  
                         <a href="index.php?ql=dangnhap"><i class="fas fa-sign-in-alt"></i>Đăng Nhập</a>
                    </div>
                <?php
				    } 
			    ?>
  
            </form>

            <!-- <a href="index.php" class="logo"> <i class="fas fa-coffee"></i> Dducky </a> -->
            <a href="index.php" class="logo" style="display: flex;align-items: center;"> 
                    <!-- <img width="50px" src="./img/Logo_dhktdn.png" alt=""> -->
                    <i style="margin-right:5px" class="fas fa-coffee"></i> 
                    Dducky </a>
         
        
            <nav class="navbar">
                <li><a href="index.php">Trang Chủ</a></li>
                <li><a href="index.php?ql=allmenu">Menu</a>

                    <?php showCategories($menu); ?>
                       
                </li>
                <li><a href="index.php?ql=blog">Blog</a></li>  
                <li><a href="index.php?ql=lienhe">Liên Hệ</a></li>
                
                </nav>
                    
            <div class="icons">
                <div class="fas fa-bars" id="menu-btn"></div>
                <div class="fas fa-search" id="search-btn"></div>
                <div class="fas fa-shopping-cart" id="cart-btn">
                    <span class= "badge"></span>
                </div>
                <div class="fas fa-user" id="login-btn"></div>
            </div>
        
            <form action="index.php?ql=timkiem" class="search-form" method="post" autocomplete="off">
                <input name="tukhoa"  type="search" id="search-box" placeholder="Bạn muốn tìm gì...">
                <button name="timkiem" type="submit"><label for="search-box" class="fas fa-search"></label></button>
            </form>

        </header>
