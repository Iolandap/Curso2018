/* Escribir el código de una función a la que se pasa como parámetro un número
entero y devuelve como resultado una cadena de texto que indica si el número
es par o impar. Mostrar por pantalla el resultado devuelto por la función.   */ 


    /* Solicitud numero */
    var numero = prompt("Introducir numero a verificar (Par o Impar) --> ");
    var resultado = "";         /* Defincion variable global */

    /* Llamada funcion */
    calculo_par_impar(numero);

    /* Display resultado  */
    alert(numero + "es un numero " + resultado);


/* **********************************************************************************
*************************************************************************************
********************************************************************************** */

/* Funcion calculo Par o Impar. Si tiene decimales o no */

    function calculo_par_impar(numero){
        var numero_div = numero/2;
        var numero_clean =numero_div.toFixed(0);

        alert("en funcion. numero_div-->"+ numero_div + "|| numero_clean -->"+ numero_clean);

        /* Condicion para ser par o impar. no han de haber decimales  */
        if(numero_div == numero_clean){
            resultado = "PAR";
        }else{
            resultado = "IMPAR";
        }
        return resultado;

        /* Otra manera de calculo seria usando el MODULO --> %   que devuelve el resto. 
            - Si el resultado es CERO es par, 
            - Si el resultado NO es CERO es impar */

    }