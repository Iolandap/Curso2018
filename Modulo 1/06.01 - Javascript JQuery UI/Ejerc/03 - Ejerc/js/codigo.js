
// Carga de Javascript al iniciar la hoja
$(document).ready(function(){       
    
    // Input Fecha usando Calendario
        $( "#datepicker" ).datepicker({
            showAnim:   "slideDown",    // Formato mostrar calendario  
            dateFormat: "yy-mm-dd",     // Formato fecha introducida
            minDate:    0,              // Limite inferio fecha entrada
            maxDate:    "+2M" }         // Limite superior fecha entrada
        );

}); // Fin Document Ready

 