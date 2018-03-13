
    
    $(document).ready(function(){           // Se ejecuta automaticamente nada mas abrir el fichero 

        $("#enlace").click(function(){      // Escucha de click en el ENLACE
            // Procesos a realizar sobre ADICIONAL
            $("#adicional")
                .toggleClass()              // ACTIVA o DESACTIVA la classe
                .css("color","red");        // Cambia color letras rojo
            // Procesos a realizar sobre ENLACE
            $("#enlace")
                .hide();                    // Oculta el enlace despues de haberse pulsado
        });

    });

/* 
// Otra manera de formularlo
// .ON permite controlar la herencia de la clase y transmirla a los hijos. Es como un refresh de la pagina

    $(document).ready(function(){           // Se ejecuta automaticamente nada mas abrir el fichero 

        $("#enlace").on("click",function(){      // Escucha de click en el ENLACE
            // Procesos a realizar sobre ADICIONAL
            $("#adicional")
                .toggleClass()              // ACTIVA o DESACTIVA la classe
                .css("color","red");        // Cambia color letras rojo
            // Procesos a realizar sobre ENLACE
            $("#enlace")
                .hide();                    // Oculta el enlace despues de haberse pulsado
        });

    });


     */