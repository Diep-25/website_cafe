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
  <title>ADMIN | tài khoản</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
</head>

<body>
  <?php include "../bar_left.php"; ?>


  <main>
   
      <div class="main_list_menu">
          <div class="main_list_add">
            <div class="main_list_add_list">
                <h2>Danh sách </h2>
            </div>
            <!-- <div class="main_list_add_list">
                <button id="btn_add">Thêm menu</button>
            </div> -->
          </div>
          <div class="search">
            <i class='bx bx-search'></i>
            <input type="text" id = "search_text" class="" placeholder="bạn muốn tìm gì ...">
          </div>
          <div id="table_admin" class="table_admin">
          
          </div>

          <div style="margin-top:40px;margin-bottom:20px" class="main_list_add">
            <div class="main_list_add_list">
                <h2>Danh sách khách hàng cung cấp mã</h2>
            </div>
            <!-- <div class="main_list_add_list">
                <button id="btn_add">Thêm menu</button>
            </div> -->
          </div>
          <table>
                <tr>
                   <th>ID</th>
                   <th>Tên</th>
                   <th>Email</th>
                   <th>Số lần oder</th>
                   <th>Tùy chọn</th>
                </tr>
                <?php 
                $khachhang = mysqli_query($mysql,"SELECT * FROM tbl_taikhoan");
                $i = 0;
                while($showKh = mysqli_fetch_array($khachhang)){
                  $i++;
                ?>

                <tr class="">
                    <td><?php echo $i ?></td>
                    <td><?php echo $showKh['ten_taikhoan'] ?></td>
                    <td><?php echo $showKh['email'] ?></td>
                    <td><?php if($showKh['soluotmua'] > 0){
                        echo $showKh['soluotmua'];
                    }else{
                      echo "Khách hàng mới";
                    } ?></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modals<?php echo $showKh['id_taikhoan']?>" ><i class='bx bx-message-square-edit' ></i></button>
                        
                    </td>
                </tr>
               <?php
                }
               ?>
          </table>
          
          
      </div>
<!-- --------------------------------------------------------khach hang---------------- -->
<?php

$permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyz';
$rand_ma =  substr(str_shuffle($permitted_chars), 0, 5);


        	$queryUPK = mysqli_query($mysql, "SELECT * FROM `tbl_taikhoan`") or die(mysqli_error());
					while($fetchUPK = mysqli_fetch_array($queryUPK)){
    ?>
    <div  class="modal main_add" id="edit_modals<?php echo $fetchUPK['id_taikhoan']?>" >
                  <div class="main_add_list">
                   <form action="edit.php" method="post">
                    <h2>Gửi mã</h2>
                    <p></p>
                    <input type="hidden" name="id_magiam" value="<?php echo $fetchUPK['id_taikhoan']?>"/>
                    <label for="">email khách hàng <sup style="color:red;">*</sup></label><br>
                    <input type="text" name="email_khachhang" placeholder="Nhập email ..." value="<?php echo $fetchUPK['email']?>" required ><br>
                    <label for="">Mã giảm giá<sup style="color:red;">*</sup></label><br>
                    <input type="text" name="ma" placeholder="Nhập mã ..." value="<?php echo $rand_ma ?>" required><br>
                    <label for="">Phần trăm giảm<sup style="color:red;">*</sup></label><br>
                    <input type="text" name="phan_tram" placeholder="Nhập phần trăm giảm ..." value="" required><br>
                    <button name="guima" >Gửi</button>
                    </form>
                    <div data-dismiss="modal" class="main_updata_icon">
                      <i class='bx bxs-message-rounded-x'></i>
                    </div>
                  </div>
                </div>
                <?php
          }
          ?>

    <!-- -------------------------updata------- -->
   
          <!-- ---------------delete------ -->
          <div id="modal_confirm" class="modal main_add">
            <div class="main_add_list_delete">      
              <p>Bạn có chắc muốn xóa không ? </p>
                <div class="main_add_list-cllick">
                  <button data-dismiss="modal"><i class='bx bx-x-circle'></i></button>
                  <button id="btn_yes" ><i class='bx bx-check-square'></i></button>
                </div>
            </div>
          </div>
  </main>


  <?php include '../script.php'?>
</body>
<script>
 // ----------------- tim kiem----------------
 $(document).ready(function(){

load_data();

function load_data(query)
{
 $.ajax({
  url:"search.php",
  method:"POST",
  data:{query:query},
  success:function(data)
  {
   $('#table_admin').html(data);
  }
 });
}
$('#search_text').keyup(function(){
 var search = $(this).val();
 if(search != '')
 {
  load_data(search);
 }
 else
 {
  load_data();
 }
});
});
 
 
  </script>
</html>