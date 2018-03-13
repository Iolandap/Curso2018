window.addEventListener('load', muestra);

    // **************************************************************
    // *** Seccion event listener para cambio botones ***************
    // **************************************************************

    function muestra(){

        // ponemos la informacion de BUTTON dentro de una array
        var Imagen = document.getElementsByTagName("img");

        // Miramos al arrray, si se pulsa algun boton
        for (var i = 0; i < Imagen.length; i++) {
            console.log(Imagen[i]);
            Imagen[i].addEventListener("click",imagen_grande);
        }
    }

    function imagen_grande(){
        // var css_back= window.getComputedStyle(this, null).backgroundImage;
        // document.getElementsByClassName(imagen_principal).src=this.src;

        console.log(this.src);
        document.getElementById("imagen_principal").style.backgroundImage = "url('"+this.src+"')";   
    }
    

