windows.addEventListener('load', muestra);

/* Opcion 1 */

    function muestra() {
        document.getElementById("adicional").className ="visible";
    }
    
/* Opcion 2  */

/*  var elemento = document.getElementById("adicional");
        elemento.className = "visible";
        elemento.style.color = "red";

        var enlace = test document.getElementById("enlace");
        enlace.className = "oculto"; */

/* Opcion 3 */

/*  function muestra() {
        var div = document.getElementById('adicional');
        if(div.style.display == 'block'){
            div.style.display = 'none';
        }else{
            div.style.display = 'block';
        }
    } */
