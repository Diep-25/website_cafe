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
// function showCategories($categories, $parent_id = 0, $char = '')
// {
//     foreach ($categories as $key => $item)
//     {
//         // Nếu là chuyên mục con thì hiển thị
//         if ($item['parent_id'] == $parent_id)
//         {
//             echo '<option value="'.$item[$key].'">';
//                 echo $char . $item['ten_menu'];
//             echo '</option>';
             
//             // Xóa chuyên mục đã lặp
//             unset($categories[$key]);
             
//             // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
//             showCategories($categories, $item['id'], $char.'---');
//         }
//     }
// }


//  sô ra table

// function showCategories($categories, $parent_id = 0, $char = '')
// {
//     foreach ($categories as $key => $item)
//     {
//         // Nếu là chuyên mục con thì hiển thị
//         if ($item['parent_id'] == $parent_id)
//         {
//             echo '<tr>';
//                 echo '<td>';
//                     echo $char . $item['ten_menu'];
//                 echo '</td>';
//             echo '</tr>';
             
//             // Xóa chuyên mục đã lặp
//             unset($categories[$key]);
             
//             // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
//             showCategories($categories, $item['id'], $char.'---');
//         }
//     }
// }



//  hiển thị thẻ ul li

function showCategories($categories, $parent_id = 0, $char = '')
{
    // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
    $cate_child = array();
    foreach ($categories as $key => $item)
    {
        // Nếu là chuyên mục con thì hiển thị
        if ($item['parent_id'] == $parent_id)
        {
            $cate_child[] = $item;
            unset($categories[$key]);
        }
    }
     
    // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
    if ($cate_child)
    {
        echo '<ul class="drop-down-ul animated fadeIn">';
        foreach ($cate_child as $key => $item)
        {
            // Hiển thị tiêu đề chuyên mục
            echo '<li class="flyout-right"><a href='.$item['id'].'>'.$item['ten_menu'].'</a>';
          
            // Tiếp tục đệ quy để tìm chuyên mục con của chuyên mục đang lặp
            showCategories($categories, $item['id'], $char.'');
           
            echo '</li>';
        }
        echo '</ul>';
    }
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>





<!--  ul li -->
<?php 
// showCategories($categories);
 ?>
 <div class="content">
	 
     <ul class="exo-menu">
         <li><a class="active" href="#"><i class="fa fa-home"></i> Home</a></li>
         
         <li class="drop-down"><a href="#"><i class="fa fa-cogs"></i> Menu</a>
         <?php showCategories($categories); ?>
             <!-- <ul class="drop-down-ul animated fadeIn">
             <li class="flyout-right"><a href="#">Flyout Right</a>
                 <ul class="animated fadeIn">
                     <li><a href="#">Mobile</a></li>
                     <li><a href="#">Computer</a></li>
                     <li><a href="#">Watch</a></li>
                 </ul>
             </li>
             
             
              
             </ul> -->
            
         
         </li>
         <li><a href="#"><i class="fa fa-cogs"></i> Services</a></li>
         <li><a href="#"><i class="fa fa-briefcase"></i> Portfolio</a></li>
         <li class="mega-drop-down"><a href="#"><i class="fa fa-list"></i> Mega Menu</a>
             
         </li>
         <li class="blog-drop-down"><a href="#"><i class="fa fa-bullhorn"></i> Blog</a>
            
         </li>
         <li  class="images-drop-down"><a  href="#"><i class="fa fa-photo"></i> Images</a>
             
         
         </li>
         <li><a href="#"><i class="fa fa-envelope"></i> Contact</a>
             <div class="contact">
         
             </div>
         </li>
        	
 </ul>
  
  
  </div>
  

</body>
<style>
    
 body{
	margin: 0;
	padding: 0;
	font: 300 14px/18px Roboto;
	background-image: url('../images/texture.png');
 }
  

 *,
:after,
:before {
  box-sizing: border-box
}

.clearfix:after,
.clearfix:before {
  content: '';
  display: table
}

.clearfix:after {
  clear: both;
  display: block
}
ul{
	list-style:none;
	margin: 0;
	padding: 0;
}
a, a:hover, a.active, a:active, a:visited, a:focus{
	color:#fefefe;
	text-decoration:none;
}
.content{
	margin: 50px 100px 0px 100px;
}

.exo-menu{
	width: 100%;
	float: left;
	list-style: none;
	position:relative;
	background: #23364B;
}
.exo-menu > li {	display: inline-block;float:left;}
.exo-menu > li > a{
	color: #ccc;
	text-decoration: none;
	text-transform: uppercase;
	border-right: 1px #365670 dotted;
	-webkit-transition: color 0.2s linear, background 0.2s linear;
	-moz-transition: color 0.2s linear, background 0.2s linear;
	-o-transition: color 0.2s linear, background 0.2s linear;
	transition: color 0.2s linear, background 0.2s linear;
}
.exo-menu > li > a.active,
.exo-menu > li > a:hover,
li.drop-down ul > li > a:hover{
	background:#009FE1;
	color:#fff;
}
.exo-menu i {
  float: left;
  font-size: 18px;
  margin-right: 6px;
  line-height: 20px !important;
}
li.drop-down,
.flyout-right,
.flyout-left{position:relative;}
li.drop-down:before {
  content: "\f103";
  color: #fff;
  font-family: FontAwesome;
  font-style: normal;
  display: inline;
  position: absolute;
  right: 6px;
  top: 20px;
  font-size: 14px;
}
li.drop-down>ul{
	left: 0px;
	min-width: 230px;

}
.drop-down-ul{display:none;}
.flyout-right>ul,
.flyout-left>ul{
  top: 0;
  min-width: 230px;
  display: none;
  border-left: 1px solid #365670;
  }

li.drop-down>ul>li>a,
.flyout-right ul>li>a ,
.flyout-left ul>li>a {
	color: #fff;
	display: block;
	padding: 20px 22px;
	text-decoration: none;
	background-color: #365670;
	border-bottom: 1px dotted #547787;
	-webkit-transition: color 0.2s linear, background 0.2s linear;
	-moz-transition: color 0.2s linear, background 0.2s linear;
	-o-transition: color 0.2s linear, background 0.2s linear;
	transition: color 0.2s linear, background 0.2s linear;
}
.flyout-right ul>li>a ,
.flyout-left ul>li>a {
	border-bottom: 1px dotted #B8C7BC;
}


/*Flyout Mega*/
.flyout-mega-wrap {
	top: 0;
	right: 0;
	left: 100%;
	width: 100%;
	display:none;
	height: 100%;
	padding: 15px;
	min-width: 742px;

}
h4.row.mega-title {
  color:#eee;
  margin-top: 0px;
  font-size: 14px;
  padding-left: 15px;
  padding-bottom: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid #ccc;
 }
.flyout-mega ul > li > a {
  font-size: 90%;
  line-height: 25px;
  color: #fff;
  font-family: inherit;
}
.flyout-mega ul > li > a:hover,
.flyout-mega ul > li > a:active,
.flyout-mega ul > li > a:focus{
  text-decoration: none;
  background-color: transparent !important;
  color: #ccc !important
}
/*mega menu*/

.mega-menu {
  left: 0;
  right: 0;
  padding: 15px;
  display:none;
  padding-top: 0;
  min-height: 100%;

}
h4.row.mega-title {
  color: #eee;
  margin-top: 0px;
  font-size: 14px;
  padding-left: 15px;
  padding-bottom: 13px;
  text-transform: uppercase;
  border-bottom: 1px solid #547787;
  padding-top: 15px;
  background-color: #365670
  }
 .mega-menu ul li a {
  line-height: 25px;
  font-size: 90%;
  display: block;
}
ul.stander li a {
    padding: 3px 0px;
}

ul.description li {
    padding-bottom: 12px;
    line-height: 8px;
}

ul.description li span {
    color: #ccc;
    font-size: 85%;
}
a.view-more{
  border-radius: 1px;
  margin-top:15px;
  background-color: #009FE1;
  padding: 2px 10px !important;
  line-height: 21px !important;
  display: inline-block !important;
}
a.view-more:hover{
	color:#fff;
	background:#0DADEF;
}
ul.icon-des li a i {
    color: #fff;
    width: 35px;
    height: 35px;
    border-radius: 50%;
    text-align: center;
    background-color: #009FE1;
    line-height: 35px !important;
}

ul.icon-des li {
    width: 100%;
    display: table;
    margin-bottom: 11px;
}
/*Blog DropDown*/
.Blog{
	left:0;
	display:none;
	color:#fefefe;
	padding-top:15px;
	background:#547787;
	padding-bottom:15px;
}
.Blog .blog-title{
	color:#fff;
	font-size:15px;
	text-transform:uppercase;

}
.Blog .blog-des{
	color:#ccc;
	font-size:90%;
	margin-top:15px;
}
.Blog a.view-more{
	margin-top:0px;
}
/*Images*/
.Images{
	left:0;
   width:100%;
	 display:none;
	color:#fefefe;
	padding-top:15px;
	background:#547787;
	padding-bottom:15px;
}
.Images h4 {
  font-size: 15px;
  margin-top: 0px;
  text-transform: uppercase;
}
/*common*/
.flyout-right ul>li>a ,
.flyout-left ul>li>a,
.flyout-mega-wrap,
.mega-menu{
	background-color: #547787;
}

/*hover*/
.Blog:hover,
.Images:hover,
.mega-menu:hover,
.drop-down-ul:hover,
li.flyout-left>ul:hover,
li.flyout-right>ul:hover,
.flyout-mega-wrap:hover,
li.flyout-left a:hover +ul,
li.flyout-right a:hover +ul,
.blog-drop-down >a:hover+.Blog,
li.drop-down>a:hover +.drop-down-ul,
.images-drop-down>a:hover +.Images,
.mega-drop-down a:hover+.mega-menu,
li.flyout-mega>a:hover +.flyout-mega-wrap{
	display:block;
}
/*responsive*/
 @media (min-width:767px){
	.exo-menu > li > a{
	display:block;
	padding: 20px 22px;
 }
.mega-menu, .flyout-mega-wrap, .Images, .Blog,.flyout-right>ul,
.flyout-left>ul, li.drop-down>ul{
		position:absolute;
}
 .flyout-right>ul{
	left: 100%;
	}
	.flyout-left>ul{
	right: 100%;
}
 }
@media (max-width:767px){

	.exo-menu {
		min-height: 58px;
		background-color: #23364B;
		width: 100%;
	}
	
	.exo-menu > li > a{
		width:100% ;
	    display:none ;
	
	}
	.exo-menu > li{
		width:100%;
	}
	.display.exo-menu > li > a{
	  display:block ;
	  	padding: 20px 22px;
	}
	
.mega-menu, .Images, .Blog,.flyout-right>ul,
.flyout-left>ul, li.drop-down>ul{
		position:relative;
}

}
a.toggle-menu{
    position: absolute;
    right: 0px;
    padding: 20px;
    font-size: 27px;
    background-color: #ccc;
    color: #23364B;
    top: 0px;
}
</style>
<script>
    	 
	
$(function () {
 $('.toggle-menu').click(function(){
	$('.exo-menu').toggleClass('display');
	
 });
 
});

  
</script>
</html>