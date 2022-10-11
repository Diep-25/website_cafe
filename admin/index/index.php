<?php
require '../chung.php';
  require_once '../config/config.php';
  $menu = mysqli_query($mysql, "SELECT * FROM tbl_menu");
    $countMenu = mysqli_num_rows($menu);

  // ---------------------
  $sanpham = mysqli_query($mysql,"SELECT *FROM tbl_sanpham");
    $countSanpham = mysqli_num_rows($sanpham);
  // --------------------
  $taikhoan = mysqli_query($mysql, "SELECT * FROM tbl_taikhoan");
    $countTaikhoan = mysqli_num_rows($taikhoan); 
   //--------------------------
  $blog = mysqli_query($mysql,"SELECT * FROM tbl_blog");
    $countBlog = mysqli_num_rows($blog);
   //----------------------------
   $donhang = mysqli_query($mysql,"SELECT * FROM tbl_giohang WHERE tinhtrang=1");
    $countDonhang = mysqli_num_rows($donhang); 
      //-------------------------- 
    $donhangduyet = mysqli_query($mysql,"SELECT * FROM tbl_giohang WHERE tinhtrang=0");
    $countDonhangDuyet = mysqli_num_rows($donhangduyet); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ADMIN | trang chủ</title>
  <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script type="text/javascript" src="https://www.google.com/jsapi"></script>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/main.css">
  <script src="./file/ckeditor/ckeditor.js"></script>
</head>


<body>
        <?php include "../bar_left.php"; ?>

  <main>
    <h2>Trang chủ</h2>
    <div class="main_index_admin">
      <h3>Tổng quan</h3>
      <div class="main_index_admin_wrap">
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
            <i class='bx bx-bar-chart-square'></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"> <?php echo $countMenu ?> </p>
            <p>Menu</p>
          </div>
        </div>
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
            <i class='bx bx-coffee-togo'></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"><?php echo $countSanpham ?></p>
            <p>Sản phẩm</p>
          </div>
        </div>
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
            <i class='bx bx-user-circle'></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"><?php echo $countTaikhoan ?></p>
            <p>Tài khoản</p>
          </div>
        </div>
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
            <i class='bx bx-book-heart'></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"><?php echo $countBlog ?></p>
            <p>Blog</p>
          </div>
        </div>
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
          <i class='bx bx-cart' ></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"><?php echo $countDonhang ?></p>
            <p>Đơn hàng chưa duyệt</p>
          </div>
        </div>
        <div class="main_index_admin_wrap_main">
          <div class="main_index_admin_wrap_main-icon">
          <i class='bx bx-history'></i>
          </div>
          <div class="main_index_admin_wrap_main_text">
            <p class="main_index_admin_wrap_main_text-number"><?php echo $countDonhangDuyet ?></p>
            <p>Đơn hàng đã duyệt</p>
          </div>
        </div>
        
        
       
      </div>
    </div>
    <div class="main_index_admin_chart">
      <div class="main_index_admin_chart_flex">
        <h3>Sơ đồ thống kê doanh thu theo : <span id="text-date"></span></h3>
      <div class="select_thongke">
        <select class="select-date">
		      <option value="7ngay">1 tuần qua</option>
		      <option value="28ngay">1 tháng qua</option>
		      <option value="365ngay">1 năm qua</option>
	      </select>
      </div>
      </div>
      <div id="chart" style="height: 250px;"></div>
    </div>
    


      
  </main>

  <script src="./js/main.js"></script>

</body>
<style>
  .main_index_admin{
    margin-top: 30px;
}
.main_index_admin_wrap{
    display: flex;
    flex-wrap: wrap;
}
.main_index_admin_wrap_main{
    display: flex;
    background: #3d5af1;
    padding: 15px 20px;
    margin: 10px 20px;
    border-radius: 10px;
}
.main_index_admin_wrap_main-icon{
    color: white;
    font-size: 50px;
    line-height: 80px;
}
.main_index_admin_wrap_main_text{
    margin: 0 10px;
    margin-top: 10px;
}
.main_index_admin_wrap_main_text-number{
    color: white;
}
.main_index_admin_chart{
  margin-top: 20px;
  border-top: 1px solid #3651d4;
  padding-top: 20px;
  margin-bottom: 40px;
}
.main_index_admin_chart_flex{
  display: flex;
  justify-content: space-between;
  margin-bottom: 20px;
}
.main_index_admin_chart_flex h3{
  font-size: 20px;
}
.select_thongke{
  margin-right: 20%;
}
.select_thongke select{
  width: 150px;
  height: 30px;
  border: 1px solid #3651d4;
  border-radius: 30px;
  padding-left: 10px;
  font-size: 16px;
  font-family:Arial, Helvetica, sans-serif;
}


</style>
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
<script>
  $(document).ready(function(){
   		thongke();
      
	    var char = new Morris.Line({
		
		  element: 'chart',
		
		  xkey: 'date',
		 
		  ykeys: ['sales','order','quantity'],
      // ykeys: ['order','sales','quantity'],
		
		  labels: ['Doanh thu','Đơn hàng','Số lượng bán ra']
		});
    

		$('.select-date').change(function(){
            var thoigian = $(this).val();
            if(thoigian=='7ngay'){
                var text = 'tuần';
            }else if(thoigian=='28ngay'){
                var text = 'tháng';
            }else{
                var text = 'năm';
            }

             $.ajax({
                    url:"../quanly_thongke/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    data:{thoigian:thoigian},
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
                
        })
		 function thongke(){
                var text = 'tuần';
                $('#text-date').text(text);
                $.ajax({
                    url:"../quanly_thongke/thongke.php",
                    method:"POST",
                    dataType:"JSON",
                    success:function(data)
                    {
                        char.setData(data);
                        $('#text-date').text(text);
                    }   
                });
            }
            
	});
</script>

</html>