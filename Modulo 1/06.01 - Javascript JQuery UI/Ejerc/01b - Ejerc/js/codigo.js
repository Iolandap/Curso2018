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

    // Listener Submit Form con JQUERY UI
        $("#opener").on("click",function(event){
            // Texto dentro del mensaje emergente
            $("#dialog-confirm").text("Missatge");
        //  $( "#dialog-confirm" ).dialog({ title: "Dialog Title"});    Se puede poner dentro del JQUERY UI

            // Primer JQUERY UI 
            $( "#dialog-confirm" ).dialog({
                title: "Dialog Title",      // Se puede poner fuera, ver nota anterior
                resizable: false,
                height: "auto",
                width: 400,
                modal: true,
                buttons: {
                    // Boton carga datos
                    "Cargar datos": function() {
                        
                        // Llamada a segundo JQUERY UI
                        $( "#dialog-message" ).dialog({
                            modal: true,
                            buttons: {
                              Ok: function() {
                                $( this ).dialog( "close" );
                              }
                            }
                        });  // Fin segundo JQUERY UI

                    },  // FIN Boton Carga datos
                    // Boton cancelar datos
                    Cancel: function() {
                        alert("Cancel");
                    }   // FIN Boton Cancelar datos
                }
            });  // Fin primer JQUERY UI 
        }); // Fin funcion Click Menu

}); // Fin Document Ready

// Funcio de carga de ficheros en el DIV
    function carga(hmtl_carga)

        $("#div1").load(hmtl_carga, function(response, status, xhr){    // Carga variable con direccion HTML recibida
            // En caso que no encuentre el fichero a cargar
            if(status == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
            
    }); // Fin funcion carga ficheros  