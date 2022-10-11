<?php
session_start();

$errors = array();
require_once './config/config.php';
if(isset($_POST['login'])){
    $taikhoan = $_POST['email'];
    $matkhau = mysqli_real_escape_string($mysql, $_POST['password']);
    $sql = "SELECT * FROM tbl_taikhoan WHERE email='".$taikhoan."' LIMIT 1";
    $row = mysqli_query($mysql,$sql);
    $count = mysqli_num_rows($row);
    $pass = mysqli_fetch_array($row);
    if($count>0){   
      $passs = $pass["password"];
      
        if(password_verify($matkhau, $passs)){
            if($pass["quyen"] == 1){
                $_SESSION['user'] = $pass['id_taikhoan'];
                $_SESSION['login'] = $taikhoan;
                header("Location:index/index.php");
            }else{
                $errors['email'] = "Chưa cấp quyền";
            }
        }else{
            $errors['email'] = "mật khẩu  không đúng";
        }
    }else{
        $errors['email'] = "Tài khoản không tồn tại";
        
    }
} 


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/login.css">
    <title>Đăng Nhập Admin</title>
</head>
<body>
    <section>

        <div class="box">
      
          <div class="square" style="--i:0;"></div>
          <div class="square" style="--i:1;"></div>
          <div class="square" style="--i:2;"></div>
          <div class="square" style="--i:3;"></div>
          <div class="square" style="--i:4;"></div>
          <div class="square" style="--i:5;"></div>
      
          <div class="container">
            <div class="form">
              <h2>LOGIN to Admin</h2>
              <?php
                    if(count($errors) > 0){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
              <form action="" method="post" autocomplete="off">
                <div class="inputBx">
                  <input type="email" name ="email" required="required">
                  <span>Email</span>
                  <i class="fas fa-user-circle"></i>
                </div>
                <div class="inputBx password">
                  <input id="password-input" type="password" name="password" required="required">
                  <span>Password</span>
                  <a href="#" class="password-control" onclick="show_hide_password(this);"></a>
                  <i class="fas fa-key"></i>
                </div>
                <!-- <label class="remember"><input type="checkbox">
                  Ghi Nhớ</label> -->
                <div class="inputBx">
                  <input type="submit" name="login" value="Đăng Nhập">
                </div>
              </form>
              <!-- <p>Forgot password? <a href="#">Click Here</a></p> -->
              <!-- <p>Don't have an account <a href="#">Sign up</a></p> -->
            </div>
          </div>
      
        </div>
      </section>
</body>
<style>
    .text-center{
        color: red;
        margin-bottom:10px;
    }

</style>
<script>
    function show_hide_password(target){
	var input = document.getElementById('password-input');
	if (input.getAttribute('type') == 'password') {
		target.classList.add('view');
		input.setAttribute('type', 'text');
	} else {
		target.classList.remove('view');
		input.setAttribute('type', 'password');
	}
	return false;
}
</script>
</html>