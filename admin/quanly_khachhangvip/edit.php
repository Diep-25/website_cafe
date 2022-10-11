<?php
require '../chung.php';
	require_once '../config/config.php';
	include "../../sendmail.php";
	if(ISSET($_POST['guima'])){
		$email = $_POST['email_khachhang'];
		$ma = $_POST['ma'];
		$phan_tram = $_POST['phan_tram'];	
		mysqli_query($mysql, "INSERT INTO `tbl_magiam` VALUES('', '$ma', '$phan_tram', '$email',1,0)") or die(mysqli_error());
		$mail->setFrom('diep25032001@gmail.com', 'Dducky Caffe');
            $mail->addAddress((String)$email);
            $mail->isHTML(true);  
            $mail->Subject = 'Mã Giảm Giá';
            $mail->Body = "<div class='mail_main' style='width:500px;margin:auto;background: #000033;padding: 40px;'>
                                <h1 style='color: darkorange;text-align: center;margin-bottom: 15px;'>Dducky Caffe</h1>
                                <p style=' color: white;font-size:18px;text-align: center;'>Cảm ơn quý khách đã tin tưởng và mua hàng bên Dducky caffe </p>
								<p style=' color: white;font-size:18px;'>Dducky caffe gửi tặng bạn mã giảm $phan_tram % : <span style='color: #3d5af1;'>$ma</span></p>
                            </div>";
    
        $mail->send();
		echo "<script>alert('Gửi mã thành công ')</script>";
		echo "<script>window.location = 'index.php'</script>";
	}
?>