
/* A partir del array “meses” del ejercicio 7a, cread un script que a partir de unvalor de texto que entraremos por teclado (por ejemplo, “Agosto”), devuelva la
posición   del   array   en   la   que   se   encuentra.   Si   el   texto   introducido   no   se
encuentra en la array, nos avisará y nos permitirá introducir otro mes hasta que pongamos un mes correcto...  */ 

// Definicion array meses

    var meses = ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];

    var mes_hallado = -1;

    // Entrada en bucle
    
    while(mes_hallado == -1) {              // Repetira bucle hasta que encuentre un mes en la array
        var mes_introducido ="Inicio";

        if (mes_introducido == "Inicio"){   //Entrara hasta que el mes_hallado sea diferente de -1
            mes_introducido = prompt("Introducir el mes a buscar: ");
        }

        mes_hallado = meses.indexOf(mes_introducido);   // Da posicion. Pero da -1 si no encuentra el valor en arry

    }

    alert(  "Mes introducido --> " + mes_introducido + 
            " || Posicion mes hallado --> " + mes_hallado);