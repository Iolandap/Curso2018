// Defincion variables globales
var hmtl_carga ="";

// Carga de Javascript al iniciar la hoja
$(document).ready(function(){       
    
    // Listener de Click para el MENU
        $("a").on("click",function(event){

            // Anula la funcion default y sigui la instruccion que yo le indico via programacion
            event.preventDefault();

            // Generador ruta y fichero HTML a cargar
            var hmtl_carga="html/"+$(this).attr("href");  
            carga(hmtl_carga);                      // llamada a funcion carga, llevando la direccion donde esta el HTML

        }); // Fin funcion Click Menu

    // Listener de Click los botones RADIO
        $('input:radio[name=gender]').on("click", function(){

            // Condicion segun valor de click
            if ($(this).val()==0) {
                hmtl_carga = "html/man.html";
                carga(hmtl_carga);                  // llamada a funcion carga, llevando la direccion donde esta el HTML
            } else {
                hmtl_carga = "html/female.html";
                carga(hmtl_carga);                  // llamada a funcion carga, llevando la direccion donde esta el HTML
            };

            /* Otra opcion para el condicional seria en el VALUE de HTML poner directamente la pagina a cargar y usar la instruccion
               Toda la condicion IF se puede borrar y hacer la llamada a la funcion de carga
            
                    HTML -->    <input type='radio' name='gender' value="html/man.html"> Male
                                <input type='radio' name='gender' value="html/female.html"> Female

                    JQuery -->  carga($(this).val());

            */

        }); // Fin funcion Click botones radio

    // Funcio de carga de ficheros en el DIV
        function carga(hmtl_carga)

            $("#div1").load(hmtl_carga, function(response, status, xhr){    // Carga variable con direccion HTML recibida
                // En caso que no encuentre el fichero a cargar
                if(status == "error")
                    alert("Error: " + xhr.status + ": " + xhr.statusText);
                    
            }); // Fin funcion carga ficheros

}); // Fin Document Ready
