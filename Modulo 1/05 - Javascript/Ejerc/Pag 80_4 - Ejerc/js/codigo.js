var status_visible_1 = true;
var status_visible_2 = true;
var status_visible_3 = true; 

window.addEventListener('load', muestra);

/* Funcion control de pulsacion de botones. Si se hace Click envia a su funcion especifica */
     function muestra() {
        document.getElementById("enlace_1").addEventListener("click",ocultar_elementos_1);
        document.getElementById("enlace_2").addEventListener("click",ocultar_elementos_2);
        document.getElementById("enlace_3").addEventListener("click",ocultar_elementos_3);
    }

/* Funcion ocultar o enseñar primer contenido */
    function ocultar_elementos_1(){
        if(status_visible_1 == true){
            document.getElementById("contenidos_1").className ="oculto";
            status_visible_1 = false;
            document.getElementById("enlace_1").innerText="Mostrar contingut"
        }else{
            document.getElementById("contenidos_1").className ="visible";
            status_visible_1 = true;
            document.getElementById("enlace_1").innerText="Ocultar contenidos"
        }
    }

    function ocultar_elementos_2(){
        if(status_visible_2 == true){
            document.getElementById("contenidos_2").className ="oculto";
            status_visible_2 = false;
            document.getElementById("enlace_2").innerText="Mostrar contingut"
        }else{
            document.getElementById("contenidos_2").className ="visible";
            status_visible_2 = true;
            document.getElementById("enlace_2").innerText="Ocultar contenidos"
        }
    }

    function ocultar_elementos_3(){
        if(status_visible_3 == true){
            document.getElementById("contenidos_3").className ="oculto";
            status_visible_3 = false;
            document.getElementById("enlace_3").innerText="Mostrar contingut"
        }else{
            document.getElementById("contenidos_3").className ="visible";
            status_visible_3 = true;
            document.getElementById("enlace_3").innerText="Ocultar contenidos"
        }
    }


/* Otra opcion, cambia en funcion del texto que encuentra en el "enlace" 

    function ocultar_elementos_1(){
        if(document.getElementById("enlace_1").innerHTML=="Ocultar contenidos"){
            document.getElementById("contenidos_1")
            .style.display='none';
            document.getElementById("enlace_1").innerHTML="Mostrar contenidos";
        }else{
            document.getElementById("contenidos_1")
            .style.display='block';
            document.getElementById("enlace_1").innerHTML="Ocultar contenidos";
        }
    }

    function ocultar_elementos_2(){
    }
    
    function ocultar_elementos_3(){
    }
    */