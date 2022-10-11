<?php
	session_start();
	include('../../../admin/config/config.php');
	require "../../../sendmail.php";
	$id_khachhang = $_SESSION['id_khachhang'];
	$sql_cate = "SELECT * FROM `tbl_taikhoan` WHERE `email` = '$_SESSION[email]' LIMIT 1";
	$query_cate = mysqli_query($mysql,$sql_cate);
	$row = mysqli_fetch_array($query_cate);
		
		if(isset($_SESSION['nameDh'])){
			$name = $_SESSION['nameDh'];
		}
		else{
			$name = $row['ten_taikhoan'];
		};
		// ------------------
		if(isset($_SESSION['dienthoaiDh'])){
			$dt = $_SESSION['dienthoaiDh'];
		}
		else{
			$dt = $row['dienthoai'];
		};
		// --------------
		if(isset($_SESSION['diachiDh'])){
			$diachi = $_SESSION['diachiDh'];
		}
		else{
			$diachi = $row['diachi'];
		}
		if(isset($_SESSION['giam'])){
			$giam = $_SESSION['giam'];
			
		}
		else{
			$giam = 0;
			

		}
		// ---------------
		$soluot = (int)$row['soluotmua'] + 1;
	if(isset($_SESSION["emailHo"])){
		$email = $_SESSION["emailHo"];
		mysqli_query($mysql,"UPDATE tbl_taikhoan SET soluotmua ='$soluot' WHERE email = '$_SESSION[email]'");
		
	}
	else{
		$email = $_SESSION['email'];
		mysqli_query($mysql,"UPDATE tbl_taikhoan SET soluotmua ='$soluot' WHERE email = '$_SESSION[email]'");
	}
	
	
	$code_order = rand(0,9999);
	$insert_cart = "INSERT INTO tbl_giohang(ma_giohang,ten_khachhang,dienthoai,diachi,email,tinhtrang,phuongthuc) VALUE('".$code_order."','".$name."','".$dt."','".$diachi."','".$email."',1,1)";
	
	$cart_query = mysqli_query($mysql,$insert_cart);
	if($cart_query){
		//them gio hang chi tiet
		foreach($_SESSION["shopping_cart"] as $key => $value){
			$id_sanpham = $value['id_sanpham'];
			$soluong = $value['soluong'];
			$sanpham = mysqli_query($mysql,"SELECT * FROM tbl_sanpham WHERE id_sanpham = '$id_sanpham'");
			$showSanpham = mysqli_fetch_array($sanpham);
			$insert_order_details = "INSERT INTO tbl_chitietgiohang(id_sanpham,ma_giohang,soluongmua) VALUE('".$id_sanpham."','".$code_order."','".$soluong."')";
			
			$cart_detail= mysqli_query($mysql,$insert_order_details);
			if($cart_detail){
				if($showSanpham['soluongcon'] == ''){
					$soluongcon = $showSanpham['soluong'];
				}
				else{
					$soluongcon = $showSanpham['soluongcon'];
				}
				$upSoluong = $soluongcon - $soluong;
				$soluongban = (int)$showSanpham['soluongban'] + (int)$soluong;
				mysqli_query($mysql,"UPDATE tbl_sanpham SET soluongcon = '$upSoluong', soluongban = '$soluongban'  WHERE id_sanpham = '$id_sanpham'");
				
                                if(isset($_SESSION['ma'])){
                                    $updata = $_SESSION['ma'];
                                    mysqli_query($mysql,"UPDATE tbl_magiam SET tinh_trang = 0 ,ma_giohang = '$code_order' WHERE ma = '$updata'");
                                }
                                
				
			}

			


			$mail->setFrom('diep25032001@gmail.com', 'Dducky Cafe');
			$mail->addAddress((String)$email); 
			$mail->isHTML(true);
			$mail->Subject ="Đặt Hàng";
		
		$message = "<div class='mail_main' style='width:400px;margin:auto;background: #000033;padding: 40px;'>
				<h1 style='color: darkorange;text-align: center;'>Dducky Caffe</h1>
				<p style='color: darkorange;text-align: center;'>Mail đơn hàng</p>
				<h3 style='color: darkorange;'>Thông tin khách hàng</h3>
				<table style='margin-left: 15px;'>
					<tr style='color:white ;'>
						<th style='padding: 15px; text-align: left;'>Họ Tên :</th>
						<td>$name</td>
					</tr>
					<tr style='color:white ;'>
						<th style='padding: 15px;text-align: left;'>Số Điện Thoại :</th>
						<td>$dt</td>
					</tr>
					<tr style='color:white ;'>
						<th style='padding: 15px;text-align: left;'>Email :</th>
						<td>$email</td>
					</tr>
					<tr style='color:white ;'>
						<th style='padding: 15px;text-align: left;'>Địa chỉ :</th>
						<td>$diachi</td>
					</tr>
				</table>
				<h3 style='color: darkorange;'>Thông tin đơn hàng</h3>
				<table style='margin-left: 15px;border: 1px solid white;width: 100%;border-collapse: collapse;'>
				<tr style='color:white ;border: 1px solid white;'>
				<th>Sản phẩm</th>
				<th>Số Lượng</th>
				<th>Tổng Tiền</th>
			</tr>";
			$total_price = 0;
			$total_item = 0; 
			if(!empty($_SESSION["shopping_cart"]))
			{
				foreach($_SESSION["shopping_cart"] as $keys => $values)
				{
					$total_price = $total_price + ($values["soluong"] * $values["gia_sanpham"]);
					$total_item = $total_item + 1;
					$tong_giamgia = ($total_price * $giam)/100;
                    $tong = $total_price -$tong_giamgia;

				
                                    if(isset($_SESSION['ma'])){
                                        $maa = $_SESSION['ma'];
                                    }else{
                                        $maa = "Trống";
                                    } 
									
									if(isset($_SESSION['giam'])){
                                        $giamm= $_SESSION['giam'];
                                     }else{
										$giamm= "0";
                                     }
                                
		   
			$message .="<tr style='color:white ;border: 1px solid white;'>
				<td style='text-align: center;'>".$values['ten_sanpham']. "</td>
				<td style='text-align: center;'>".$values['soluong'] ."</td>
				<td style='text-align: center;'>".number_format($values['soluong'] * $values['gia_sanpham']) ." <sup style='color:red'>đ</sup></td>
			</tr>";
			
				}
			
			$message .="<tr style='color:white ;'>
				<th>Tổng Tiền Hàng</th>
				<td></td>
				<th>".number_format($total_price)." <sup style='color:red'>đ</sup></th>
			</tr>
			<tr style='color:white ;'>
				<th>Mã (".$maa.") giảm </th>
				<td></td>
				<th>".$giamm." %</th>
			</tr>
			<tr style='color:white ;'>
				<th>Tổng Thanh Toán</th>
				<td></td>
				<th>".number_format($tong)." <sup style='color:red'>đ</sup></th>
			</tr>";
		   
			}
		   
			$message .="</table>
				<p style='color: white;'>Thanh toán khi nhận hàng </p>
				<p style='color: darkorange;font-size: 20px;'>Cảm ơn quý khách đã đặt hàng</p>";
		$mail->Body = $message;	
		$mail->send();
		
		

	}
	

	}
	unset($_SESSION['shopping_cart']);
	unset($_SESSION["emailHo"]);
	unset($_SESSION['nameDh']);
	unset($_SESSION['dienthoaiDh']);
	unset($_SESSION['diachiDh']);
	unset($_SESSION['giam']);
    unset($_SESSION['ma']);
				echo "<script>window.location = '../../../index.php?ql=cam_on'</script>";
?>









