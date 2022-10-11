<?php

require_once '../config/config.php';
$output = '';
if(isset($_POST["query"]))
{
 $search = mysqli_real_escape_string($mysql, $_POST["query"]);
 $query = "SELECT * FROM tbl_blog WHERE tieude_blog LIKE '%".$search."%' ";
}
else
{
 $query = "SELECT * FROM tbl_blog ORDER BY id_blog";
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
                   <th>Tiêu đề</th>
                   <th>Ảnh</th> 
                   <th>Tóm tắt</th>         
                   <th>Tùy chọn</th>
                </tr>
                <?php
                $i = 0;
  
					
					while($fetch = mysqli_fetch_array($result)){
            $i++;
				?>
                <tr class="del_user<?php echo $fetch['id_blog']?>">
                    <td><?php echo $i?></td>
                    <td><?php echo $fetch['tieude_blog']?></td>
                    <td><img src="upload/<?php echo $fetch['anh_blog']?>" width="150px"></td>
                    <td><?php echo $fetch['tomtatnoidung_blog']?></td>
                    <td>
                    <a href="sua.php?id_blog=<?php echo $fetch['id_blog']?>">
                        <i class='bx bx-message-square-edit' ></i>
                    </a>
                        
                        <button class ="btn-delete" id="<?php echo $fetch['id_blog']?>"><i class='bx bx-message-square-x' ></i></button>
                       
                      <button data-toggle="modal" data-target="#chitiet_modal<?php echo $fetch['id_blog']?>"> <i class='bx bx-message-square-detail' ></i></button>
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