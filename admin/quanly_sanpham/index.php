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
  <title>ADMIN | menu</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
  <script src="../file/ckeditor/ckeditor.js"></script>
</head>
<style>
  .main_add_list{
    width: 600px;
   margin-left: 10%;
   margin-top: 30px;
   background: #3d5af1;
    position: relative;

}
.main_updata_icon{
    position: absolute;
    top: -5px;
    right: 5px;
    font-size: 40px;
    color: white;
    cursor: pointer;
     transition: all 0.2s;
 }
 .main_chitiet_text{
    width: 100%;
    margin-top: 10px;
    margin-bottom: 20px;
    padding-bottom: 30px;
}
.main_add_list  button{
    position: absolute;
    right: 60px;
    bottom: 40px;
    padding: 5px 15px;
    font-weight: bold;
    border: 1px solid white;
    color: #3d5af1;
    border-radius: 20px;
    transition: all 0.3s;
    margin-bottom: 20px;
}
</style>

<body>
  <?php include "../bar_left.php";
  include "function.php";
  
  ?>


  <main>
    <div id="main_add" class="main_add">
      <div class="main_add_list">
        <form action="save.php" method="post" enctype="multipart/form-data" >
          <h2>Thêm sản phẩm</h2>
          <p></p>
          <label for="">Tên sản phẩm<sup style="color: red;">*</sup></label>
            <div><input type="text" name ="ten_sanpham" placeholder="Nhập tên sản phẩm ..." required></div>
            <label for="">Giá sản phẩm<sup style="color: red;">*</sup></label>
            <div><input type="number" name ="gia_sanpham" placeholder="Nhập giá sản phẩm ..." required></div>
            <label for="">Số lượng sản phẩm<sup style="color: red;">*</sup></label>
            <div><input type="number" name ="soluong" placeholder="Nhập số lượng sản phẩm ..." ></div>
            <label for="">Ảnh sản phẩm<sup style="color: red;">*</sup></label>
            <div class="main_add_upanh">
                <input type="file" name="anh_sanpham" accept="image/*" onchange="loadFile(event)" required>
                <img id = "output" src="" alt="" width="150px">
            </div>
            <label for="">Chi tiết sản phẩm<sup style="color: red;">*</sup></label>
            <div><textarea name="chitiet_sanpham" id="editor1" cols="30" rows="10"></textarea></div>
            <label  for="">Menu sản phẩm<sup style="color: red;">*</sup></label>
            <div><select name="menu" id="" required>
               
                <?php showMenu($menu); ?>    
              </select></div>
            <button name="save" >Thêm</button>
        </form>
        <div class="main_add_icon">
          <i class='bx bxs-message-rounded-x'></i>
        </div>
      </div>
    </div>
      <div class="main_list_menu">
          <div class="main_list_add">
            <div class="main_list_add_list">
                <h2>Danh sách sản phẩm</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Thêm sản phẩm</button>
            </div>
          </div>
          <div class="search">
            <i class='bx bx-search'></i>
            <input type="text" id = "search_text" class="" placeholder="bạn muốn tìm gì ...">
          </div>
          <div id="table_admin" class="table_admin">
          
          </div>
      </div>
   <!-- ---------------chi tiet-------------- -->
   <?php
        	$queryUP = mysqli_query($mysql, "SELECT * FROM `tbl_sanpham`") or die(mysqli_error());
					while($fetchUP = mysqli_fetch_array($queryUP)){
    ?>
          <div id="chitiet_modal<?php echo $fetchUP['id_sanpham']?>" class="modal main_add">
            <div class="main_chitiet">
              <h2>Chi tiết sản phẩm (<?php echo $fetchUP['ten_sanpham']?>)</h2>
              <div class="main_chitiet_text">
                <p><?php echo $fetchUP['chitiet_sanpham']?></p>
             </div>
              <div data-dismiss="modal" class="main_add_icon">
                <i class='bx bxs-message-rounded-x'></i>
              </div>
            </div>
          </div>
<?php
          }
?>
<!-- -------------------------updata------- -->
<?php
        	$queryUP = mysqli_query($mysql, "SELECT * FROM `tbl_sanpham`") or die(mysqli_error());
					while($fetchUP = mysqli_fetch_array($queryUP)){
    ?>
    <div  class="modal main_add" id="edit_modal<?php echo $fetchUP['id_sanpham']?>" >
                  <div class="main_add_list">
                   <form action="edit.php" method="post" enctype="multipart/form-data">
                    <h2>Sửa sản phẩm</h2>
                    <p></p>
                    <input type="hidden" name="id_sanpham" value="<?php echo $fetchUP['id_sanpham']?>"/>
                    <label for="">Tên sản phẩm<sup style="color: red;">*</sup></label>
                    <div><input type="text"  name ="ten_sanpham" value ="<?php echo $fetchUP['ten_sanpham'] ?>" placeholder="Nhập tên sản phẩm ..." required></div>
                    <label for="">Giá sản phẩm<sup style="color: red;">*</sup></label>
                    <div><input type="number" name ="gia_sanpham"  value ="<?php echo $fetchUP['gia_sanpham'] ?>" placeholder="Nhập giá sản phẩm ..." required></div>
                    <label for="">Số lượng sản phẩm<sup style="color: red;">*</sup></label>
                    <div><input type="number" name ="soluong"  value ="<?php echo $fetchUP['soluong'] ?>" placeholder="Nhập số lượng sản phẩm ..." ></div>
                    <label for="">Ảnh sản phẩm<sup style="color: red;">*</sup></label>
                    <div class="main_add_upanh">
                        <input type="file" name="anh_sanpham" accept="image/*" onchange="loadFile(event)">
                        <img id = "output" src="upload/<?php echo $fetchUP['anh_sanpham'] ?>" alt="" width="150px">
                   </div>
                    <label for="">Chi tiết sản phẩm<sup style="color: red;">*</sup></label>
                    <div><textarea name="chitiet_sanpham" id="editor2" cols="30" rows="10"><?php echo $fetchUP['ten_sanpham'] ?></textarea></div>
                    <label  for="">Menu sản phẩm<sup style="color: red;">*</sup></label>
                    <div><select name="menu" id="" required>
                       
                        <?php showMenu($menu); ?>
                      </select></div>
                    <button name="sua" >Sửa</button>
                    </form>
                    <div data-dismiss="modal" class="main_updata_icon">
                      <i class='bx bxs-message-rounded-x'></i>
                    </div>
                  </div>
                </div>
                <?php
          }
          ?>

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
  CKEDITOR.replace( 'editor1' );
  CKEDITOR.replace( 'editor2' );
 
  var modal = document.getElementById("main_add");
  
  
  var btn = document.getElementById("btn_add");
  

  var span = document.getElementsByClassName("main_add_icon")[0];
  
  btn.onclick = function() {
    modal.style.display = "block";
  }
  
  span.onclick = function() {
    modal.style.display = "none";
  }
  
  window.onclick = function(event) {
    if (event.target == modal) {
      modal.style.display = "none";
    }
  }



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