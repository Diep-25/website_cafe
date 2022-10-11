<?php require_once "page/main/xuly/xuly.php"; ?>
<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                           
                        <?php 
            if(isset($_SESSION['info'])){
                ?>
                <div class="alert alert-success text-center">
                <?php echo $_SESSION['info']; ?>
                </div>
                <?php
            }
            ?>  
                           
                            
                            <div class="form-group">
                                <input class="form-control button" type="submit" name="login-now" value="Đăng Nhập">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>  