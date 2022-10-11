<?php
	require_once '../config/config.php';
	require('../../carbon/autoload.php');
	use Carbon\Carbon;
    use Carbon\CarbonInterval;
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
	if(isset($_GET['code'])){
		$code_cart = $_GET['code'];
		$sql_update ="UPDATE tbl_giohang SET tinhtrang=0 ,thoi_gian='$now' WHERE ma_giohang='".$code_cart."'";
		$query = mysqli_query($mysql,$sql_update);

			//thong ke doanh thu
			$sql_lietke_dh = "SELECT * FROM tbl_chitietgiohang,tbl_sanpham WHERE tbl_chitietgiohang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietgiohang.ma_giohang='".$code_cart."' ORDER BY tbl_chitietgiohang.id_giohangchitiet DESC";
			$query_lietke_dh = mysqli_query($mysql,$sql_lietke_dh);
	
			$sql_thongke = "SELECT * FROM tbl_thongke WHERE ngaydat='$now'"; 
			$query_thongke = mysqli_query($mysql,$sql_thongke);
	
			$soluongmua = 0;
			$doanhthu = 0;
			
			while($row = mysqli_fetch_array($query_lietke_dh)){
				  $soluongmua+=$row['soluongmua'];
				  $doanhthu+=$row['gia_sanpham'];
			}
	
			if(mysqli_num_rows($query_thongke)==0){
					$soluongban = $soluongmua;
					$doanhthu = $doanhthu;
					$donhang = 1;
					$sql_update_thongke = mysqli_query($mysql,"INSERT INTO tbl_thongke (ngaydat,donhang,doanhthu,soluongban) VALUE('$now','$donhang','$doanhthu','$soluongban')" );
					
			}elseif(mysqli_num_rows($query_thongke)!=0){
				while($row_tk = mysqli_fetch_array($query_thongke)){
					$soluongban = $row_tk['soluongban'] + $soluongmua;
					$doanhthu = $row_tk['doanhthu']+$doanhthu;
					$donhang = $row_tk['donhang']+1;
					$sql_update_thongke = mysqli_query($mysql,"UPDATE tbl_thongke SET donhang='$donhang',doanhthu='$doanhthu',soluongban='$soluongban' WHERE ngaydat='$now'" );
					
				}
			}
			
	
		header('Location:index.php');
	} 
?>