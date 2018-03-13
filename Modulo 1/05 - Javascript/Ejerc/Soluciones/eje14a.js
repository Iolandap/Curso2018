window.addEventListener('load', cargaEventos);

function cargaEventos(){
    var link = document.getElementsByTagName("a");
    for (i=0; i<link.length; i++){
        link[i].addEventListener("click", modificar);
    }
}

function modificar(){
    if (this.innerHTML == "Ocultar contenidos"){      //comprovo si es visible o no i actuo acord a ell
    //fet amb previousSibling per identificar el germà anterior. Ho hem de fer 2 cops per que si no detecta el NODE de TEXT contingut al <p>.
    this.previousSibling.previousSibling.style.display="none";  //amago el <p>
    this.innerHTML = "Mostrar contenidos";
    }
    else {
        //plantejat com el cas anterior però a l'inversa.
    this.previousSibling.previousSibling.style.display="block"; //mostro el <p>
    this.innerHTML = "Ocultar contenidos";
    }
}
