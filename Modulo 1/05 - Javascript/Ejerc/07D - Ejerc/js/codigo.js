
/* Cread un script con una variable  inicial  que empiece, por ejemplo, teniendo
valor 2. Cread un bucle que, en cada iteración, multiplique esta variable por si
misma, hasta que el valor final sea mayor que 100. Una vez alcanzado ese
valor, haced un alert que muestre el valor final alcanzado. Hacerlo con un bucle
while.  */ 

// Entrada numero

    var numero      = 2;
    var resultado   = 2;

// Entrada en bucle while
    
    while(resultado < 100) {
        resultado = resultado * resultado;
    }

    alert("Resultado del calculo es --> "+ resultado);
