$(document).ready(function(){       // Se ejecuta automaticamente nada mas abrir el fichero 
    
    $("a").on("click",function(event){
        
        // Anula la funcion default y sigui la instruccion que yo le indico via programacion
        event.preventDefault();

        // Generador ruta y fichero HTML a cargar
        var link="html/"+$(this).attr("href");  

        // Carga de hoja HTML en la DIV
        $("#div1").load(link, function(response, status, xhr){
            // En caso que no encuentre el fichero a cargar
            if(status == "error")
                alert("Error: " + xhr.status + ": " + xhr.statusText);
        });

    });

});
