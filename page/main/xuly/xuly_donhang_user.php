<?php
include "../../../admin/config/config.php";
                        $tongtien = 0;
                        $sql_dh = "SELECT * FROM tbl_chitietgiohang,tbl_sanpham WHERE tbl_chitietgiohang.id_sanpham=tbl_sanpham.id_sanpham AND tbl_chitietgiohang.ma_giohang='".$_POST['ma_giohang']."' ORDER BY tbl_chitietgiohang.id_giohangchitiet DESC";
                        $query_lietke_dh = mysqli_query($mysql,$sql_dh);
                    ?>
<table>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng mua</th>
                                <th>Giá</th>
                                <th>Thành tiền</th>
                            </tr>
                            <?php
while($rows = mysqli_fetch_array($query_lietke_dh)){
    $thanhtien = $rows['gia_sanpham']*$rows['soluongmua'];
                      $tongtien += $thanhtien ;
?>
                            <tr>
                                <td><?php echo $rows['ma_giohang'] ?></td>
                                <td><?php echo $rows['ten_sanpham'] ?></td>
                                <td><?php echo $rows['soluongmua'] ?></td>
                                <td><?php echo number_format($rows['gia_sanpham']) ?><sup style="color: red;">đ</sup></td>
                                <td><?php echo number_format($thanhtien) ?><sup style="color: red;">đ</sup></td>
                            </tr>
                            <?php
}
                            ?>
                            <tr>
                      <td colspan="5" name="Tổng Tiền">
                      <div class="shopping_btn">
                            <p>Phí Ship : 20,000 <sup style="color: red;">đ</sup></p>
                           <p>Tổng Tiền : <?php echo number_format($tongtien + 20000) ?><sup style="color: red;">đ</sup></p>
                    </div>     
                       </td>
                </tr> 
                        </table>