    
let searchForm = document.querySelector('.search-form');

document.querySelector('#search-btn').onclick = () =>{
    searchForm.classList.toggle('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}

document.querySelector('#cart-btn').onclick = () =>{
  window.location = "index.php?ql=giohang"; 
    
}

let loginForm = document.querySelector('.login-form');

document.querySelector('#login-btn').onclick = () =>{
    loginForm.classList.toggle('active');
    searchForm.classList.remove('active');
    
    navbar.classList.remove('active');
}

let navbar = document.querySelector('.navbar');

document.querySelector('#menu-btn').onclick = () =>{
    navbar.classList.toggle('active');
    searchForm.classList.remove('active');
    
    loginForm.classList.remove('active');
}

window.onscroll = () =>{
    searchForm.classList.remove('active');
    loginForm.classList.remove('active');
    navbar.classList.remove('active');
}
   
var slideIndex = [1,1];
var slideId = ["mid_vitri_img-img"]
showSlides(1, 0);
showSlides(1, 1);

function plusSlides(n, no) {
  showSlides(slideIndex[no] += n, no);
}

function showSlides(n, no) {
  var i;
  var x = document.getElementsByClassName(slideId[no]);
  if (n > x.length) {slideIndex[no] = 1}    
  if (n < 1) {slideIndex[no] = x.length}
  for (i = 0; i < x.length; i++) {
     x[i].style.display = "none";  
  }
  x[slideIndex[no]-1].style.display = "block";  
}



// ---------------------------------- ràng buộc số lượng
// const InputMax = parseInt(document.querySelector(".input_soluong").max)
//     function InputValue(sl){
//         if(parseInt(sl) > InputMax){  
//             alert('Hiện tại hàng chỉ còn : ' + InputMax)    
//             document.querySelector(".input_soluong").value = document.querySelector(".input_soluong").max   
//         }
//     }  
    const ChiTiet = document.getElementsByClassName("main_donhang_user_chitiet"); 
    const ChiTietDon = document.querySelector(".main_donhang_user_chitietdon");
   for (var i = 0; i < ChiTiet.length; i++) {
      ChiTiet[i].onclick = function(){
      ChiTietDon.classList.toggle("donhang_active")
      
   }
}
   
     const LoaiPhong = document.getElementById('loaiphong');
     const SoLuong = document.querySelector('.input_DB');
     window.oninput = () =>{
       if(LoaiPhong.value == 1){
            SoLuong.max = 30
       }
       if(LoaiPhong.value == 2){
           SoLuong.max = 120
       }
   if(parseInt(SoLuong.value) > parseInt(SoLuong.max)){  
       SoLuong.value =SoLuong.max
   alert('Loại phòng này chỉ chưa tối đa : ' + SoLuong.max + ' Người')    
   
   }
     }
   
    