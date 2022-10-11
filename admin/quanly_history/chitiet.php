

<?php
require '../chung.php';
  require_once '../config/config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN | chi tiết đơn hàng</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <?php include "../bar_left.php"; ?>


  <main>
  <?php
$code = $_GET['code'];
$sql_lietke_dh = "SELECT * FROM tbl_chitietgiohang,tbl_sanpham WHERE tbl_chitietgiohang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietgiohang.ma_giohang='".$code."' ORDER BY tbl_chitietgiohang.id_giohangchitiet DESC";
$query_lietke_dh = mysqli_query($mysql,$sql_lietke_dh);
?>
<div class="main_list_menu">
<div class="main_list_add">
            <div class="main_list_add_list">
                <h2>Chi tiết đơn hàng</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Quay lại</button>
            </div>
          </div>
          <div class="search">
            <!-- <i class='bx bx-search'></i>
            <input type="text" id = "search_text" class="" placeholder="bạn muốn tìm gì ..."> -->
          </div>
            <table>
                <tr>
                    <th>ID</th>
                    <th>Mã Đơn Hàng</th>
                    <th>Tên Sản Phẩm</th>
                    <th>Số Lượng Mua</th>
                    <th>Đơn Giá</th>                      
                    <th>Thành Tiền</th>
                </tr>
                <?php
                    $i = 0;
                     $tongtien = 0;
                     while($row = mysqli_fetch_array($query_lietke_dh)){
                      $maGiam = mysqli_query($mysql,"SELECT * FROM tbl_magiam WHERE ma_giohang = '$code'");
                      $showMa = mysqli_fetch_array($maGiam);
                      if(mysqli_num_rows($maGiam) > 0){
                        $showphan = $showMa['phan_tram'];
                      }else{
                        $showphan = "0";
                      }
                      $i++;
                      $thanhtien = $row['gia_sanpham']*$row['soluongmua'];
                      $tongtien += $thanhtien ;
                      $tong_giamgia = ($tongtien * $showphan)/100;
                      $tong = $tongtien -$tong_giamgia;
                ?>
                <tr>
                    
                    <td name="ID"><?php echo $i ?></td>
                    <td name="Mã Đơn Hàng"><?php echo $row['ma_giohang'] ?></td>
                    <td name="Tên Thực Đơn"><?php echo $row['ten_sanpham'] ?></td>            
                    <td name="Số Lượng"><?php echo $row['soluongmua'] ?></td>  
                    <td name="Đơn Giá"><?php echo number_format($row['gia_sanpham'],0,',','.') ?><sup style="color: red;">đ</sup></td>                         
                    <td name="Thành Tiền"><?php echo number_format($thanhtien,0,',','.') ?><sup style="color: red;">đ</sup></td>
                </tr> 
                <?php
                 } 
                ?>
                <tr>
                      <td colspan="6" name="Tổng Tiền">
                      <div class="shopping_btn">
                          <p>Thành tiền : <?php echo number_format($tongtien,0,',','.') ?><sup style="color: red;">đ</sup></p>
                          <p>Giảm : <?php echo $showphan; ?> %</p>
                           <p>Tổng Tiền : <?php echo number_format($tong,0,',','.') ?><sup style="color: red;">đ</sup></p>
                    </div>     
                       </td>
                </tr> 
            </table>  
</div>
</main>
</body>
<script>
     var btn = document.getElementById("btn_add");

  
btn.onclick = function() {
  window.location="index.php";
}

</script>
</html>

