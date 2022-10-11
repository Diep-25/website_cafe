<?php require_once "page/main/xuly/xuly.php"; ?>
<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Đăng Nhập</h2>
                            <p class="text-center">Nhập email và mật khẩu.</p>
                            
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
                               
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Nhập Email..." required value="">
                            </div>
                            <div class="form-group">
                                <input id="pwdmoi" class="form-control" type="password" name="password"  placeholder="Mật Khẩu" required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eyemoi"></i>
                                  </span>
                            </div>
                            <div class="link forget-pass text-left"><a href="index.php?ql=quenmatkhau">Quên mật khẩu?</a></div>
                            <div class="form-group">
                                <input id="btn_login" class="form-control button" type="submit" name="login" value="Đăng Nhập">
                            </div>
                            <div class="link login-link text-center">Bạn chưa đăng ký? <a href="index.php?ql=dangky">Đăng Ký</a></div>
                        </form>
                    </div>
                </div>
            </div>
        </div>  
        