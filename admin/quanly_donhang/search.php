
<?php
require_once '../config/config.php';
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($mysql, $_POST["query"]);
     $query = "SELECT * FROM tbl_giohang WHERE (ma_giohang LIKE '%".$search."%') AND (tinhtrang=1) ORDER BY tbl_giohang.thoi_gian DESC";
    }
    else
    {
     $query = "
     SELECT * FROM tbl_giohang WHERE tinhtrang=1 ORDER BY tbl_giohang.thoi_gian DESC
     ";
    }
    ?>
    <?php
    $result = mysqli_query($mysql, $query);
        if(mysqli_num_rows($result) > 0)
            {
    ?>
            <table>
                <tr>
                        <th>ID</th>
                        <th>Mã đơn hàng</th>
                        <th>Tên khách hàng</th>
                        <th>Địa chỉ</th>
                        <th>Email</th>
                        <th>Số điện thoại</th>
                        <th>Thời Gian</th>  
                        <th>Tình Trạng</th>                         
                        
                        <th>Tùy chọn</th>
                </tr>
            <?php
                $i = 0;	
                while($fetch = mysqli_fetch_array($result)){
            $i++;
            ?>
			
                <tr class="del_user<?php echo $fetch['ma_giohang']?>">
                    <td><?php echo $i?></td>
                    <td><?php echo $fetch['ma_giohang']?></td>
                    <td><?php echo $fetch['ten_khachhang']?></td>
                    
                    <td><?php echo $fetch['diachi']?></td>
                    <td><?php echo $fetch['email']?></td>
                    <td><?php echo $fetch['dienthoai']?></td>
                    <td><?php echo $fetch['thoi_gian']?></td>
                    <td>
                        <?php if($fetch['tinhtrang']==1){
    		                echo '<a href="xuly.php?code='.$fetch['ma_giohang'].'">Hàng chưa giao</a>';
    	                    }else{
    		                echo 'Hàng đã giao';
    	                    }
    	                ?>
                        </td>
                    <td>
                   
                        
                        <button class ="btn-delete" id="<?php echo $fetch['ma_giohang']?>"><i class="bx bx-message-square-x" ></i></button>
                       
                      <a href="chitiet.php?code=<?php echo $fetch['ma_giohang'] ?>"><i class="bx bx-message-square-detail" ></i></a>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
    <?php       
    }else{
     echo 'Không Có Đơn Hàng';
     
    }
    ?>
          
<script>
    // ----------------------delete--------

$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var ma_giohang = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', ma_giohang);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				ma_giohang: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_user" + id).empty();
				$(".del_user" + id).html("<td colspan='9'><center class='text-danger'>Đang xóa ...</center></td>");
				setTimeout(function(){
					$(".del_user" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});

</script>