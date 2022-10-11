
                <div class="main_lienhe">
                    <h2>Liên Hệ</h2>
                    <div class="lienhe_form">
                        <div class="lienhe_form-left">
                            <h3>Dducky Cafe</h3>
                            <p>Địa chỉ : Xóm 9 Kỳ Tây , Kỳ Anh</p>
                            <p>Điện thoại : 0965840200</p>
                           
                            <p>Email : diep25032001@gmail.com</p>
                            
                        </div>
                        <?php
                                // $sql = "SELECT * FROM tbl_taikhoan WHERE email = '$_SESSION[email]'";
                                // $run_Sql = mysqli_query($mysql, $sql);
                                // $row = mysqli_fetch_array($run_Sql);
                                // $email = $row ['email'];
                                require_once "page/main/xuly/xuly.php"; 
                        ?>
                        <div class="lienhe_form-right">
                            <form name="" action="" method="POST">
                               <div class="lienhe_hoten">
                                   <label for="Họ Và Tên">Họ Tên<span style="color: red;">*</span></label>
                                    <input type="text" name="hoten" placeholder="Nhập họ và tên của bạn ..." required>
                               </div>
                                <div class="lienhe_dienthoai">
                                    <label for="Điện thoại">Điện thoại<span style="color: red;">*</span></label>
                                    <input type="number" name="dienthoai" placeholder="Nhập số điện thoại của bạn ..." required>
                                </div>
                                <div class="lienhe_email">
                                    <label for="email">Email<span style="color: red;">*</span></label>
                                    <input type="email" name="email" placeholder="Nhập email của bạn ..." required>
                                </div>
                                <div class="lienhe_noidung">
                                    <label for="noidung">Nội Dung<span style="color: red;">*</span></label>
                                    <textarea name="noidung"></textarea>
                                </div>
            
                              <button name="gui" type="submit">GỬI</button>
                              <button type="reset">LÀM LẠI</button>
                              </form>
                        </div>
                    </div>
                </div>