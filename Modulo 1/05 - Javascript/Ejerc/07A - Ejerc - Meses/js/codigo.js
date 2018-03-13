
/* Recupera el ejercicio3 y modificalo para que muestre los días de la semana utilizando una estructura  for, con una estructura for...in, con una estructura while i con una estructura do…while.  */ 

// Definicion array meses

    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

/* Estructura for...in */
 
        for(var i=0; i<12; i++) {
            alert("For normal: " + meses[i]);
        }

        for(i in meses) {
            alert("For in: " + meses[i]);
        } 


/* Estructura while */
        
        var i = 0;
        while(i <= 11) {
            alert("While: " + meses[i]);
            i++;
        } 

/* Estructura do…while */

        var numero = 0;
        do {
            alert("do while:" + meses[numero]);
            numero++;
        } while(numero < 12);