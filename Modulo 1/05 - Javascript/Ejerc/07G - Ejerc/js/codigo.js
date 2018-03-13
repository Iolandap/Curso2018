
/* Cread un script que muestre un prompt() al usuario pidiéndole que introduzca
un texto de más de 5 caracteres. Si el usuario no introduce nada, o el texto
introducido es más corto, el script deberá seguir mostrando el prompt() hasta
que la condición se cumpla.  */ 

    var long_texto = 0;

// Entrada bucle 

    while(long_texto !== 5) {
        var texto = prompt("Introducir texto con longitud 5 caracteres --> ");
        var long_texto =  texto.length;     // Calculo longitud texto

        // Da posicion de blancos en el texto. Si no encuentra nada da -1
        var blank_texto = texto.indexOf(" ");   
            
        // control de blancos, si hay modifica la longitud del texto
        if(blank_texto !== -1){
            var long_texto = long_texto - 1;
        }

        // Mensaje alerta demasiado corto o demasiado largo
        if (long_texto !== 5){              
            alert ("te has equivocado, tiene "+ long_texto + " caracteres");
        }
    }

    alert ("Ahora si !!!!!");