window.addEventListener('load', muestra);

    function muestra(){
        // **************************************************************
        // *** Seccion event listener para cambio botones ***************
        // **************************************************************

            // ponemos la informacion de BUTTON dentro de una array
            var texto_botones = document.getElementsByTagName("button");

            // Miramos al arrray, si se pulsa algun boton
            for (var i = 0; i < texto_botones.length; i++) {
                console.log(texto_botones[i].textContent);
                texto_botones[i].addEventListener("mouseenter",menu);
                texto_botones[i].addEventListener("mouseleave",des_menu);
            }


        // **************************************************************
        // *** Seccion event listener para cambio de colores de fondo ***
        // **************************************************************

            // ponemos todos los div de dentro de colores en una array
            var named = document.getElementById("colores");
            var tags = named.getElementsByTagName("div");

            // Otra opcion para hacerlo seria
                // var seleccio = document.querySelectorAll(div > "colores");

            //pasamos un bucle por la array, hasta la longitud de la misma
            for (var i = 0; i < tags.length; i++) {
                // Mostramos en CONSOLE cada elemento de la array
                console.log(tags[i]);

                // Event listener de dentro de la array de las divisiones, Si entra o si sale. Si se cumple pasa a la funcion de cambio de color 
                tags[i].addEventListener("mouseenter",pintar);
                tags[i].addEventListener("mouseleave",des_pintar);
                }
    }
    
    // Funcion de cambio de color de fondo
    function pintar(){
        switch (this){
            case negro:
                document.body.style.backgroundColor = "black";
               break;
            case azul:
                document.body.style.backgroundColor = "blue";
                break;
            case lima:
                document.body.style.backgroundColor = "lime";
                break;
            case rojo:
                document.body.style.backgroundColor = "red";
                break;
            case rosa:
                document.body.style.backgroundColor = "pink";
                break;
            case turquesa:
                document.body.style.backgroundColor = "cyan";
                break;
            case amarillo:
                document.body.style.backgroundColor = "yellow";
                break;
            case verde:
                document.body.style.backgroundColor = "green";
                break;
            case gris:
                document.body.style.backgroundColor = "grey";
                break;
        }
    }

    // funcion de salida de color. Se pinta todo igual
    function des_pintar(){
        document.body.style.backgroundColor = "white";
    }

    // funcion cambio H1 del menu segun se entra en el boton
    function menu(){
        console.log("ENTRADA en menu");

        var encabezado = document.getElementsByTagName("h1");
        encabezado[0].innerHTML=this.innerHTML;
        
        document.title=this.innerHTML;
    }

    function des_menu(){
        console.log("SALIDA en menu nuevo");
    }

