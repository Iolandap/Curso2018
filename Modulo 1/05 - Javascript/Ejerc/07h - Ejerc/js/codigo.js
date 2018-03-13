/* Cread un script que, mediante un bucle while, recorra un string (cadena de
texto) carácter a carácter y muestre cada carácter con un alert. Si llegamos al
final del string o si encontramos el carácter “$”, el bucle se detendrá.   */ 

// Definiciones iniciales

    var texto = prompt( "Introducir texto con a deletrear --> " );
    var long_texto = texto.length;    //Longitud texto
    var i= 0 ;

// Entrada bucle. Contara de CERO hasta la longitud del texto
    while(i !== long_texto) {

    // Busca la letra de la posicion indicada, segun contador bucle
        var letra =  texto.charAt(i);  

    // Si encuentra el simbolo $ acaba el bucle
        if(letra == "$"){                
            alert("Encontrado simbolo $. Adios");
            break;      // Salida bucle
        }

    // Visualizacion resultado
        alert(" Letra en posicion " + i + " --> " + letra);

    // Incremento bucle
        i++;   
        
    }

// Fin
    alert ("Ahora si !!!!!");