
            <div class="main_datban">
                <h2>Đơn hàng của tôi</h2>
                <div class="main_donhang_user">
                    <table>
                        <tr>
                            <th>Tên</th>
                            <th>Số điện thoại</th>
                            <th>Địa chỉ</th>
                            <th>Email</th>
                            <th>Thời gian</th>
                            <th>Tình trạng</th>
                            <th>Tùy chọn</th>
                        </tr>
                        <?php 
                        $email = $_SESSION['email'];
                        $ma = '';
                    
                        $donhang = mysqli_query($mysql,"SELECT * FROM tbl_giohang WHERE email ='$email' ORDER BY tbl_giohang.thoi_gian DESC");
                        if(mysqli_num_rows($donhang)>0){
                        while($row = mysqli_fetch_array($donhang)){
                            
                         ?>
                        <tr>
                            <?php $ma = $row['ma_giohang'] ?>
                            <td><?php echo $row['ten_khachhang'] ?></td>
                            <td><?php echo $row['dienthoai'] ?></td>
                            <td><?php echo $row['diachi'] ?></td>
                            <td><?php echo $row['email'] ?></td>
                            <td><?php echo $row['thoi_gian'] ?></td>
                            <td><?php if($row['tinhtrang']==0){
                                echo "Đơn hàng đã giao";
                            }else{
                                echo "<p style='color:red;'>Đơn hàng chưa giao</p>";
                            } ?></td>
                            <td><p class="main_donhang_user_chitiet" id="<?php echo $row['ma_giohang'] ?>">Chi tiết đơn hàng <?php echo $row['ma_giohang'] ?></p></td>
                        </tr>
                        <?php
                        }
                    }else{
                        
                   
                        ?>
                        <tr>
                            <td colspan="6">Không có đơn hàng được đặt</td>
                        </tr>
                        <?php
                    }
                        ?>
                    </table>
                    
                    <div class="main_donhang_user_chitietdon donhang_active">
                        
                    </div>
                </div>
                
            </div>
            <script>
    
    $(document).ready(function(){
 
        $('.main_donhang_user_chitiet').on('click', function(){
            var ma_giohang = $(this).attr('id');
            $(this).attr('name', ma_giohang);
            var id = $(this).attr('name');
            $.ajax({
                type: "POST",
                url: "page/main/xuly/xuly_donhang_user.php",
                data:{
                    ma_giohang: id
                },
                success: function(date){
                    
                    $(".main_donhang_user_chitietdon").html(date);
                    
                }
            });
        });
    });
    
    </script>
<script>
    const ChiTiet = document.getElementsByClassName("main_donhang_user_chitiet"); 
    const ChiTietDon = document.querySelector(".main_donhang_user_chitietdon");
   for (var i = 0; i < ChiTiet.length; i++) {
      ChiTiet[i].onclick = function(){
      ChiTietDon.classList.toggle("donhang_active")
      
   }
}
    
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

document.querySelector('#cart-btn').onclick = () =>{
  window.location = "index.php?ql=giohang"; 
    
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
</script>

<style>
    .main_donhang_user table{
    width: 100%;
    border-collapse: collapse;

}
.main_donhang_user{
    margin-bottom: 30px;
}
.main_donhang_user table,tr,td,th{
    border: 1px solid #EA8025;
}
.main_donhang_user table th{
    padding: 5px 5px;
}
.main_donhang_user table td{
    text-align: center;
    padding: 5px 5px;
}
.main_donhang_user table tr .main_donhang_user_chitiet{
    color: #EA8025;
    font-size: 18px;
    cursor: pointer;
}
.main_donhang_user table tr .main_donhang_user_chitiet:hover{
    color: #000033;
}

.donhang_active{
    display: none;
}
</style>