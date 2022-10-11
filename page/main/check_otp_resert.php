<?php require_once "page/main/xuly/xuly.php"; ?>
<?php 
$email = $_SESSION['email'];

?>
<div class="main_sanpham">
            
            <div class="container">
                <div class="row">
                    <div class="col-md-4 offset-md-4 form login-form">
                        <form action="" method="POST" autocomplete="off">
                            <h2 class="text-center">Mã Xác Minh</h2>
                            <?php 
                    if(isset($_SESSION['info'])){
                        ?>
                        <div class="alert alert-success text-center">
                            <?php echo $_SESSION['info']; ?>
                        </div>
                        <?php
                    }
                    ?>
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
                                <input class="form-control" type="text" name="otp" placeholder="Nhập mã xác minh..." required value="">
                            </div>
                            
                            
                            <div class="form-group">
                                <input class="form-control button" type="submit" name="check-reset-otp" value="Submit">
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>  