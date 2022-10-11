
<?php
	
session_start();
if(isset($_POST["action"]))
{
	if($_POST["action"] == "add")
	{
		if(isset($_SESSION["shopping_cart"]))
		{
			$is_available = 0;
			foreach($_SESSION["shopping_cart"] as $keys => $values)
			{
				if($_SESSION["shopping_cart"][$keys]['id_sanpham'] == $_POST["id_sanpham"])
				{
					$is_available++;
					$_SESSION["shopping_cart"][$keys]['soluong'] = $_SESSION["shopping_cart"][$keys]['soluong'] + $_POST["soluong"];
				}
			}
			if($is_available == 0)
			{
				$item_array = array(
					'id_sanpham'               =>     $_POST["id_sanpham"],  
					'ten_sanpham'             =>     $_POST["ten_sanpham"],  
					'gia_sanpham'            =>     $_POST["gia_sanpham"],
					'anh_sanpham'            =>     $_POST["anh_sanpham"],
					'soluong'         =>     $_POST["soluong"]
				);
				$_SESSION["shopping_cart"][] = $item_array;
			}
		}
		else
		{
			$item_array = array(
				'id_sanpham'               =>     $_POST["id_sanpham"],  
					'ten_sanpham'             =>     $_POST["ten_sanpham"],  
					'gia_sanpham'            =>     $_POST["gia_sanpham"],
					'anh_sanpham'            =>     $_POST["anh_sanpham"],
					'soluong'         =>     $_POST["soluong"]
			);
			$_SESSION["shopping_cart"][] = $item_array;
		}
	}

	if($_POST["action"] == 'remove')
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["id_sanpham"] == $_POST["id_sanpham"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
			}
		}
	}
	// if($_POST["action"] == 'empty')
	// {
	// 	unset($_SESSION["shopping_cart"]);
	// }
}

?>