<?php
    require_once '../config/config.php';
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($mysql, $_POST["query"]);
     $query = "SELECT * FROM tbl_taikhoan WHERE ten_taikhoan LIKE '%".$search."%' OR email LIKE '%".$search."%' ";
    }
    else
    {
     $query = "SELECT * FROM tbl_taikhoan ORDER BY id_taikhoan";
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
           <th>Tên</th>
           <th>Email</th>
           <th>Điện thoại</th>
           <th>Địa chỉ</th>
           <th>Quyền</th>
           <th>Tùy chọn</th>
        </tr>
        
       <?php 
        $i = 0;
            while($fetch = mysqli_fetch_array($result)){
        $i++;
        ?>
        <tr class="del_user<?php echo $fetch['id_taikhoan']?>">
            <td><?php echo $i?></td>
            <td><?php echo $fetch['ten_taikhoan']?></td>
            <td><?php echo $fetch['email']?></td>
            <td><?php echo $fetch['dienthoai']?></td>
            <td><?php echo $fetch['diachi']?></td>
           <td>
               <?php
                $quyen = $fetch["quyen"];
                if($quyen == 1){
                    echo "<p style='color: red;font-weight: bold;'>Admin</p>";
                }else{
                    echo "Người dùng";
                }
                ?>
               </td>
            <td>
                <button data-toggle="modal" data-target="#edit_modal<?php echo $fetch['id_taikhoan']?>" ><i class="bx bx-message-square-edit" ></i></button>
                <button class ="btn-delete" id="<?php echo $fetch['id_taikhoan']?>"><i class="bx bx-message-square-x" ></i></button>
               
               
            </td>
        </tr>
        <?php
            }
        }else{
            echo 'Tài khoản bạn tìm không có ';
           }
        ?>
        </table>
         
 

<script>
    
   // ---------------------- delete--------

$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var id_taikhoan = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', id_taikhoan);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				id_taikhoan: id
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