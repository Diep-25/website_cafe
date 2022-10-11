<?php
    require_once '../config/config.php';
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($mysql, $_POST["query"]);
     $query = "SELECT * FROM tbl_magiam WHERE email_khachhang LIKE '%".$search."%' OR ma LIKE '%".$search."%'";
    }
    else
    {
     $query = "SELECT * FROM tbl_magiam ORDER BY id_magiam";
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
           <th>Email</th>
           <th>Mã giảm giá</th>
           <th>Phần trăm</th>
           <th>Tình trạng</th>
           <th>Tùy chọn</th>
        </tr>
        
       <?php 
        $i = 0;
            while($fetch = mysqli_fetch_array($result)){
        $i++;
        ?>
        <tr class="del_user<?php echo $fetch['id_magiam']?>">
            <td><?php echo $i?></td>
            <td><?php echo $fetch['email_khachhang']?></td>
            <td><?php echo $fetch['ma']?></td>
            <td><?php echo $fetch['phan_tram']?> %</td>
            <td><?php if($fetch['tinh_trang'] == 1){
                   echo "Mã chưa sử dụng";
            }else{
                echo '<p style="color:red">Mã đã sử dụng</p>';
                
            } ?></td>
            <td>
                
                <button class ="btn-delete" id="<?php echo $fetch['id_magiam']?>"><i class="bx bx-message-square-x" ></i></button>
               
               
            </td>
        </tr>
        <?php
            }
        }else{
            echo 'Chưa có mã giảm nào';
           }
        ?>
        </table>
         
 

<script>
    
   // ---------------------- delete--------

$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var id_magiam = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', id_magiam);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				id_magiam: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_user" + id).empty();
				$(".del_user" + id).html("<td colspan='5'><center class='text-danger'>Đang xóa ...</center></td>");
				setTimeout(function(){
					$(".del_user" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});

</script>