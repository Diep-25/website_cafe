
    const currenloaction = location.href;
    const menuItem = document.querySelectorAll('.header .navbar a');
    const menuLeght = menuItem.length
for(let i=0 ; i<menuLeght ; i++){
    if(menuItem[i].href === currenloaction){
        menuItem[i].className = "activenavbar";


    }
}


    const bigImg = document.querySelector(".main_chitiet_right_table-big img")
const smalImg = document.querySelectorAll(".main_chitiet_right_table-smaill img")

smalImg.forEach(function(imgItem,x){
    imgItem.addEventListener("click",function(){
        bigImg.src = imgItem.src
    })
})