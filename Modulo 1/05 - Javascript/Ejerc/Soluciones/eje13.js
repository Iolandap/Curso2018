window.addEventListener('load', cargaEventos);

function cargaEventos(){
	document.getElementById("btnAnadir").addEventListener("click",anade);
    document.getElementById("btnEliminar").addEventListener("click",eliminar);
}

function anade() {
    var array_li = document.getElementsByTagName("li");
    if (array_li.length==0) {
	    document.getElementById("btnEliminar").disabled  = false;
    }
    var elemento = document.createElement("li");
    var texto = document.createTextNode("Elemento de prueba");
    elemento.appendChild(texto);
 
    var lista = document.getElementById("lista");
    lista.appendChild(elemento);
 
}

function eliminar() {
    var array_li = document.getElementsByTagName("li");

    var ultimo_li = array_li[array_li.length-1];
    ultimo_li.parentNode.removeChild(ultimo_li);
    if (array_li.length==0) {
	    document.getElementById("btnEliminar").disabled  = true;
    }
}