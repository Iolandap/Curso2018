
window.addEventListener('load', muestra);

/* Funcion control de pulsacion de botones. Si se hace Click envia a su funcion especifica */
    function muestra(){
        document.getElementById ('limite')
            .addEventListener("keyup", function(){control(this)});
    }

    function control(elemento){

        // Definiciones de variables
        var texto = elemento.value;
        var palabras_prohibidas = ["llimona", "taronja", "poma"];   // Array palabras prohibidas

        texto = texto.toLowerCase();    // Eliminador de mayusculas

        // Bucle control palabras prohibidas
        for(var i = 0; i < palabras_prohibidas.length;i++){

            if(texto == palabras_prohibidas[i]){
                alert("\""+texto.toUpperCase() +"\""+" no esta permitida. Lo siento!!!");
                
                //Eliminacion elemento prohibido
                document.getElementById("limite").value = texto.replace(palabras_prohibidas[i],"");
            }
        }
    } // FIN funcion control()
