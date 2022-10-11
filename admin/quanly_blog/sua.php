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
  <script src="../file/ckeditor/ckeditor.js"></script>
</head>

<body>
  <?php include "../bar_left.php"; ?>
  <main>


      <div class="main_list_menu">
          <div class="main_list_add">
            <div class="main_list_add_list">
                <h2>Sửa blog</h2>
            </div>
            <div class="main_list_add_list">
                <button id="btn_add">Danh sách blog</button>
            </div>
          </div>
      <div class="main_add_sanpham">
      <?php
        	$query = mysqli_query($mysql, "SELECT * FROM tbl_blog WHERE id_blog='$_GET[id_blog]' LIMIT 1") or die(mysqli_error());
					$fetch = mysqli_fetch_array($query);
    ?>
         <form action="edit.php" method="post" enctype="multipart/form-data" >
         <input type="hidden" name="id_blog" value="<?php echo $fetch['id_blog']?>"/>
             <label for="">Tiêu đề<sup style="color: red;">*</sup></label>
            <div><input type="text" name ="tieude_blog" placeholder="Nhập tiêu đề ..." value="<?php echo $fetch['tieude_blog'] ?>" required></div>
            <label for="">Ảnh blog<sup style="color: red;">*</sup></label>
            <div class="main_add_upanh">
                <input type="file" name="anh_blog" accept="image/*" onchange="loadFile(event)">
                <img id = "output" src="upload/<?php echo $fetch['anh_blog'] ?>" alt="" width="150px">
            </div>
            <label for="">Tóm tắt nội dung<sup style="color: red;">*</sup></label>
            <div><textarea name="tomtatnoidung_blog" id="editor2" cols="30" rows="10"><?php echo $fetch['tomtatnoidung_blog'] ?></textarea></div>
            <label for="">Nội dung<sup style="color: red;">*</sup></label>
            <div><textarea name="noidung_blog" id="editor1" cols="30" rows="10"><?php echo $fetch['noidung_blog'] ?></textarea></div>
            
            <button name="sua" >Sửa</button>
         </form>
         
      </div>    
      
  </main>

  <script src="./js/main.js"></script>
</body>
<script>

CKEDITOR.replace( 'editor1' );
CKEDITOR.replace( 'editor2' );

//load ảnh 
var loadFile = function(event) {
            var output = document.getElementById('output');
            output.src = URL.createObjectURL(event.target.files[0]);
            output.onload = function() {
                URL.revokeObjectURL(output.src) 
            }
        };
//  ---------addddddddd
  
  var btn = document.getElementById("btn_add");

  
  btn.onclick = function() {
    window.location="index.php";
  }
  
  

  </script>
</html>