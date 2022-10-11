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
  <title>ADMIN | blog</title>
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
                <h2>Danh sách blog</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Thêm blog</button>
            </div>
          </div>
          <div class="search">
            <i class='bx bx-search'></i>
            <input type="text" id = "search_text" class="" placeholder="bạn muốn tìm gì ...">
          </div>
          <div id="table_admin" class="table_admin">
          
          </div>
          
      </div>
  
    
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
          <!-- ---------------chi tiet-------------- -->
          <?php
        	$queryUP = mysqli_query($mysql, "SELECT * FROM `tbl_blog`") or die(mysqli_error());
					while($fetchUP = mysqli_fetch_array($queryUP)){
    ?>
          <div id="chitiet_modal<?php echo $fetchUP['id_blog']?>" class="modal main_add">
            <div class="main_chitiet">
              <h2><?php echo $fetchUP['tieude_blog']?></h2>
              <div class="main_chitiet_text">
                <p><?php echo $fetchUP['noidung_blog']?></p>
             </div>
              <div data-dismiss="modal" class="main_add_icon">
                <i class='bx bxs-message-rounded-x'></i>
              </div>
            </div>
          </div>
<?php
          }
?>

  </main>


  <?php include '../script.php'?>
</body>
<style>
  .main_chitiet{
    background: #3d5af1;
    width: 76%;
   padding: 30px;
   position: relative;
}
.main_chitiet_text{
    width: 100%;
    margin-top: 10px;
    margin-bottom: 20px;
}
</style>
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
 
 
  // ------------------ chi tiet--------------

// -----------------add san pham
  var btn = document.getElementById("btn_add");
  
  btn.onclick = function() {
    window.location="add.php";
  }
  
  
  </script>
</html>