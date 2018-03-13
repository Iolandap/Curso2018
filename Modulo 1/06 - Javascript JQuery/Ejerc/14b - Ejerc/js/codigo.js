$(document).ready(function(){       // Se ejecuta automaticamente nada mas abrir el fichero 
    
    $("a").on("click",function(){
        // Mostrar o ocultar del parrafo
        $(this).prev().toggle("slow");              //prev () devuelve el elemento hermano anterior del elemento seleccionado.

        // Cambio texto enlace
        if($(this)  .text()=="Ocultar contenidos"){
            $(this) .text("Mostrar contenidos");
                
        }else{
            $(this) .text("Ocultar contenidos");

        }   
    }) // Fin funcion

});


/* Otra manera de hacerlo... Esto seria para un solo enlace. Se tendria de hacer para los otros dos


    $("#enlace_1").on("click", function(){
        $("#contenidos_1")
            .toggle();

        if($("#enlace_1").text()=="Ocultar contenidos"){
                $("#enlace_1").text("Mostrar contenidos");
                    
            }else{
                $("#enlace_1").text("Ocultar contenidos");

        };
    });

 */