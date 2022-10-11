<?php

if(isset($_POST['updata_tk'])){
    $id = $_SESSION['id_khachhang'];
    $_SESSION['nameDh'] = $_POST['ten_taikhoan'];
    $_SESSION['dienthoaiDh'] = $_POST['dienthoai'];
    $_SESSION['diachiDh'] = $_POST['diachi'];
          
    $_SESSION["emailHo"] = $_POST["emailHo"];
}
?>