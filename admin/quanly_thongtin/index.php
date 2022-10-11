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
  <title>ADMIN | thông tin</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
  <script src="../file/ckeditor/ckeditor.js"></script>
</head>
<style>
    .main_thongtin{
    margin-top: 20px;
}
.main_thongtin h2{
    margin-bottom: 20px;
}
.main_thongtin button{
    margin-top: 30px;
    margin-bottom: 50px;
    padding: 10px 30px;
    font-weight: bold;
    border: 1px solid #3d5af1;
    color: #3d5af1;
    border-radius: 20px;
    transition: all 0.3s;
}
.main_thongtin button:hover{
    color: white;
    background: #3d5af1;

}
</style>

<body>
  <?php include "../bar_left.php"; ?>


  <main>
    <div id="main_add" class="main_add">
      <div class="main_add_list">
        <form action="save.php" method="post" enctype="multipart/form-data">
          <h2>Thêm ảnh thông tin</h2>
          <p></p>
          <input type="file" name="anh_thongtin" accept="image/*" onchange="loadFile(event)" required>
                <img id = "output" src="" alt="" width="150px">
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
                <h2>Danh sách ảnh thông tin</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Thêm ảnh</button>
            </div>
          </div>
          <div class="search">
            <!-- <i class='bx bx-search'></i> -->
            <input type="hidden" class="hide" placeholder="bạn muốn tìm gì ...">
          </div>
          <table>
                <tr>
                   <th>ID</th>
                   <th>ảnh</th>
                   <th>Tùy chọn</th>
                </tr>
                <?php
                $i = 0;
					$query = mysqli_query($mysql, "SELECT * FROM `tbl_anhthongtin`") or die(mysqli_error());
					while($fetch = mysqli_fetch_array($query)){
            $i++;
				?>
                <tr class="del_user<?php echo $fetch['id_anhthongtin']?>">
                    <td><?php echo $i?></td>
                    <td><img src="upload/<?php echo $fetch['anh_thongtin']?>" width="150px"></td>
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal<?php echo $fetch['id_anhthongtin']?>" ><i class='bx bx-message-square-edit' ></i></button>
                        <button class ="btn-delete" id="<?php echo $fetch['id_anhthongtin']?>"><i class='bx bx-message-square-x' ></i></button>
                       
                        <!-- <a href="">
                            <i class='bx bx-message-square-detail' ></i>
                        </a> -->
                    </td>
                </tr>
                
                <?php
          }
                ?>
          </table>
          <div class="main_thongtin">
            <h2>Cập nhật thông tin</h2>
            <?php
            $query = mysqli_query($mysql, "SELECT * FROM `tbl_thongtin`") or die(mysqli_error());
            while($fetch = mysqli_fetch_array($query)){
            ?>
            <form action="edit.php" method="post">
            <input type="hidden" name="id_thongtin" value="<?php echo $fetch['id_thongtin']?>"/>
              <textarea name="noidung_thongtin" id="editor1" cols="30" rows="10"><?php echo $fetch['noidung_thongtin']?></textarea>
              <button name="capnhat" >Cập nhật</button>
            </form>
            <?php
            }
            ?>
        </div>
      </div>
    <!-- -------------------------updata------- -->
    <?php
        	$queryUP = mysqli_query($mysql, "SELECT * FROM `tbl_anhthongtin`") or die(mysqli_error());
					while($fetchUP = mysqli_fetch_array($queryUP)){
            
    ?>
    <div  class="modal main_add" id="edit_modal<?php echo $fetchUP['id_anhthongtin']?>" >
                  <div class="main_add_list">
                   <form action="edit.php" method="post" enctype="multipart/form-data">
                    <h2>Sửa ảnh thông tin</h2>
                    <p></p>
                    <input type="hidden" name="id_anhthongtin" value="<?php echo $fetchUP['id_anhthongtin']?>"/>
                    <input type="file" name="anh_thongtin" accept="image/*" onchange="loadFile1(event)" >
                        
                        <img id = "outputedit1" src="upload/<?php echo $fetchUP['anh_thongtin']?>" alt="" width="150px">
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
 //load ảnh 
var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
            

        };
        

        // ------------adddd
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
  // ---------------------- delete--------

$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var id_anhthongtin = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', id_anhthongtin);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				id_anhthongtin: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_user" + id).empty();
				$(".del_user" + id).html("<td colspan='5'><center class='text-danger'>Đang xóa ...</center></td>");
				setTimeout(function(){
					$(".del_user" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});

  </script>
</html>