<?php require_once "page/main/xuly/xuly.php"; ?>
<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Quên Mật Khẩu</h2>
                            <p class="text-center">Nhập địa chỉ email.</p>
                            
                            <?php
                        if(count($errors) > 0){
                            ?>
                            <div class="alert alert-danger text-center">
                                <?php 
                                    foreach($errors as $error){
                                        echo $error;
                                    }
                                ?>
                            </div>
                            <?php
                        }
                    ?>
                               
                            <div class="form-group">
                                <input class="form-control" type="email" name="email" placeholder="Nhập Email..." required >
                            </div>
                            
                            
                            <div class="form-group">
                                <input class="form-control button" type="submit" name="check-email" value="Next">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>  