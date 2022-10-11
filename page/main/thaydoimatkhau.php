
<?php require_once "page/main/xuly/xuly.php"; ?>

<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Đổi Mật Khẩu </h2>
                            
                        
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
                                <input id="pwdcu" class="form-control" type="password" name="password"  placeholder="Nhập mật khẩu cũ..." required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eyecu"></i>
                                  </span>
                            </div>
                            <div class="form-group">
                                <input id="pwd" class="form-control" type="password" name="mpassword"  placeholder="Nhập mật khẩu mới..." required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eye"></i>
                                  </span>
                            </div>
                            <div class="form-group">
                                <input id="pwdmoi" class="form-control" type="password" name="cpassword"  placeholder="Nhập lại mật khẩu mới..." required>
                                <span class="mat">
                                    <i class="fa fa-eye" aria-hidden="true"  type="button" id="eyemoi"></i>
                                  </span>
                            </div>
                            

                            <div class="form-group">
                                <input class="form-control button" type="submit" name="doipass" value="Thay Đổi">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>