

<?php
	session_start();
    $total_price = 0;
    $total_item = 0;    

    $output ='
   
    <div class="main_sanpham_right">

                    <div class="mid_menu">
                        <p class="mid_menu_name">GIỎ HÀNG</p>
                    </div>
                    <div class="main_sanpham_sp_name">
                        
                        </div>
                   <div class="main_sanpham_right_table">';
                   if(!empty($_SESSION["shopping_cart"]))
                   {
                    $output .= '<table>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên</th>
                                <th>Số Lượng</th>
                                <th>Giá</th>
                                <th>Tổng</th>
                                <th>Hủy</th>
                            </tr>';
    
       
            foreach($_SESSION["shopping_cart"] as $keys => $values)
            {
                $total_price = $total_price + ($values["soluong"] * $values["gia_sanpham"]);
		        $total_item = $total_item + 1;
  



                $output .='<tr class="del_user'.$values['id_sanpham'].'">
                                <td><img src="admin/quanly_sanpham/upload/'.$values['anh_sanpham'].'" alt=""></td>
                                <td>'.$values['ten_sanpham'].'</td>
                                <td>'.$values['soluong'].'</td>
                                <td>'.number_format($values['gia_sanpham']).' <sup style="color:red">đ</sup></td>
                                <td>'.number_format($values["soluong"] * $values["gia_sanpham"]).' <sup style="color:red">đ</sup></td>
                                <td><a name="delete" class="huy delete" id="'.$values['id_sanpham'].'" ><i class="fas fa-trash"></i></a></td>
                            </tr>';
                            
        
          
  	        }
            
      

              $output .='<tr>
                            <td  colspan="6">
                            <div class="shopping_btn">
                            <p>Tổng Tiền : '.number_format($total_price).' <sup style="color: red;">đ</sup></p>';
                           
                            
                                if(isset($_SESSION['email'])){
                            
                                    $output .='<a class="shopping_btn_buy" href="index.php?ql=thanhtoan">THANH TOÁN</a>';
                               
                            
                            }else{
                            
                                $output .='<a class="shopping_btn_buy" href="index.php?ql=dangnhap">Đăng Nhập</a>';
                                
                            
                                }
                           
                       	
 
                                $output .='</div>
                            </td>
                        </tr>';
                        	
                            $output .='</table>';
                        
                   
                        }else{ 
                            $output .='<div class="main_sanpham_sp_name" style="width:100%;">
                                    <h2 style="text-align:center;">Giỏ Hàng Trống</h2>
                                </div>';
                            }        
                    $output .='</div>';
            
            $data = array(
	'cart_details'		=>	$output,
	'total_item'		=>	$total_item
);
echo json_encode($data);
            ?>
           
