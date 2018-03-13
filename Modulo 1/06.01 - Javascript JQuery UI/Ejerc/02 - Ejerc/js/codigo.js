
// Carga de Javascript al iniciar la hoja
$(document).ready(function(){       
    
    // Definciones de iconos a usar
    var icons = {
        header: "ui-icon-circle-plus",
        activeHeader: "ui-icon-circle-minus"
    };
    
    // Funcion JQUERY UI Acordeon
    $( "#accordion" )
        // Efecto Accordeon
        .accordion({
            icons: icons,               // Vamos a usar iconos definidos por nosostros
            heightStyle: "content",     // NO AUTO HEIGHT - Deja espacio minimo en el texto interior
            header: "> div > h3"        // Para que sea SORTABLE
        })
        // Para que se muevan las secciones (SORTABLE)
        .sortable({
            axis: "y",
            handle: "h3",
            stop: function( event, ui ) {
              // IE doesn't register the blur when sorting
              // so trigger focusout handlers to remove .ui-state-focus
              ui.item.children( "h3" ).triggerHandler( "focusout" );
     
              // Refresh accordion to handle new order
              $( this ).accordion( "refresh" );
            }
        });

}); // Fin Document Ready
