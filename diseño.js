var x = document.getElementById("frmlogin");
var y = document.getElementById("frmregistrar");
var z = document.getElementById("btnvai");
var w = document.getElementById("frmcontacto");
var textcolor1 = document.getElementById("vaibtnlogin");
var textcolor2 = document.getElementById("vaibtnregistrar");
var textcolor3 = document.getElementById("btncontacto");
textcolor1.style.color = "white";
textcolor2.style.color = "black";

function registrarvai() {
    x.style.left = "-400px";
    y.style.left = "50px";
    z.style.left = "110px";
    textcolor1.style.color = "black";
    textcolor2.style.color = "white";
}
function loginvai() {
    x.style.left = "50px";
    y.style.left = "450px";
    z.style.left = "0";
    textcolor1.style.color = "white";
    textcolor2.style.color = "black";
}
function contacto() {
    x.style.left = "-940px";
    y.style.left = "-400px";
    z.style.left = "300px";
    textcolor1.style.color = "white";
    textcolor2.style.color = "black";
}
