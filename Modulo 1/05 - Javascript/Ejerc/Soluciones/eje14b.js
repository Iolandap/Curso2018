window.addEventListener("load",inicio);

function inicio(){
    /* Cargar todos los eventos de la página */
    var link = document.getElementsByTagName("a");
    for (i=0; i<link.length; i++){
        link[i].addEventListener("click", oculta);
    }
}

function oculta() {
    /* Saber el enlace desde el que se llama */
    
    /*console.log("Elemento enlace --> "+this.id); */
    var enlace = this.id;
    /* Buscar el número del enlace para trabajar con el */
    var numeroEnlace = enlace.substr(-1);
    var enlaces = "enlace_"+numeroEnlace;
    var contenido = "contenidos_"+numeroEnlace;
    /* console.log("Enlace tratado --> "+enlaces);
    console.log("Contenido tratado --> "+contenido); */

    if (document.getElementById(enlaces).innerHTML == "Ocultar contenido" ){
        document.getElementById(contenido).style.visibility="hidden";
        document.getElementById(enlaces).innerHTML = "Mostrar texto";
    }
    else {
        document.getElementById(contenido).style.visibility = "visible";
        document.getElementById(enlaces).innerHTML = "Ocultar contenido";
    }
    

    /* Primera opción */
    /* switch (this.id){
        case "enlace_1":
            if (document.getElementById("enlace_1").innerHTML == "Ocultar contenido") {
                document.getElementById("contenidos_1").style.visibility="hidden";
            document.getElementById("enlace_1").innerHTML = "Mostrar texto";
            }
            else {
                document.getElementById("contenidos_1").style.visibility = "visible";
                document.getElementById("enlace_1").innerHTML = "Ocultar contenido";
            }
            break;
        case "enlace_2":
            if (document.getElementById("enlace_2").innerHTML == "Ocultar contenido") {
                document.getElementById("contenidos_2").style.visibility = "hidden";
                document.getElementById("enlace_2").innerHTML = "Mostrar texto";
            }
            else {
                document.getElementById("contenidos_2").style.visibility = "visible";
                document.getElementById("enlace_2").innerHTML = "Ocultar contenido";
            }
            break;
        case "enlace_3":
            if (document.getElementById("enlace_3").innerHTML == "Ocultar contenido") {
                document.getElementById("contenidos_3").style.visibility = "hidden";
                document.getElementById("enlace_3").innerHTML = "Mostrar texto";
            }
            else {
                document.getElementById("contenidos_3").style.visibility = "visible";
                document.getElementById("enlace_3").innerHTML = "Ocultar contenido";
            }
            break;
    } */

    
}