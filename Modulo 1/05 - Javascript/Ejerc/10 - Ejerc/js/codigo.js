/* Definir una función que determine si la cadena de texto que se le pasa como parámetro es  un palíndromo, es decir, si se lee de la misma forma desde la izquierda y desde la derecha.  Ejemplo de palíndromo complejo: "La ruta nos aportó otro paso natural".   */ 

// Llamada al proceso

inicio ()   



/* **********************************************************************************
******************************** Funciones ******************************************
********************************************************************************** */

/* Funcion pedir y dar resultado */

    function inicio(){
        /* Solicitud texto */
        var cadena = prompt("Introducir cadena de texto --> ");     // Solicitud texto y guarda en cadena

        /* Llamada funcion y recibe un resultado*/
        var result = calculo_palidroma(cadena);         // Llama a la funcion para calculo palindromas y recibe un resultado
        
        /* Display en funcion de resultado  */
        switch(result){
            case 1 :
                alert(cadena + " es PALINDROMA");
                break;
            case 2 :
                alert(cadena + " es NO es PALINDROMA");
                break;
        }
    }

/* Funcion calculo palidromas que devuelve un resultado */

    function calculo_palidroma(cadena_texto){
        /* Definiciones locales para la cadena texto inicial */
            var cadena_minusculas   = cadena_texto.toLowerCase();   // Pasa a minusculas todas el texto
            var matriz_inicial      = cadena_minusculas.split("");  // Pasa cadena a matriz
            var matriz_inicial_long = matriz_inicial.length;        // Longitud matriz. para correr bucle limpiador blancos
            
            var cadena_trab_limpia = "";                            // Definicion variable global paraa limpiar blancos   

        /* Limpiador blancos de la array y convertir a cadena */
            for(var i = 0; i<matriz_inicial_long;) {
                if(matriz_inicial[i] != " "){                       // buscador blancos
                    cadena_trab_limpia = cadena_trab_limpia.concat(matriz_inicial[i]); // Une cadena
                };
                ++i;
            }

        /* Conversor de cadena a matriz */
            var matriz_trab_limp    = cadena_trab_limpia.split("");         // Pasa cadena a matriz
            var matriz_inv_limp     = matriz_trab_limp.slice(0);            // Rompe vinculo entre matrices
            
            /* Slice convierte la matriz en una nueva. Si no se hace estan ligadas (padre e hijo) y cualquier modificacion de una afecta a la otra. Por eso se ha de romper el vinculo */

        /* Inversor de matriz */
            matriz_inv_limp.reverse();                                  // Inversor matriz limpia

        /* Pasar las matrizes a cadena. La inicial y la nueva, sin blancos */
            var cadena_trab_limp    = matriz_trab_limp.join();
            var cadena_inv_limp     = matriz_inv_limp.join();

            alert("matriz_trab_limp "+matriz_trab_limp+ "matriz_inv_limp "+matriz_inv_limp);

        /* condicional palindroma */

            if(cadena_inv_limp == cadena_trab_limp){
                var resultado = 1;      // Palabra Palindroma
            }else{
                var resultado = 2;      // Palabra NO Palindroma
            }
        
        /* Envio resultado de la funcion */
            return resultado;
    }