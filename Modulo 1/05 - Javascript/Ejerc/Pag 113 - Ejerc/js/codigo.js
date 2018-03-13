window.addEventListener('load', muestra);

/* Funcion control de pulsacion de botones. Si se hace Click envia a su funcion especifica */
    function muestra()
    {
        document.getElementById("pts_eur").addEventListener("click",convertirAEuros);
        document.getElementById("eur_pts").addEventListener("click",convertirAPesetas);
    }


    // Valor conversion Euros
    var euro = 166.386;

    // Funcion conversora de PESETAS a EUROS
    // Va a form "CONVERSOR" input "PESETAS" y pone el calculo en form "CONVERSOR" input "EUR"
    // parseInt---> Convierte una cadena en un entero.
            // parseInt("abc");     // Returns NaN.
            // parseInt("12abc");   // Returns 12.
    //  Math.round ()---> Math.round (x) devuelve el valor de x redondeado a su número entero más próximo

    function convertirAEuros()
    {
      document.conversor.euros.value = 
        Math.round(parseInt(document.conversor.pesetas.value) * 100 / euro) / 100;
    }

    // Funcion conversora de EUROS a PESETAS
    // Va a form "CONVERSOR" input "EUR" y pone el calculo en form "CONVERSOR" input "PESETAS"
    // parseInt---> Convierte una cadena en un entero.
            // parseInt("abc");     // Returns NaN.
            // parseInt("12abc");   // Returns 12.
    //  Math.round ()---> Math.round (x) devuelve el valor de x redondeado a su número entero más próximo

    function convertirAPesetas()
    {
      document.conversor.pesetas.value =
        Math.round(parseInt(document.conversor.euros.value) * euro);
    }