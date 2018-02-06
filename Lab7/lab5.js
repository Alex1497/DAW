function verificarPassword(){
    var password1 = document.getElementById("contraseña");
    var password2 = document.getElementById("intento");
    var div = document.getElementById("validacion");
    var res;  
    if(password1.value == password2.value){
        res = alert("Tu contraseña es correcta.");
    }
    else{
        res = alert("Contraseña incorrecta.");
    }
    div.innerHTML = res;
}
document.getElementById("veri").onclick = verificarPassword;


function costo(precio, producto) {
    var cantidad = document.getElementById("cantidad" + producto).value;
    document.getElementById("prod" + producto).innerHTML = parseFloat(cantidad) * parseFloat(precio) * 84 / 100;
    document.getElementById("iva" + producto).innerHTML = parseFloat(cantidad) * parseFloat(precio) * 16 / 100;
    document.getElementById("comision" + producto).innerHTML = parseFloat(cantidad) / 100;
    document.getElementById("total" + producto).innerHTML = parseFloat(cantidad) * parseFloat(precio) + parseFloat(cantidad) / 100;
}
document.getElementById("cantidadBlackCops").onchange = function(){costo(849.99, "BlackCops")};
document.getElementById("cantidadAcordeonHero").onchange = function(){costo(499.99, "AcordeonHero")};
document.getElementById("cantidadGTAM").onchange = function(){costo(599.99, "GTAM")};

function edad(){
    var anoNac = document.getElementById("anios").value;
    var anoActual = new Date().getFullYear();
    var res = anoActual - anoNac;
    alert("Tienes "+ res+ " años" );
}

document.getElementById("fecha").onclick = edad;

function myFunction() {
    document.getElementById("demo").style = "color:red; text-align:center; font-weight: bold; font-size: 50px";
}

function myFunction2() {
    document.getElementById("demo2").style = "color:blue; text-align:left";
}

function ayuda_cumpleanos(){
     alert("Introduce tu año de nacimiento en formato aaaa");
}
document.getElementById("boton_ayuda_cumpleaños").onclick = ayuda_cumpleanos;



function ayuda_password(){
     alert("Asegurate de escribir la misma contraseña en los dos espacios");
}
document.getElementById("boton_ayuda_password").onclick = ayuda_password;

//setTimeout(function() {alert("¡¡¡¡No te duermas!!!");}, 180000);

function allowDrop(ev) {
    ev.preventDefault();
}

function drag(ev) {
    ev.dataTransfer.setData("text", ev.target.id);
}

function drop(ev) {
    ev.preventDefault();
    var data = ev.dataTransfer.getData("text");
    ev.target.appendChild(document.getElementById(data));
}

