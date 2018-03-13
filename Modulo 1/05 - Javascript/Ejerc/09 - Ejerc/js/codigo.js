/* Definir una función que muestre información sobre una cadena de texto que se le pasa como  argumento. A partir de la cadena que se le pasa, la función determina si esa cadena está formada   sólo por mayúsculas, sólo por minúsculas o por una mezcla de ambas.   */ 


    /* Solicitud numero */
    var cadena_texto = prompt("Introducir cadena de texto --> ");
    var resultado = "";         /* Definicion variable global */

    /* Llamada funcion */
    calculo_mayusculas_minusculas(cadena_texto);

    /* Display resultado  */
    switch(resultado){
        case 1 :
            alert(cadena_texto + " es MAYUSCULAS");
            break;
        case 2 :
            alert(cadena_texto + " es MINUSCULAS");
            break;
        case 3 :
            alert(cadena_texto + " es MEZCLA mayusculas y minusculas");
            break;
    }


/* **********************************************************************************
*************************************************************************************
********************************************************************************** */

/* Funcion calculo mayusculas o minusculas */

    function calculo_mayusculas_minusculas(cadena_texto){

        var texto_mayusculas = cadena_texto.toUpperCase();  /* todo a mayusculas */
        var texto_minusculas = cadena_texto.toLowerCase();  /* todo a minusculas */

        /* Comparacion entre texto entrado y texto transformado */
        if(cadena_texto == texto_mayusculas){
            resultado = 1;
        }else{
            if(cadena_texto == texto_minusculas){
                resultado = 2;
            }else{
                resultado = 3;
            }
        }
    }