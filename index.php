<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/mobile.css">
    <link rel="stylesheet" href="css/login.css">
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <link rel="icon" href="img/facion.jpg" type="image/gif" sizes="16x16">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
    <title>Dducky Caffe</title>
</head>
<style>

#main_info{
    display: none;
}
#modal_confirm{
    display: none;
}

</style>
<body>
  
    <header>
        
    
        <div class="main">
           <?php
                session_start();
                include "./admin/config/config.php";
                include "./page/menu.php";
                include "./page/main.php";
                include "./page/footer.php";
                

            ?>
            
                
            
        </div>
    </header>
</body>

<!-- <script src="js/ajax.js"></script> -->
<script src="js/main.js"></script>
<script src="js/trang.js"></script>

<script>
    $(document).ready(function(){
    load_data(); 
load_cart_data();
function load_cart_data()
	{
		$.ajax({
			url:"page/main/add_cart.php",
			method:"POST",
			dataType:"json",
			success:function(data)
			{
				$('#cart_details').html(data.cart_details);
				
				$('.badge').text(data.total_item);
			}
		});
	}


$(document).on('click', '.add_to_cart', function(){
    var id_sanpham = $(this).attr("id");
    
    var ten_sanpham = $('#ten_sanpham'+id_sanpham+'').val();
    var gia_sanpham = $('#gia_sanpham'+id_sanpham+'').val();
    var anh_sanpham = $('#anh_sanpham'+id_sanpham+'').val();
    var soluong = $('#soluong'+id_sanpham).val();
    var action = "add";
    if(soluong > 0)
    {
        $.ajax({
            url:"page/main/themgiohang.php",
            method:"POST",
            data:{id_sanpham:id_sanpham, ten_sanpham:ten_sanpham, gia_sanpham:gia_sanpham, soluong:soluong, anh_sanpham:anh_sanpham, action:action},
            success:function(data)
            {
                load_cart_data();
                $("#main_info").show("fast");
                // $(".main_info").style.opacity = "1";
                // alert("Thêm giỏ hàng thành công");
                setTimeout(function(){
					$("#main_info").hide('slow');
				}, 1000);
            }
        });
    }
    else
    {
        alert("Lỗi nhập số lượng");
    }
});

$(document).on('click', '.delete', function(){
    var id_sanpham = $(this).attr("id");
    var action = 'remove';
    $("#modal_confirm").show("fast");
    $('#btn_no').on('click', function(){
        $("#modal_confirm").hide("fast");
    })
    $('#btn_yes').on('click', function()
		{
        $.ajax({
            url:"page/main/themgiohang.php",
            method:"POST",
            data:{id_sanpham:id_sanpham, action:action},
            success:function()
            {
                $("#modal_confirm").hide("fast");
                $(".del_user" + id_sanpham).empty();
				$(".del_user" + id_sanpham).html("<td colspan='6'><center class='text-danger'>Đang xóa ...</center></td>");
				setTimeout(function(){
					$(".del_user" + id_sanpham).fadeOut('slow');
                    load_cart_data();
				}, 1000);

                
            }
            
              
        })
    });
    
});




// $(document).on('click', '#clear_cart', function(){
//     var action = 'empty';
//     $.ajax({
//         url:"action.php",
//         method:"POST",
//         data:{action:action},
//         success:function()
//         {
//             load_cart_data();
//             $('#cart-popover').popover('hide');
//             alert("Your Cart has been clear");
//         }
//     });
// });

 // ------------------------ ajax phan trang -----------------------
 
      function load_data(page)  
      {  
           $.ajax({  
                url:"page/main/allsp.php",  
                method:"POST",  
                data:{page:page},  
                success:function(data){  
                     $('#menu').html(data);  
                }  
           })  
      }  
      $(document).on('click', '.listt', function(){  
           var page = $(this).attr("id");  
           load_data(page);  
      }); 
      
});


 

    //load ảnh 
    var loadFile = function(event) {
    var output = document.getElementById('output');
    output.src = URL.createObjectURL(event.target.files[0]);
    output.onload = function() {
        URL.revokeObjectURL(output.src) 
    }
};


function showmoi() {
var pm = document.getElementById('pwdmoi');
pm.setAttribute('type', 'text');
}
function hidemoi() {
var pm = document.getElementById('pwdmoi');
pm.setAttribute('type', 'password');
}
var pwShown2 = 0;
document.getElementById("eyemoi").addEventListener("click", function () {
if (pwShown2 == 0) {
pwShown2 = 1;
this.style.color="red";
showmoi();
} else {
pwShown2 = 0;
hidemoi();
this.style.color="black";
}
}, false);

function showcu() {
var pc = document.getElementById('pwdcu');
pc.setAttribute('type', 'text');
}
function hidecu() {
var pc = document.getElementById('pwdcu');
pc.setAttribute('type', 'password');
}
var pwShown1 = 0;
document.getElementById("eyecu").addEventListener("click", function () {
if (pwShown1 == 0) {
pwShown1 = 1;
this.style.color="red";
showcu();
} else {
pwShown1 = 0;
hidecu();
this.style.color="black";
}
}, false);
function show() {
var p = document.getElementById('pwd');
p.setAttribute('type', 'text');

}
function hide() {
var p = document.getElementById('pwd');
p.setAttribute('type', 'password');
}
var pwShown = 0;

document.getElementById("eye").addEventListener("click", function () {
if (pwShown == 0) {
pwShown = 1;
this.style.color="red";
show();
} else {
pwShown = 0;
hide();
this.style.color="black";
}
}, false);



    const deleteInfo = document.getElementById('main_info_delete');
            const MainInfo = document.getElementById('main_info');
                deleteInfo.onclick = () =>{
                    MainInfo.style.opacity="0"
                    MainInfo.style.display="none"
                    
                }
                


//   var chatbox = document.getElementById('fb-customer-chat');
//   chatbox.setAttribute("page_id", "101577759000918");
//   chatbox.setAttribute("attribution", "biz_inbox");

//   window.fbAsyncInit = function() {
//     FB.init({
//       xfbml            : true,
//       version          : 'v12.0'
//     });
//   };

//   (function(d, s, id) {
//     var js, fjs = d.getElementsByTagName(s)[0];
//     if (d.getElementById(id)) return;
//     js = d.createElement(s); js.id = id;
//     js.src = 'https://connect.facebook.net/vi_VN/sdk/xfbml.customerchat.js';
//     fjs.parentNode.insertBefore(js, fjs);
//   }(document, 'script', 'facebook-jssdk'));


  
</script>
</html>