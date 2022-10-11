<div class="main_datban">
                    <h2>Đặt Phòng</h2>
                    <div class="phonghop">
                        <div class="gt_phonghop">
                            <p>
                                <img src="img/Web banner(1).png" alt="">
                            </p>
                        </div>
                         
                        
                        <?php require_once "page/main/xuly/xuly.php"; ?>
                        
                        <form action="" method="POST">
                        <h3 class="h3">ĐĂNG KÝ PHÒNG HỌP</h3>
                        <span style="color:red;"></span>
                        

                        <input type="text"  name="hoten" value="<?php echo (isset($_SESSION['hoten']))?$_SESSION['hoten']: '' ?>" placeholder="Họ Và Tên" required>
                        
                          <input type="email" name="email" placeholder="Email" value="<?php echo (isset($_SESSION['email']))?$_SESSION['email']: ' ' ?>" required>
                          <input type="number" name="dienthoai" value="<?php echo (isset($_SESSION['sodienthoai']))?$_SESSION['sodienthoai']: ' ' ?>" placeholder="Điện thoại" required>
                          <h3 class="h4">NHU CẦU CỦA BẠN</h3>
                          <span style="text-align:left ;">Loại phòng</span>
                          <select name="loaiphong" id="loaiphong">
                            <option value="0">-----Chọn loại phòng-----</option>
                            <option value="1">Phòng họp riêng</option>
                            <option value="2">Phòng họp lớn</option>
                          </select>
                          <span style="text-align:left ;">Số lượng người</span>
                          <input class="input_DB" max="" value="1" type="number" name="soluong" placeholder="Số Lượng người" required >
                          <span style="text-align:left ;">Ngày đặt</span>
                          <input type="date" name="ngaydat" required>
                          <span style="text-align:left ;">Thời gian</span>
                          <input type="time" name="thoigian" required >
                          <span style="text-align:left ;">Thức uống</span>
                          <input type="text" name="douong" placeholder="Thức uống" required>
                          <?php if(isset($_SESSION['email'])){ ?>
                      <button name = "datban" type="submit">GỬI</button>
                      <?php }else{ ?>
                            <button id = "btn_datphong">Đăng nhập</button>
                        <?php } ?>
                      </form>
                        
                    </div>
                </div>
                <script>
                    document.querySelector('#btn_datphong').onclick = () =>{
                        window.location = "index.php?ql=dangnhap"; 
    
                    }
                </script>
<style>
.phonghop form{
    background: #ffffff9c;
    padding: 16px ;
    margin-right: 30px;
    text-align: center;
    max-width: 300px;
    height: 670px;
    position: relative;
    margin-top: 50px;
}
.phonghop form input{
    width: 100%;
    height: 35px;
    margin-bottom: 15px;
    padding-left: 10px;
    border-radius: 5px;
    border: none;
}
.phonghop form select{
    width: 100%;
    height: 35px;
    margin-bottom: 15px;
    padding-left: 10px;
    border-radius: 5px;
    border: none;
}

</style>
               <script>
  const LoaiPhong = document.getElementById('loaiphong');
  const SoLuong = document.querySelector('.input_DB');
  SoLuong.oninput = () =>{
    if(LoaiPhong.value == 1){
         SoLuong.max = 30
    }
    if(LoaiPhong.value == 2){
        SoLuong.max = 120
    }
if(parseInt(SoLuong.value) > parseInt(SoLuong.max)){  
    SoLuong.value =SoLuong.max
alert('Loại phòng này chỉ chưa tối đa : ' + SoLuong.max + ' Người')    

}
  }


</script>