// Carga de Javascript al iniciar la hoja
$(document).ready(function(){       
    
    //Mensaje alerta oculto por defecto
    $('.alert').hide();

    // Listener de Click para el envio
    $("#envio").click(function(){ 
        /* carga datos introducidos en el INPUT*/
        var username = $("#username").val();
        var pasword  = $("#pasword").val();

        /* Control campos vacios en los INPUTS*/
        if(username ==""){
            // Mostar warning
            $('.alert').show();
        }else{
            if(pasword ==""){
                // Mostar warning
                $('.alert').show();
            }
        }

    }); // Fin funcion Click envio

    /* Funcion cierre alerta error */
    $(".close").click(function(){
        /* Ocultar mensaje alerta */
        $('.alert').hide();
    }); // Fin funcion alerta error

}); // Fin Document Ready
