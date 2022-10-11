<style>
  .sidebar-top h4 a{
    color: #EA8025;
  transition: all 0.3s;
}
.sidebar-top h4 a:hover{
  color: white;
}
</style>
<nav>
    <div class="sidebar-top">
      <span class="shrink-btn">
        <i class='bx bx-chevron-left'></i>
      </span>
      <img src="../../img/log.png" class="logo" alt="">
      <h4 class="hide">ADMIN | <a href="../../">Người dùng</a></h4>
      
    </div>
    
    <div class="search">
    
    </div>

    <div class="sidebar-links">
      <ul>
        <!-- <div class="active-tab"></div> -->
        <li class="tooltip-element" data-tooltip="0">
        <!-- active -->
          <a href="../index" class="" data-active="0">
            <div class="icon">
                <i class='bx bx-home'></i>
                <i class='bx bxs-home'></i>
              
            </div>
            <span class="link hide">Trang Chủ</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="1">
          <a href="../quanly_menu" data-active="1">
            <div class="icon">
                <i class='bx bx-bar-chart-square'></i>
                <i class='bx bxs-bar-chart-square'></i>
            </div>
            <span class="link hide">Quản lý menu</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="2">
          <a href="../quanly_sanpham" data-active="2">
            <div class="icon">
                <i class='bx bx-coffee-togo'></i>
                <i class='bx bxs-coffee-togo'></i>
            </div>
            <span class="link hide">Quản lý sản phẩm</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="3">
          <a href="../quanly_taikhoan" data-active="3">
            <div class="icon">
                <i class='bx bx-user-circle'></i>
                <i class='bx bxs-user-circle'></i>
            </div>
            <span class="link hide">Quản lý tài khoản</span>
          </a>
        </li>
        <li class="tooltip-element" data-tooltip="4">
            <a href="../quanly_blog" data-active="4">
              <div class="icon">
                <i class='bx bx-book-heart'></i>
                <i class='bx bxs-book-heart'></i>
              </div>
              <span class="link hide">Quản lý blog</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="5">
            <a href="../quanly_thongtin" data-active="5">
              <div class="icon">
                <i class='bx bx-book-bookmark'></i>
                <i class='bx bxs-book-bookmark'></i>
              </div>
              <span class="link hide">Quản lý thông tin</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="6">
            <a href="../quanly_donhang" data-active="6">
              <div class="icon">
                <i class='bx bx-cart' ></i>
                <i class='bx bxs-cart' ></i>
              </div>
              <span class="link hide">Quản lý đơn hàng</span>
            </a>
          </li>
          <li class="tooltip-element" data-tooltip="7">
            <a href="../quanly_khachhangvip" data-active="7">
              <div class="icon">
                <i class='bx bx-cart' ></i>
                <i class='bx bxs-cart' ></i>
              </div>
              <span class="link hide">Quản lý mã giảm</span>
            </a>
          </li>
         
          
          
        <div class="tooltip">
          <!-- <span class="show">Trang chủ</span> -->
          <span>Trang chủ</span>
          <span>Quản lý menu</span>
          <span>Quản lý sản phẩm</span>
          <span>quản lý tài khoản</span>
          <span>quản lý blog</span>
          <span>quản lý thông tin</span>
          <span>quản lý đơn hàng</span>
          <span>quản lý mã giảm</span>
          


        </div>
      </ul>
<?php
$query = mysqli_query($mysql, "SELECT * FROM `tbl_taikhoan` WHERE `id_taikhoan` = '$_SESSION[user]'") or die(mysqli_error());
$fetch = mysqli_fetch_array($query);
?>
      

    <div class="sidebar-footer">
      
      <div class="admin-user tooltip-element" data-tooltip="1">
        <div class="admin-profile hide">
          <img src="../../img/admin.jpg" alt="">
          <div class="admin-info">
            <h3>ADMIN</h3>
            <h5><?php echo $fetch['ten_taikhoan'] ?></h5>
          </div>
        </div>
        <a href="../logout.php" class="log-out">
          <i class='bx bx-log-out'></i>
        </a>
      </div>
      <div class="tooltip">
        <span class="show"><?php echo $fetch['ten_taikhoan'] ?>n</span>
        <span>Logout</span>
      </div>
    </div>
  </nav>