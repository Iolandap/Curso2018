window.onload=function(){

    var elemento=document.getElementById("canvas");
    
    elemento.onmouseover = function(e) {

        // El contenido de esta funcion se ejecutara cuanso el mouse pase por encima del elemento

        document.getElementById("estado").className ="visible";
     };

    elemento.onmouseout = function(e) {

        // El contenido de esta funcion se ejecutara cuanso el mouse salga del elemento

        document.getElementById("estado").className ="oculto";
    };

}