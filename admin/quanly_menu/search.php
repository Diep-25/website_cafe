
<?php
require_once '../config/config.php';
    $output = '';
    if(isset($_POST["query"]))
    {
     $search = mysqli_real_escape_string($mysql, $_POST["query"]);
     $query = "
      SELECT * FROM tbl_menu 
      WHERE tenmenu LIKE '%".$search."%'
      OR thutu LIKE '%".$search."%' 
      
     ";
    }
    else
    {
     $query = "
      SELECT * FROM tbl_menu ORDER BY id_menu
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
               <th>Tên menu</th>
               
               <th>Tùy chọn</th>
            </tr>
            
            <?php
                $i = 0;
            while($fetch = mysqli_fetch_array($result))
            {
                $i++;
                ?>
                
            
                <tr class="del_user<?php echo $fetch['id_menu']?>">
                    <td><?php echo $i?></td>
                    <td><?php echo $fetch['tenmenu']?></td>
                    
                    <td>
                        <button data-toggle="modal" data-target="#edit_modal<?php echo $fetch['id_menu']?>" ><i class="bx bx-message-square-edit" ></i></button>
                        <button class ="btn-delete" id="<?php echo $fetch['id_menu']?>"><i class="bx bx-message-square-x" ></i></button>
                       
                        
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
    
$(document).ready(function(){
	$('.btn-delete').on('click', function(){
		var id_menu = $(this).attr('id');
		$("#modal_confirm").modal('show');
		$('#btn_yes').attr('name', id_menu);
	});
	$('#btn_yes').on('click', function(){
		var id = $(this).attr('name');
		$.ajax({
			type: "POST",
			url: "delete.php",
			data:{
				id_menu: id
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