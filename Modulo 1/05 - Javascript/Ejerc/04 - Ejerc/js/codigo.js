
// Definicion array inicial

        var valores = [true, 5, false, "hola", "adios", 2];

/*     1. Determinar cuál de los dos elementos de texto es mayor */

        var mayor_que = valores[3] > valores[4];

        if(mayor_que=false){
                alert("el texto \"" + valores[4] + "\" es mayor que \"" + valores[3]+ "\"")
            } else {
                alert("el texto \"" + valores[3] + "\" es mayor que \"" + valores[4]+ "\"" )
            };

/*     2. Determinar   el   resultado   de   las   cinco   operaciones   matemáticas
    realizadas con los dos elementos numéricos */

    /* Definicion de variables */

        var suma = valores[1] + valores[5];
        var resta = valores[1] - valores[5];
        var multiplicacion = valores[1] * valores[5];
        var division = valores[1] / valores[5];
        var modulo = valores[1] % valores[5];
        
    /* Mensaje con los resultados */

        alert(valores[1] + " + " + valores[5] + " = " + suma);
        alert(valores[1] + " - " + valores[5] + " = " + resta);
        alert(valores[1] + " * " + valores[5] + " = " + multiplicacion);
        alert(valores[1] + " / " + valores[5] + " = " + division);
        alert(valores[1] + " resto de la division con " + valores[5] + " = " + modulo);

/*     3. Utilizando   exclusivamente   los   dos   valores   booleanos   del   array,
    determinar los operadores necesarios para obtener un resultado true y
    otro resultado false. */

    /* Definicion de variables */

        var falso = valores[0] == valores[2];
        var verdadero = valores[0] != valores[2];

    /* Mensaje con los resultados */

        alert(valores[0] + " es igual que " + valores[2] + " = " + falso);
        alert(valores[0] + " es diferente que " + valores[2] + " = " + verdadero);