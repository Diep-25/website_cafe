

 

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