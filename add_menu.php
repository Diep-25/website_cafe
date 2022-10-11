<?php
$conn = mysqli_connect('localhost', 'root', '', 'website_cafe');
 
$sql = 'SELECT * FROM tbl_menus';
 
$result = mysqli_query($conn, $sql);
 
$categories = array();

 
while ($row = mysqli_fetch_assoc($result)){
    $categories[] = $row;
   
}
// print_r($categories);


// show ra thẻ option 
function showCategories($categories, $parent_id = 0, $char = '')
{
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            echo '<option value="'.$item['id'].'">';
                echo $char . $item['ten_menu'];
            echo '</option>';
             
            // Xóa chuyên mục đã lặp
            unset($categories[$key]);
             
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'---');
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <title>Document</title>
</head>
<body>
<div class="container">
  <div class="row">

      <div class="col-4">
        <?php  
        if(isset($_POST['add'])){
            $name = $_POST['ten_menu'];
            $parent = $_POST['parent_id'];
            mysqli_query($conn,"INSERT INTO tbl_menus(ten_menu , parent_id) VALUES ('$name','$parent')");
        }

        ?>
          <form action="" method="post">
            <div class="form-group">
              <label for="exampleFormControlInput1">Email address</label>
              <input type="text" name="ten_menu" class="form-control"  placeholder="nhapj menu">
            </div>
            <div class="form-group">
              <label for="exampleFormControlSelect1">Example select</label>
              <select class="form-control" name="parent_id">
                <option value="0">--Chon menu--</option>
                <?php showCategories($categories);?>
                
              </select>
            </div>
            
            <button type="submit" name="add" class="btn btn-primary">Submit</button>
          </form>
    
          </div>
          
  </div>
</div>
</body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</html>