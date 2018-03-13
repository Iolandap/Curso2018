
/* array de letras  */

        var letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S',
    'Q', 'V', 'H', 'L', 'C', 'K', 'E', 'T'];

/* Calculo letra DNI */

    /* Entrada DNI */
        var DNI =prompt("Introduce tu DNI");
        var LETRA =prompt("Introduce tu letra del DNI en mayuscula");

    /* Calculo letra DNI */

    if(DNI<0 || DNI>99999999){
        /* Si no cumple la condicion de numero DNI valido */
        alert("El número proporcionado no es válido");
    }else{  
        /* Numero de DNI valido */
        /* Calculo posicion letra DNI. Es el resto de dividir por 23 */
        var posicion_letra = DNI % 23;      

        /* Letra DNI calculada */
        var letra_1= letras [posicion_letra];  
            alert("letra DNI calculada" + letra_1); 

        /* Verificacion letra calculada vs introducida 
        NOTA: la letra introducida a de ser MAYUSCULA para que se valida*/
        var mayuscula = LETRA.toUpperCase();    /* Convierte la letra introducida a mayuscula */

        if(mayuscula == letra_1) {              /* Comparativa entre letras */
            /* Letra correcta */
            alert("Numero de letra correcto");
        }else{
            /* Letra incorrecta */
            alert("Numero de letra IN-correcto, tu letra seria la "+ letra_1 +" !!!!!!");
        }
    }