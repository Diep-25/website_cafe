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
</head>

<body>
  <?php include "../bar_left.php";
        include "function.php";
   ?>


  <main>
    <div id="main_add" class="main_add">
      <div class="main_add_list">
        <form action="save.php" method="post">
          <h2>Thêm menu</h2>
          <p></p>
          <label  for="">Nhập menu<sup style="color: red;">*</sup></label>
          <div>
            <input type="text" name ="tenmenu" placeholder="Nhập menu ..." required>
          </div>
          <label  for="">Chọn menu cha<sup style="color: red;">*</sup></label>
          <div>
            <select name="parent_id" required>
              <option value="0">--------Chọn menu---------</option>
                <?php showMenu($menu); ?>        
            </select>
          </div>
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
                <h2>Danh sách menu</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Thêm menu</button>
            </div>
          </div>
          <div class="search">
            <i class='bx bx-search'></i>
            <input type="text" id = "search_text" class="" placeholder="bạn muốn tìm gì ...">
          </div>
          <div id="table_admin" class="table_admin">
          
          </div>
      </div>
    <!-- -------------------------updata------- -->
    <?php
        	$queryUP = mysqli_query($mysql, "SELECT * FROM `tbl_menu`") or die(mysqli_error());
					while($fetchUP = mysqli_fetch_array($queryUP)){
    ?>
    <div  class="modal main_add" id="edit_modal<?php echo $fetchUP['id_menu']?>" >
                  <div class="main_add_list">
                   <form action="edit.php" method="post">
                    <h2>Sửa menu</h2>
                    <p></p>
                    <input type="hidden" name="id_menu" value="<?php echo $fetchUP['id_menu']?>"/>
                    <label  for="">Nhập menu<sup style="color: red;">*</sup></label>
                    <div>

                      <input type="text" name="tenmenu" placeholder="Nhập menu ..." value="<?php echo $fetchUP['tenmenu'] ?>" required >
                    </div>
                    <label  for="">Chọn menu cha<sup style="color: red;">*</sup></label>
                      <div>
                        <select name="parent_id" required>
                          <option value="0">--------Chọn menu---------</option>
                            <?php showMenu($menu); ?>        
                        </select>
                      </div>
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