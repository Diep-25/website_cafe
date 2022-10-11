<?php

 
$sql = 'SELECT * FROM tbl_menu';
 
$result = mysqli_query($mysql, $sql);
 
$menu = array();

while ($row = mysqli_fetch_assoc($result)){
    $menu[] = $row;
   
   
}
// show ra thẻ option 
function showMenu($menu, $parent_id = 0, $char = '')
{
    foreach ($menu as $key => $item)
    {
        if ($item['parent_id'] == $parent_id)
        {
            
                echo '<option value="'.$item['id_menu'].'">';
                    echo $char . $item['tenmenu'];
                echo '</option>';
            
            
            unset($menu[$key]);
             
           
            showMenu($menu, $item['id_menu'], $char.'--');
        }
    }
}
?>