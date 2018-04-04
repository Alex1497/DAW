
function getRequestObject() {
  // Asynchronous objec created, handles browser DOM differences
  if(window.XMLHttpRequest) {
    // Mozilla, Opera, Safari, Chrome IE 7+
    return (new XMLHttpRequest());
  }
  else if (window.ActiveXObject) {
    // IE 6-
    return (new ActiveXObject("Microsoft.XMLHTTP"));
  } else {
    // Non AJAX browsers
    return(null);
  }
}



function totalZombies(){
    $.get('totalZombies.php',{})
    .done(function(data){
        Lugar = document.getElementById('respuestaTotal');
        Lugar.innerHTML= data;
    });
}


function obtenerEstado(){
    $.get('estado.php',{
        Estado: document.getElementById("Estado").value,
    })
    .done(function(data){
        Lugar = document.getElementById('answer');
        Lugar.innerHTML= data;
    });
}