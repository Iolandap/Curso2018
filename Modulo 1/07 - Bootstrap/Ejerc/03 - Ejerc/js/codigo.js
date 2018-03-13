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

    // Listener de EDITAR_1 para el guardar
    $("#boton_1").click(function(){ 
        
        // carga valores de la linea_1 de la tabla
        var row     = $("#row_1").text();
        var art     = $("#art_1").text();
        var txt     = $("#txt_1").text();

        console.log(art);
        console.log(txt);

        // Mostrar valor a editar en el MODAL
        $("#art_num").innerHTML = art;
        $("#contenido").innerHTML = txt;

        // Listener EDIT_GUARDAR
        $("#edit_guardar").click(function(){ 

            // Reemplazar valor de la tabla
            $("#art_1").text(art);
            $("#txt_1").text(txt);

            // Cerrar MODAL
            $('#editar').modal('toggle');

        }); // Fin funcion EDIT_GUARDAR
    }); // Fin funcion EDITAR
    
    /* Funcion cierre alerta error */
    $(".close").click(function(){
        /* Ocultar mensaje alerta */
        $('.alert').hide();
    }); // Fin funcion alerta error

}); // Fin Document Ready
