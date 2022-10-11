<?php require_once "page/main/xuly/xuly.php"; ?>

<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Đăng Ký</h2>
                            <p class="text-center">Nhanh gọn lẹ</p>
                            <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
                            <div class="form-group">
                                <input class="form-control" type="text" name="ten_taikhoan" placeholder="Nhập tên ..." required value="">
                            </div>   
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Nhập Email..." required value="">
                            </div>
                            
                            <div class="form-group">
                                <input class="form-control" type="number" name="dienthoai" placeholder="Nhập điện thoại..." required value="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" type="text" name="diachi" placeholder="Nhập đia chỉ..." required value="">
                            </div>
                            <div class="form-group">
                                <input id="pwdmoi" class="form-control" type="password" name="password"  placeholder="Nhập mật khẩu..." required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eyemoi"></i>
                                  </span>
                            </div>
                            <div class="form-group">
                                <input id="pwdcu" class="form-control" type="password" name="cpassword"  placeholder="Nhập lại mật khẩu..." required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eyecu"></i>
                                  </span>
                            </div>
                            

                            <div class="form-group">
                                <input class="form-control button" type="submit" name="signup" value="Đăng Ký">
                            </div>
                            <div class="link login-link text-center">Đã có tài khoản? <a href="index.php?ql=dangnhap">Đăng Nhập</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>