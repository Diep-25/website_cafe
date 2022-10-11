<?php
// $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzQWERTYUIOPLKJHGFDSAZXCVBNM';
// $rand_ma =  substr(str_shuffle($permitted_chars), 0, 5);
$errors = array();
if(isset($_POST['nhapma'])){
    $ma = $_POST['ma'];
    $queryma = mysqli_query($mysql,"SELECT * FROM tbl_magiam WHERE ma = '$ma' AND email_khachhang = '$_SESSION[email]'");
    if(mysqli_num_rows($queryma)>0){
    $showma = mysqli_fetch_assoc($queryma);
    $phantram = $showma['phan_tram'];
        if(count($errors) == 0){
            if($showma['tinh_trang'] == 1){
                $errors['tc'] = "Áp dụng mã thành công";  
                $_SESSION['giam'] = $phantram;
                $_SESSION['ma'] = $ma;
            }else{
                $errors['mainfo'] = "Mã đã được sử dụng";  
                unset($_SESSION['giam']);
                unset($_SESSION['ma']);
            }
    
        }
    }else{
        $errors['saima'] = "Mã giảm giá không chính xác hoạc mã giảm không áp dụng email này";
    }      
}
?>