
/* El factorial de un número entero n es una operación matemática que consiste en
multiplicar todos los factores n x (n-1) x (n-2) x ... x 1. Así, el factorial de 5 (escrito
como 5!) es igual a: 5! = 5 x 4 x 3 x 2 x 1 = 120  */ 

// Entrada numero

    var numero = prompt("Introducir numero a calcular el factorial: ");
    var numero_1 = numero;
    var calculo = 1;

// Entrada en bucle
    
    for(; numero>0; numero--) {
        calculo *= numero; // es lo mismo que -->  calculo = calculo * numero
    }

    alert("El factorial de " + numero_1 +" es -->"+ calculo);
