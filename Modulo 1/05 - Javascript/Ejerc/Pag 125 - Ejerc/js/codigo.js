
window.addEventListener('load', muestra);

/* Funcion control de pulsacion de botones. Si se hace Click envia a su funcion especifica */
    function muestra()
    {
        document.getElementById ('limite')
            .addEventListener("keyup", function(){maximo(this, 10)}); // funcion fantasma que llama a la funcion buena pero dando la longitud a buscar
    }



    
    // Funcion para limitar el numero de caracteres de un textarea o input
    // Recibe la informacion del EventListener con el tope de caracteres a usar
    function maximo(elemento, caracteres) {
        //se almacena el texto que contiene el textarea al que se enlaza el evento, referenciado como "this"
        var texto = elemento.value;

            // muestra los resultados de las variables en la "CONSOLA" del explorador, de esta manera no hace falta hacer alerts
            console.log(texto);         
            console.log(caracteres);

        //si la longitud del texto ya es mayor que 10, se devuelve false cancelando el evento
        if (texto.length > caracteres) {
            elemento.value = texto.substr(0,caracteres);
        }
    }



    // Funcion para limitar el numero de caracteres de un textarea o input
    // Tiene que recibir el evento, valor y número máximo de caracteres
    function limitar(e, contenido, caracteres)
    {
        // obtenemos la tecla pulsada
        var unicode=e.keyCode? e.keyCode : e.charCode;

        // Permitimos las siguientes teclas:
            // 8 backspace
            // 46 suprimir
            // 13 enter
            // 9 tabulador
            // 37 izquierda
            // 39 derecha
            // 38 subir
            // 40 bajar
        if(unicode==8 || unicode==46 || unicode==13 || unicode==9 || unicode==37 || unicode==39 || unicode==38 || unicode==40)
            return true;

        // Si ha superado el limite de caracteres devolvemos false
        if(contenido.length>=caracteres)
            return false;

        return true;
    }
