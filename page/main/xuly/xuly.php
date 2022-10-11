
<?php 
$email = "";
$name = "";
$errors = array();
require "sendmail.php";

if(isset($_POST['signup'])){
    $name = mysqli_real_escape_string($mysql, $_POST['ten_taikhoan']);
    $email = mysqli_real_escape_string($mysql, $_POST['email']);
    $dienthoai = mysqli_real_escape_string($mysql, $_POST['dienthoai']);
    $diachi = mysqli_real_escape_string($mysql, $_POST['diachi']);
    $password = mysqli_real_escape_string($mysql, $_POST['password']);
    $cpassword = mysqli_real_escape_string($mysql, $_POST['cpassword']);
    if($password !== $cpassword){
        $errors['password'] = "Mật khẩu không khớp!";
    }
    $email_check = "SELECT * FROM tbl_taikhoan WHERE email = '$email'";
    $res = mysqli_query($mysql, $email_check);
    if(mysqli_num_rows($res) > 0){
        $errors['email'] = "Email đã được đăng ký!";
    }
    if(count($errors) === 0){
        $encpass = password_hash($password, PASSWORD_BCRYPT);
        $code = rand(999999, 111111);
        $status = "notverified";
        $insert_data = "INSERT INTO tbl_taikhoan (ten_taikhoan, email, dienthoai, diachi, password, code, status)
                        values('$name', '$email', '$dienthoai', '$diachi', '$encpass', '$code', '$status')";
        $data_check = mysqli_query($mysql, $insert_data);
        if($data_check){
            $mail->setFrom('diep25032001@gmail.com', 'Dducky Caffe');
            $mail->addAddress((String)$email);
            $mail->isHTML(true);  
            $mail->Subject = 'Mã Xác Minh Email';
            $mail->Body = "<div class='mail_main' style='width:400px;margin:auto;background: #000033;padding: 40px;'>
                                <h1 style='color: darkorange;text-align: center;margin-bottom: 15px;'>Dducky Caffe</h1>
                                <p style=' color: white;font-size:18px;'>Mã xác minh của bạn là : $code</p>
                            </div>";
    
        
            if($mail->send()){
                $info = "Mã xác minh đã gửi đến email - $email";
                $_SESSION['info'] = $info;
                
                header('location: index.php?ql=check');
                
            }else{
                $errors['otp-error'] = "Gửi mã không thành công!";
            }
            
        }else{
            $errors['db-error'] = "chèn dữ liệu vào database không thành công!";
        }
    }

}
    
    if(isset($_POST['check'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($mysql, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_taikhoan WHERE code = $otp_code";
        $code_res = mysqli_query($mysql, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $fetch_code = $fetch_data['code'];
            $email = $fetch_data['email'];
            $code = 0;
            $status = 'verified';
            $update_otp = "UPDATE tbl_taikhoan SET code = $code, status = '$status' WHERE code = $fetch_code";
            $update_res = mysqli_query($mysql, $update_otp);
            if($update_res){
                $errors['otp'] = "Tài khoản đã được xác thực!";
                mysqli_query($mysql,"INSERT INTO tbl_magiam (ma,phan_tram,email_khachhang,tinh_trang) VALUES ('q8b5x','30','$email',1)") ;
                
                header('location: index.php?ql=dangnhap');
                
            }else{
                $errors['otp-error'] = "Cập nhật mã không thành công!";
            }
        }else{
            $errors['otp-error'] = "Nhập sai mã!";
        }
    }

    
    if(isset($_POST['login'])){
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $password = mysqli_real_escape_string($mysql, $_POST['password']);
        $check_email = "SELECT * FROM tbl_taikhoan WHERE email = '$email'";
        $res = mysqli_query($mysql, $check_email);
        if(mysqli_num_rows($res) > 0){
            $fetch = mysqli_fetch_assoc($res);
            $fetch_pass = $fetch['password'];
            if(password_verify($password, $fetch_pass)){
                $_SESSION['email'] = $email;
                $status = $fetch['status'];
                if($status == 'verified'){
                  $_SESSION['email'] = $email;
                  $_SESSION['password'] = $password;
                  $_SESSION['hoten'] = $fetch['ten_taikhoan'];
                  $_SESSION['sodienthoai'] = $fetch['dienthoai'];
                  $_SESSION['id_khachhang'] = $fetch['id_taikhoan'];
                  $errors['email'] = "Đăng nhập thành công";
                  
                  header( "refresh:1;index.php" );
                    // echo "<script>alert('Đăng nhập thành công ')</script>";
                    // echo "<script>window.location = 'index.php'</script>";
                }else{
                    $info = "Bạn cần xác minh email của mình - $email";
                    $_SESSION['info'] = $info;
                    header('location: index.php?ql=check');
                }
            }else{
                $errors['email'] = "Email hoạc mật khẩu không đúng!";
            }
        }else{
            $errors['email'] = "Bạn chưa đăng ký tài khoản ? Click vào bên dưới để đăng ký.";
        }
    }

    
    if(isset($_POST['check-email'])){
        $email = mysqli_real_escape_string($mysql, $_POST['email']);
        $check_email = "SELECT * FROM tbl_taikhoan WHERE email='$email'";
        $run_sql = mysqli_query($mysql, $check_email);
        if(mysqli_num_rows($run_sql) > 0){
            $code = rand(999999, 111111);
            $status = "notverified";
            $insert_code = "UPDATE tbl_taikhoan SET code = $code , status='$status' WHERE email = '$email'";
            $run_query =  mysqli_query($mysql, $insert_code);
            if($run_query){
                $mail->setFrom('diep25032001@gmail.com', 'Dducky Caffe');
                $mail->addAddress((String)$email);
                $mail->isHTML(true);
                $mail->Subject = 'Mã Đặt Lại Mật Khẩu';
               
                $mail->Body ="<div class='mail_main' style='width:400px;margin:auto;background: #000033;padding: 40px;'>
                                <h1 style='color: darkorange;text-align: center;margin-bottom: 15px;'>Dducky Caffe</h1>
                                <p style=' color: white;font-size:18px;'>Mã đặt lại mật khẩu của bạn là : $code</p>
                            </div>";
       
               
                

                if($mail->send()){
                    $info = " OTP đã được gửi đến email của bạn - $email";
                    $_SESSION['info'] = $info;
                    // $_SESSION['email'] = $email;
                    header('location: index.php?ql=check_resert');
                   
                }else{
                    $errors['otp-error'] = "Gửi mã không thành công!";
                }
            }else{
                $errors['db-error'] = "Đã có lỗi xẩy ra!";
            }
        }else{
            $errors['email'] = "Email không tồn tại!";
        }
    }

    
    if(isset($_POST['check-reset-otp'])){
        $_SESSION['info'] = "";
        $otp_code = mysqli_real_escape_string($mysql, $_POST['otp']);
        $check_code = "SELECT * FROM tbl_taikhoan WHERE code = $otp_code";
        $code_res = mysqli_query($mysql, $check_code);
        if(mysqli_num_rows($code_res) > 0){
            $fetch_data = mysqli_fetch_assoc($code_res);
            $info = "Tạo Mật Khẩu Mới.";
            $_SESSION['info'] = $info;
            $_SESSION['email'] = $fetch_data['email'];
            header('location:index.php?ql=new_pass');
            
        }else{
            $errors['otp-error'] = "Mã xác minh sai!";
        }
    }

    
    if(isset($_POST['change-password'])){
        $_SESSION['info'] = "";
        $password = mysqli_real_escape_string($mysql, $_POST['password']);
        $cpassword = mysqli_real_escape_string($mysql, $_POST['cpassword']);
        if($password !== $cpassword){
            $errors['password'] = "Mật Khẩu Không Khớp!";
        }else{
            $code = 0;
            $status = 'verified';
            $email = $_SESSION['email']; 
            $encpass = password_hash($password, PASSWORD_BCRYPT);
            $update_pass = "UPDATE tbl_taikhoan SET code = $code, password = '$encpass',status = '$status' WHERE email = '$email'";
            $run_query = mysqli_query($mysql, $update_pass);
            if($run_query){
                $info = "Mật khẩu của bạn đã thay đổi.Hiện giờ bạn có thể đăng nhập bằng mật khẩu mới";
                $_SESSION['info'] = $info;
                unset($_SESSION['email']);
                header('Location: index.php?ql=new_pass_login');
            }else{
                $errors['db-error'] = "Không thay đổi được mật khẩu!";
            }
        }
    }
    // đổi mật khẩu
    if(isset($_POST['doipass'])){
        $_SESSION['info'] = "";
        $email = $_SESSION['email']; 
        $password = mysqli_real_escape_string($mysql, $_POST['password']);
        $mpassword = mysqli_real_escape_string($mysql, $_POST['mpassword']);
        $cpassword = mysqli_real_escape_string($mysql, $_POST['cpassword']);
        $check_pass = "SELECT * FROM tbl_taikhoan WHERE email = '$email'";
        $res = mysqli_query($mysql, $check_pass);
        $fetch = mysqli_fetch_assoc($res);
        $fetch_pas = $fetch['password'];
        if(password_verify($password, $fetch_pas)){
        
            if($mpassword !== $cpassword){
                $errors['password'] = "Mật khẩu mới không khớp!";
            }else{
                $code = 0;
            $status = 'verified';

                $email = $_SESSION['email']; 
                $encpass = password_hash($mpassword, PASSWORD_BCRYPT);
                $update_pass = "UPDATE tbl_taikhoan SET code = $code, password = '$encpass',status='$status' WHERE email = '$email'";
                $run_query = mysqli_query($mysql, $update_pass);
                if($run_query){
                    $info = "Mật khẩu của bạn đã thay đổi.Hiện giờ bạn có thể đăng nhập bằng mật khẩu mới";
                    $_SESSION['info'] = $info;
                    unset($_SESSION['email']);
                    header('Location: index.php?ql=new_pass_login');
                }else{
                    $errors['password'] = "Không thay đổi được mật khẩu!";
                }
            }
        }else{
            $errors['password'] = "Mật khẩu cũ không chính xác!";
        }
    }
    
   
    if(isset($_POST['login-now'])){
        header('Location: index.php?ql=dangnhap');
    }

// ------------------------mail lien he-----------------
if(isset($_POST['gui'])){

    $emails = $_POST['email'];
    $hoten = $_POST['hoten'];
    $dienthoai = $_POST['dienthoai'];
    $noidung = $_POST['noidung'];

    $mail->setFrom('diep25032001@gmail.com', 'Dducky Caffe');
    $mail->addAddress('diep25032001@gmail.com');
    $mail->isHTML(true);
    $mail->Subject = "Liên Hệ Của Khách Hàng";

    $mail->Body = "<h1 style='color:#f40;text-align: center;'>Dducky Caffe</h1>
                <h3 style='color:#080;'>Họ Và Tên Khách Hàng : $hoten</h3>
                <h3 style='color:#080;'>Số Điện Thoại Khách Hàng : $dienthoai</h3>
                <h3 style='color:#080;'>Email Khách Hàng : $emails</h3>
                <h3 style='color:#080;'>Nội Dung : $noidung</h3>";


    if($mail->send()){
        echo "<script>alert('Gửi mail thành công')</script>";
        
        echo "<script>window.location = 'index.php?ql=lienhe'</script>";
        exit();
    }
    

}  
// ---------------------Đặt ---  Bàn------------------
    
if(isset($_POST['datban'])){
    $emails = $_POST['email'];
    $hoten = $_POST['hoten'];
    $dienthoai = $_POST['dienthoai'];
    $soluong = $_POST['soluong'];
    $ngay = $_POST['ngaydat'];
    $thoigian = $_POST['thoigian'];
    $douong = $_POST['douong'];
    if($_POST['loaiphong'] == 1){
        $loaiphong = "Phòng họp riêng";
    }elseif($_POST['loaiphong'] == 2){
        $loaiphong = "Phòng họp lớn";
    }
    $mail->setFrom('diep25032001@gmail.com', 'Dducky Cafe');
    $mail->addAddress('diep25032001@gmail.com', 'Đặt bàn'); 
    $mail->addCC((String)$emails);
    $mail->isHTML(true);  
    $mail->Subject = 'Đặt Bàn';
     
    
    $mail->Body = "<div class='mail_main' style='width:400px;margin:auto;background: #000033;padding: 40px;'>
                    <h1 style='color: darkorange;text-align: center;'>Dducky Caffe</h1>
                    <p style='color: darkorange;text-align: center;'>Mail đặt bàn</p>
                    <h3 style='color: darkorange;'>Thông tin khách hàng</h3>
                    <table style='margin-left: 15px;'>
                        <tr style='color:white ;'>
                            <th style='padding: 15px; text-align: left;'>Họ Tên :</th>
                            <td>$hoten</td>
                        </tr>
                        <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Số Điện Thoại :</th>
                            <td>$dienthoai</td>
                        </tr>
                        <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Email :</th>
                            <td>$emails</td>
                        </tr>
                    </table>
                    <h3 style='color: darkorange;'>Nhu Cầu Của Khách Hàng</h3>
                    <table style='margin-left: 15px;'>
                        <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Loại phòng :</th>
                            <td>$loaiphong</td>
                        </tr>
                        <tr style='color:white ;'>
                            <th style='padding: 15px; text-align: left;'>Số Lượng Người :</th>
                            <td>$soluong</td>
                        </tr>
                        <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Ngày đặt :</th>
                            <td>$ngay</td>
                        </tr>
                        <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Thời gian :</th>
                            <td>$thoigian</td>
                        </tr>
                    <tr style='color:white ;'>
                            <th style='padding: 15px;text-align: left;'>Đồ Uống :</th>
                            <td>$douong</td>
                        </tr>
                    </table>";
        $mail->send();
        echo "<script>alert('Đặt bàn thành công')</script>";
        echo "<script>window.location = 'index.php?ql=dat_ban'</script>";
  
   
    }              



    //              
?>