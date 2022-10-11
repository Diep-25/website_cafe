
<?php
require_once '../config/config.php';
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($mysql, $_POST["query"]);
     $query = "
      SELECT * FROM tbl_sanpham,tbl_menu
      WHERE ten_sanpham LIKE '%".$search."%'
      AND tbl_sanpham.id_menu=tbl_menu.id_menu
      
     
      
     ";
    }
    else
    {
     $query = "
     SELECT * FROM tbl_sanpham,tbl_menu WHERE tbl_sanpham.id_menu=tbl_menu.id_menu ORDER BY id_sanpham
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
                   <th>Tên</th>
                   <th>Ảnh</th>
                   <th>Giá</th>
                   <th>Số lượng</th>
                   <th>Số lượng Bán</th>
                   <th>Menu</th>            
                   <th>Tùy chọn</th>
                </tr>
            <?php
                $i = 0;	
                while($fetch = mysqli_fetch_array($result)){
            $i++;
            
            ?>
			
                <tr class="del_user<?php echo $fetch['id_sanpham']?>">
                    <td><?php echo $i?></td>
                    <td><?php echo $fetch['ten_sanpham']?></td>
                    <td><img src="upload/<?php echo $fetch['anh_sanpham']?>" width="150px"></td>
                    
                    <td><?php echo $fetch['gia_sanpham']?></td>
                    <td><?php echo $fetch['soluong']?></td>
                    <td><?php if($fetch['soluongban']>0){
                        echo $fetch['soluongban'];
                    }else{
                        echo "Chưa có khách mua";
                    } ?></td>
                    <td><?php echo $fetch['tenmenu']?></td>
                    <td>
                    <button data-toggle="modal" data-target="#edit_modal<?php echo $fetch['id_sanpham']?>" ><i class="bx bx-message-square-edit" ></i></button>
                        
                        <button class ="btn-delete" id="<?php echo $fetch['id_sanpham']?>"><i class="bx bx-message-square-x" ></i></button>
                       
                      <button data-toggle="modal" data-target="#chitiet_modal<?php echo $fetch['id_sanpham']?>"> <i class="bx bx-message-square-detail" ></i></button>
                    </td>
                </tr>
                <?php
            }
            ?>
            </table>
    <?php       
    }else{
     echo 'Menu bạn tìm không có ';
    }
    ?>
          
<script>
    // ----------------------delete--------

$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var id_sanpham = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', id_sanpham);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				id_sanpham: id
			},
			success: function(){
				$("#modal_confirm").modal('hide');
				$(".del_user" + id).empty();
				$(".del_user" + id).html("<td colspan='6'><center class='text-danger'>Đang xóa ...</center></td>");
				setTimeout(function(){
					$(".del_user" + id).fadeOut('slow');
				}, 1000);
			}
		});
	});
});

</script>